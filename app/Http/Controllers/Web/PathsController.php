<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; // Faltaba esta importación 

class PathsController extends Controller
{
    /**
     * Mostrar todas las rutas y paths posibles
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paths = [
            'app_path()' => app_path(),
            'base_path()' => base_path(),
            'config_path()' => config_path(),
            'database_path()' => database_path(),
            'public_path()' => public_path(),
            'resource_path()' => resource_path(),
            'storage_path()' => storage_path(),
            'storage_path(\'app\')' => storage_path('app'),
            'storage_path(\'app/public\')' => storage_path('app/public'),
            'storage_path(\'framework\')' => storage_path('framework'),
            'storage_path(\'framework/cache\')' => storage_path('framework/cache'),
            'storage_path(\'framework/sessions\')' => storage_path('framework/sessions'),
            'storage_path(\'framework/views\')' => storage_path('framework/views'),
            'storage_path(\'logs\')' => storage_path('logs'),
        ];
        
        // Obtener todas las rutas registradas
        $routes = [];
        foreach (\Route::getRoutes() as $route) {
            $routes[] = [
                'method' => implode('|', $route->methods()),
                'uri' => $route->uri(),
                'name' => $route->getName(),
                'action' => $route->getActionName(),
            ];
        }
        
        // Corregido para usar la ruta de vista correcta
        return view('web.paths.index', compact('paths', 'routes'));
    }
}