<?php

namespace App\Http\Controllers\iamovingpro;

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


class AuthController extends Controller
{

    use SendsPasswordResetEmails;

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login','register','reset','retrieve','resend']]);
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'phone' => ['required', 'string','max:30'], 
             'email' => ['required', 'string', 'email', 'max:255',  'confirmed'],
			 //'email' => ['required', 'string', 'email', 'max:255', 'unique:users', 'confirmed'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            //'identification' => ['required', 'string']
        ]);

        $verification_code = str_random(30); 

        $user = User::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            //'identificacion' => $request->identification,
            'verification_code' => $verification_code,
			'email_verified_at' =>  Carbon::now()->format('Y-m-d'),
            'role_id' => 4,
			'iamoving' => 1,
        ]);
        $mail_to = explode(",",env('MAIL_PU'));
        $bcc = explode(",",env('MAIL_BCC'));
        \Mail::to($user->email)->send(new RegisterEmail($user->name,$verification_code));
		\Mail::to($mail_to)->bcc($bcc)->send(new RegisterSendEmail($user->name,$user->lastname,$user->phone,$user->email ));
		


        //return response()->json($user, 200);
        $credentials = request(['email', 'password']);
        if (!$token = auth('api')->attempt($credentials)) {
            return response()->json(['message' => 'No authorizado0'], 401);
        }

        return response()->json([
            'user' => auth('api')->user(),
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60

        ]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'       => 'required|string|email',
            'password'    => 'required|string',
            'remember_me' => 'boolean',
        ]);

        $role = User::where('email',$request->email)->where('role_id',4)->where('iamoving',1)->get();

        
		
		if(count($role)==0){
            return response()->json(['message' => 'No authorizado1'], 401);
        }
		

        $credentials = request(['email', 'password']);
        if (!$token = auth('api')->attempt($credentials)) {
            return response()->json(['message' => 'No authorizado2'], 401);
        }

        return response()->json([
            'user' => auth('api')->user(),
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60

        ]);
       
    }

    public function me()
    {
        return response()->json(auth()->user());
    }

    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    

    public function logout()
    {
        Auth::logout();

        return response()->json(['message' => 'Exitoso'], 200);
    }


    public function retrieve(Request $request){
        $this->validate($request, ['email' => 'required|email']);
        if ($request->wantsJson()) {
            $user = User::where('email', $request->input('email'))->whereIn('role_id',[4,5])->first();
            if (!$user) {
                return response()->json(Json::response(null, trans('passwords.user')), 400);
            }
            $token = $this->broker()->createToken($user);
            \Mail::to($user->email)->send(new ResetPasswordEmail($user->name,$token));
            if(count(\Mail::failures()) > 0 ){
                return response()->json(Json::response(null, 'No se pudo enviar el email de recuperaci�n'), 400);
            }else{
                return response()->json(Json::response("success", 'Le hemos enviado un correo con instrucciones'), 200);
            }
            
        }
    }

    public function reset(Request $request){
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

    public function resend(Request $request){
        $user = User::find($request->id);
        if($user){
            $verification_code = str_random(30); 
            \Mail::to($user->email)->send(new RegisterEmail($user->name,$verification_code));
            if(count(\Mail::failures()) > 0 ) {
                return response()->json(false, 400);
            }else{
                return response()->json(true, 200);
            }
        }else{
            return response()->json(false, 400);
        }
    }
    


}
