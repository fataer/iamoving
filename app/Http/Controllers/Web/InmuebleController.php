<?php

namespace App\Http\Controllers\Web;

use \App\InformeDetalladoCabecera as Inmueble;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InmuebleController extends Controller
{
    public function index()
    {
        //$inmuebles = Inmueble::where('published',true)->paginate(8);
		//$inmuebles = Inmueble::where('published',true)->whereIn('estado_inmueble', ['Disponible', 'Reservado','Alquilado','Vendido'])->orderBy('id', 'desc')->paginate(9);
		$inmuebles = Inmueble::where('published',true)->whereIn('estado_inmueble', ['Disponible', 'Reservado','Alquilado','Vendido'])->orderBy('created_at', 'desc')->paginate(9);
        foreach ($inmuebles as $i => $d) {
            $image = $d->path_image_primary;
            $fileWithoutExtension = explode('.',$image)[0];
            $inmuebles[$i]->path_image_primary = $fileWithoutExtension . "_444x250.jpg";
        }

        return view('web.inmueble.index', compact('inmuebles'));        
    }
	
    public function indexlan()
    {
        //$inmuebles = Inmueble::where('published',true)->paginate(8);
		//$inmuebles = Inmueble::where('published',true)->whereIn('estado_inmueble', ['Disponible', 'Reservado','Alquilado','Vendido'])->orderBy('id', 'desc')->paginate(9);
		$inmuebles = Inmueble::where('published',true)->whereIn('estado_inmueble', ['Disponible', 'Reservado','Alquilado','Vendido'])->orderBy('created_at', 'desc')->paginate(9);
        foreach ($inmuebles as $i => $d) {
            $image = $d->path_image_primary;
            $fileWithoutExtension = explode('.',$image)[0];
            $inmuebles[$i]->path_image_primary = $fileWithoutExtension . "_444x250.jpg";
        }

			return view('web.inmueble.en.index-en', compact('inmuebles/en'));  			
    }	
}
