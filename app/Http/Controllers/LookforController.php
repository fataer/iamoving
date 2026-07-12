<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;

class LookforController extends Controller
{
    /**
     * Obtiene los datos comunes necesarios para la vista home.blade.php
     */
    private function getCommonViewData(Request $request)
    {
        // Obtener showcase (mismo código que en HomeController)
        $showcase = \App\InformeDetalladoCabecera::where('published',true)
            ->where('iamoving_pro','>',0)
            ->whereIn('estado_inmueble', ['Disponible', 'Reservado','Alquilado','Vendido'])
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();
            
        foreach ($showcase as $i => $d) {
            $image = $d->path_image_primary;
            $fileWithoutExtension = explode('.',$image)[0];
            $showcase[$i]->path_image_primary = $fileWithoutExtension . "_444x250.jpg";
        }
        
        // Obtener otras variables necesarias
        $areas = \App\Zone::limit(3)->get();
        $services = \App\Servicio::limit(3)->get();
        
        $route = URL::current();
        $tmp = explode("/",$route);
        $route = $tmp[count($tmp)-1] == 'olvide-pass' ? true : null;
        
        $zones = \App\Zone::all();
        $token = ($request->has('token') ? $request->token : null);
        $verification_code = ($request->has('verification_code') ? $request->verification_code : null);
        
        // Retornar todas las variables necesarias
        return compact(['showcase', 'areas', 'services', 'zones', 'token', 'verification_code', 'route']);
    }

    /**
     * Detecta el dispositivo y carga la vista correspondiente
     */
    public function index(Request $request)
    {
        $userAgent = $request->header('User-Agent');
        
        // Registro para depuración
        Log::info('User-Agent detectado: ' . $userAgent);
        
        // Obtener datos comunes para la vista
        $viewData = $this->getCommonViewData($request);
        
        // Detección de dispositivos y carga de la vista correcta
        if (preg_match('/(iPod|iPhone|iPad)/', $userAgent)) {
            Log::info('Dispositivo detectado como iPhone/iOS');
            $viewData['device'] = 'iphone';
            return view('iamovingpro.home', $viewData);
        } 
        elseif (preg_match('/Android/', $userAgent)) {
            Log::info('Dispositivo detectado como Android');
            $viewData['device'] = 'android';
            return view('iamovingpro.home', $viewData);
        } 
        elseif (preg_match('/(Windows NT|Win32|Win64|Windows)/', $userAgent)) {
            Log::info('Dispositivo detectado como Windows');
            $viewData['device'] = 'windows';
            return view('iamovingpro.home', $viewData);
        } 
        else {
            Log::info('Dispositivo no identificado, usando vista por defecto');
            $viewData['device'] = 'default';
            return view('iamovingpro.home', $viewData);
        }
    }

    /**
     * Vista específica para iPhone
     */
    public function iphone(Request $request)
    {
        $viewData = $this->getCommonViewData($request);
        $viewData['device'] = 'iphone';
        
        Log::info('Cargando vista para iPhone');
        return view('iamovingpro.home', $viewData);
    }

    /**
     * Vista específica para Android
     */
    public function android(Request $request)
    {
        $viewData = $this->getCommonViewData($request);
        $viewData['device'] = 'android';
        
        Log::info('Cargando vista para Android');
        return view('iamovingpro.home', $viewData);
    }

    /**
     * Vista específica para Windows
     */
    public function windows(Request $request)
    {
        $viewData = $this->getCommonViewData($request);
        $viewData['device'] = 'windows';
        
        Log::info('Cargando vista para Windows');
        return view('iamovingpro.home', $viewData);
    }

    /**
     * Vista predeterminada para otros dispositivos
     */
    public function default(Request $request)
    {
        $viewData = $this->getCommonViewData($request);
        $viewData['device'] = 'default';
        
        Log::info('Cargando vista por defecto');
        return view('iamovingpro.home', $viewData);
    }
}