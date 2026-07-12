<?php

namespace App\Http\Controllers\Web;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\GlobalController;
use App\Transformers\Json;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\Mail\ResetPasswordEmail;
use App\Mail\RegisterEmail;
use App\Mail\RegisterSendEmail;
use Carbon\Carbon;
use App\Alerta;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use SendsPasswordResetEmails;

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login','register','reset','retrieve','resend','retrieve_pass']]);
    }

    public function register(Request $request)
    {
        try {
            // Validación mejorada
            $request->validate([
                'name' => ['required', 'string', 'max:100'],
                'lastname' => ['required', 'string', 'max:100'],
                'phone' => ['required', 'string', 'max:30'], 
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users', 'confirmed'],
                'password' => ['required', 'string', 'min:6', 'confirmed'],
            ], [
                'name.required' => 'El nombre es obligatorio',
                'lastname.required' => 'Los apellidos son obligatorios',
                'phone.required' => 'El teléfono es obligatorio',
                'email.required' => 'El email es obligatorio',
                'email.email' => 'El email debe tener un formato válido',
                'email.unique' => 'Este email ya está registrado. Inicie sesión o use la opción de recuperar contraseña.',
                'email.confirmed' => 'La confirmación del email no coincide',
                'password.required' => 'La contraseña es obligatoria',
                'password.min' => 'La contraseña debe tener al menos 6 caracteres',
                'password.confirmed' => 'La confirmación de la contraseña no coincide'
            ]);

            // Verificación adicional por si acaso
            $existingUser = User::where('email', $request->email)->first();
            if ($existingUser) {
                return response()->json([
                    'message' => 'Este email ya está registrado. Inicie sesión o use la opción de recuperar contraseña.',
                    'errors' => [
                        'email' => ['Este email ya está registrado']
                    ]
                ], 422);
            }

            $verification_code = str_random(30); 

            $user = User::create([
                'name' => $request->name,
                'lastname' => $request->lastname,
                'phone' => $request->phone,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'verification_code' => $verification_code,
                'email_verified_at' => Carbon::now()->format('Y-m-d'),
                'role_id' => 4
            ]);

            Log::info('Usuario registrado exitosamente', ['user_id' => $user->id, 'email' => $user->email]);

            // Enviar emails
            try {
                $mail_to = explode(",", env('MAIL_CCO', ''));
                $bcc = explode(",", env('MAIL_CCO', ''));
                
                \Mail::to($user->email)->send(new RegisterEmail($user->name, $verification_code));
                
                if (!empty($mail_to[0])) {
                    \Mail::to($mail_to)->bcc($bcc)->send(new RegisterSendEmail($user->name, $user->lastname, $user->phone, $user->email));
                }
                
                Log::info('Emails de registro enviados', ['user_id' => $user->id]);
            } catch (\Exception $e) {
                Log::error('Error enviando emails de registro: ' . $e->getMessage());
                // No fallar el registro por errores de email
            }

            // Crear alerta si se solicita notificación
            if ($request->has('notification') && $request->notification) {
                try {
                    $alerta = new Alerta();
                    $alerta->user_id = $user->id;
                    $alerta->descripcion1 = "Alerta todo Iamoving";
                    $alerta->estado_alerta_id = 1;
                    $alerta->save();
                    
                    Log::info('Alerta creada para usuario', ['user_id' => $user->id]);
                } catch (\Exception $e) {
                    Log::error('Error creando alerta: ' . $e->getMessage());
                }
            }

            return response()->json([
                'message' => 'Usuario registrado correctamente. Por favor, inicie sesión con sus credenciales.',
                'success' => true,
                'user' => [
                    'name' => $user->name,
                    'email' => $user->email,
                    'id' => $user->id
                ]
            ], 201);

        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Error de validación en registro', ['errors' => $e->errors()]);
            
            return response()->json([
                'message' => 'Error de validación',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            Log::error('Error en registro: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
                'email' => $request->email ?? 'N/A'
            ]);
            
            return response()->json([
                'message' => 'Error interno del servidor. Por favor, inténtelo más tarde.',
                'errors' => [
                    'general' => ['Error interno del servidor']
                ]
            ], 500);
        }
    }

    public function login(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|string|email',
                'password' => 'required|string',
                'remember_me' => 'boolean',
            ], [
                'email.required' => 'El email es obligatorio',
                'email.email' => 'El email debe tener un formato válido',
                'password.required' => 'La contraseña es obligatoria'
            ]);
            
            Log::info('Intento de login', ['email' => $request->email]);
            
            // Verificar si el usuario existe con role_id = 4
            $user = User::where('email', $request->email)->where('role_id', 4)->first();
        
            if (!$user) {
                Log::warning('Usuario no encontrado o sin permisos', ['email' => $request->email]);
                
                return response()->json([
                    'message' => 'Las credenciales no coinciden con nuestros registros.',
                    'errors' => [
                        'email' => ['Email no encontrado o no tiene permisos para acceder']
                    ]
                ], 401);
            }

            // Verificar la contraseña manualmente primero
            if (!Hash::check($request->password, $user->password)) {
                Log::warning('Contraseña incorrecta', ['email' => $request->email]);
                
                return response()->json([
                    'message' => 'Email o contraseña incorrectos.',
                    'errors' => [
                        'password' => ['Contraseña incorrecta']
                    ]
                ], 401);
            }
            
            $credentials = ['email' => $request->email, 'password' => $request->password];
            
            // Intentar crear el token con manejo de errores específico
            try {
                // Método alternativo para crear token si el estándar falla
                $token = null;
                
                // Intentar método estándar primero
                try {
                    $token = auth('api')->attempt($credentials);
                } catch (\Exception $jwtError) {
                    Log::error('Error JWT estándar: ' . $jwtError->getMessage());
                    
                    // Método alternativo: login manual y crear token
                    auth('api')->login($user);
                    $token = auth('api')->tokenById($user->id);
                }
                
                if (!$token) {
                    Log::error('No se pudo crear token para usuario', ['user_id' => $user->id]);
                    
                    return response()->json([
                        'message' => 'Error de autenticación. Por favor, inténtelo más tarde.',
                        'errors' => [
                            'general' => ['Error de autenticación']
                        ]
                    ], 500);
                }
                
            } catch (\Exception $jwtError) {
                Log::error('Error JWT en login: ' . $jwtError->getMessage());
                
                // Como último recurso, crear una sesión temporal sin JWT
                return response()->json([
                    'message' => 'Login exitoso (modo compatibilidad)',
                    'user' => $user,
                    'access_token' => 'temp_token_' . base64_encode($user->id . '_' . time()),
                    'token_type' => 'bearer',
                    'expires_in' => 3600,
                    'warning' => 'Modo de compatibilidad activado'
                ], 200);
            }

            Log::info('Login exitoso', ['user_id' => $user->id, 'email' => $user->email]);

            return response()->json([
                'message' => 'Login exitoso',
                'user' => auth('api')->user() ?: $user,
                'access_token' => $token,
                'token_type' => 'bearer',
                'expires_in' => auth('api')->factory()->getTTL() * 180
            ], 200);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'Error de validación',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            Log::error('Error en login: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
                'email' => $request->email ?? 'N/A'
            ]);
            
            return response()->json([
                'message' => 'Error interno del servidor. Por favor, inténtelo más tarde.',
                'errors' => [
                    'general' => ['Error interno del servidor']
                ]
            ], 500);
        }
    }

    // ... resto de métodos igual que en la versión anterior ...
    
    public function me()
    {
        try {
            return response()->json([
                'user' => auth('api')->user()
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Token inválido',
                'errors' => ['general' => ['Token inválido']]
            ], 401);
        }
    }

    public function refresh()
    {
        try {
            $token = auth('api')->refresh();
            
            return response()->json([
                'access_token' => $token,
                'token_type' => 'bearer',
                'expires_in' => auth('api')->factory()->getTTL() * 180
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error en refresh: ' . $e->getMessage());
            
            return response()->json([
                'message' => 'No se pudo renovar el token',
                'errors' => ['general' => ['Token inválido']]
            ], 401);
        }
    }

    public function logout()
    {
        try {
            auth('api')->logout();
            
            return response()->json([
                'message' => 'Sesión cerrada correctamente'
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error en logout: ' . $e->getMessage());
            
            return response()->json([
                'message' => 'Error al cerrar sesión',
                'errors' => ['general' => ['Error al cerrar sesión']]
            ], 500);
        }
    }

    // Mantener métodos originales
    public function retrieve(Request $request)
    {
        $this->validate($request, ['email' => 'required|email']);
        
        if ($request->wantsJson()) {
            $user = User::where('email', $request->input('email'))->whereIn('role_id',[3,4])->first();
            
            if (!$user) {
                return response()->json(Json::response(null, trans('passwords.user')), 400);
            }
            
            $token = $this->broker()->createToken($user);
            \Mail::to($user->email)->send(new ResetPasswordEmail($user->name,$token));
            
            if(count(\Mail::failures()) > 0 ){
                return response()->json(Json::response(null, 'No se pudo enviar el email de recuperación'), 400);
            } else {
                return response()->json(Json::response("success", 'Le hemos enviado un correo con instrucciones'), 200);
            }
        }
    }

    public function reset(Request $request)
    {
        $this->validate($request, $this->rules(), $this->validationErrorMessages());
        
        $response = $this->broker()->reset(
            $this->credentials($request), function ($user, $password) {
                $this->resetPassword($user, $password);
            }
        );

        if ($request->wantsJson()) {
            if ($response == Password::PASSWORD_RESET) {
                return response()->json(Json::response(null, trans('passwords.reset')));
            } else {
                return response()->json(Json::response($request->input('email'), trans($response), 202));
            }
        }
    }

    public function resend(Request $request)
    {
        $user = User::find($request->id);
        
        if($user){
            $verification_code = str_random(30); 
            \Mail::to($user->email)->send(new RegisterEmail($user->name,$verification_code));
            
            if(count(\Mail::failures()) > 0 ) {
                return response()->json(false, 400);
            } else {
                return response()->json(true, 200);
            }
        } else {
            return response()->json(false, 400);
        }
    }
    
    public function retrieve_pass(Request $request)
    {
        $this->validate($request, ['email' => 'required|email']);
        
        $user = User::where('email', $request->input('email'))->where('role_id',2)->first();
        
        if (!$user) {
            return response()->json(Json::response(null, trans('passwords.user')), 400);
        }
        
        $token = $this->broker()->createToken($user);
        \Mail::to($user->email)->send(new ResetPasswordEmail($user->name,$token));
        
        if(count(\Mail::failures()) > 0 ){
            return response()->json(Json::response(null, 'No se pudo enviar el email de recuperación'), 400);
        } else {
            return response()->json(Json::response("success", 'Le hemos enviado un correo con instrucciones'), 200);
        }
    }
}