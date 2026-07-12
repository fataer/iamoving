<?php

namespace App\Http\Controllers\iamovingpro;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\URL;

class HomeLanController extends Controller
{

	
    public function index($lan, Request $request)
    {
        //$showcase = \App\InformeDetalladoCabecera::where('published',true)->where('iamoving_pro','>',0)->whereIn('estado_inmueble', ['Disponible', 'Reservado','Alquilado','Vendido'])->orderBy('id', 'desc')->take(3)->get();
		$showcase = \App\InformeDetalladoCabecera::where('published',true)->where('iamoving_pro','>',0)->whereIn('estado_inmueble', ['Disponible', 'Reservado','Alquilado','Vendido'])->orderBy('created_at', 'desc')->take(3)->get();
		//$showcase = \App\InformeDetalladoCabecera::where('published',true)->orderBy('id', 'desc')->take(3)->get();
        foreach ($showcase as $i => $d) {
            $image = $d->path_image_primary;
            $fileWithoutExtension = explode('.',$image)[0];
            $showcase[$i]->path_image_primary = $fileWithoutExtension . "_444x250.jpg";
        }

        $areas = \App\Zone::limit(3)->get();
        $services = \App\Servicio::limit(3)->get();
        
        $route = URL::current();
        $tmp = explode("/",$route);
        $route = $tmp[count($tmp)-1] == 'olvide-pass' ? true : null;

        
        $zones = \App\Zone::all();
        $token = ($request->has('token') ? $request->token : null);
        $verification_code = ($request->has('verification_code') ? $request->verification_code : null);
        if ($lan=='en'){
			return view('iamovingpro.home-en', compact(['showcase', 'areas', 'services','zones','token','verification_code','route']));
		}
		else
		{
			return view('iamovingpro.home', compact(['showcase', 'areas', 'services','zones','token','verification_code','route']));
		}
    }
    public  function mantenimiento(){

    	return view("mantenimiento");
    }

    public function cookies(){
        return view("iamovingpro.cookies");   
    }

    public function bloqueado()
    {
        return view("iamovingpro.locked");   
    }
}