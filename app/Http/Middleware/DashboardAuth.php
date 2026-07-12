<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class DashboardAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Añadir logs para debuggear
        \Log::info('=== DASHBOARD AUTH MIDDLEWARE ===');
        \Log::info('Método: ' . $request->method());
        \Log::info('URL: ' . $request->url());
        \Log::info('Sesión autenticada: ' . (session('dashboard_authenticated') ? 'SI' : 'NO'));

        // Verificar si ya está autenticado en la sesión
        if (session('dashboard_authenticated') === true) {
            \Log::info('Usuario ya autenticado, permitiendo acceso');
            return $next($request);
        }

        // Si es POST, verificar la contraseña
        if ($request->isMethod('post')) {
            \Log::info('Procesando POST con contraseña');
            
            $password = $request->input('dashboard_password');
            $correctPassword = env('DASHBOARD_PASSWORD', 'admin123');
            
            \Log::info('Contraseña recibida: ' . ($password ? 'SI' : 'NO'));
            \Log::info('Contraseña correcta configurada: ' . ($correctPassword ? 'SI' : 'NO'));

            if ($password === $correctPassword) {
                \Log::info('Contraseña correcta, autenticando usuario');
                // Guardar en sesión que está autenticado
                session(['dashboard_authenticated' => true]);
                
                // Redireccionar a la misma URL pero con GET
                \Log::info('Redirigiendo a: ' . $request->url());
                return redirect($request->url());
            } else {
                \Log::info('Contraseña incorrecta, redirigiendo a iamoving.com');
                // Contraseña incorrecta
                return redirect('https://iamoving.com');
            }
        }

        \Log::info('Mostrando formulario de login');
        // Mostrar formulario de login
        try {
            return response()->view('adm.dashboard_login');
        } catch (\Exception $e) {
            \Log::error('Error al cargar vista de login: ' . $e->getMessage());
            return response('Error al cargar página de login: ' . $e->getMessage(), 500);
        }
    }
}