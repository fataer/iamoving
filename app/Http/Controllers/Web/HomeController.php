<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $showcase = \App\InformeDetalladoCabecera::where('published',true)->whereIn('estado_inmueble', [ 'Disponible','Reservado'])->orderBy('id', 'desc')->take(3)->get();
        foreach ($showcase as $i => $d) {
            $image = $d->path_image_primary;
            $fileWithoutExtension = explode('.',$image)[0];
            $showcase[$i]->path_image_primary = $fileWithoutExtension . "_444x250.jpg";
        }

        $areas = \App\Zone::limit(3)->get();
        $services = \App\Servicio::limit(3)->get();

        
        $zones = \App\Zone::all();
        $token = ($request->has('token') ? $request->token : null);
        $verification_code = ($request->has('verification_code') ? $request->verification_code : null);
        
        return view('iamovingpro.home', compact(['showcase', 'areas', 'services','zones','token','verification_code']));
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
