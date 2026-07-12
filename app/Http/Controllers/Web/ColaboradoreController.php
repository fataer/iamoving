<?php

namespace App\Http\Controllers\Web;

use App\Colaboradores;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ColaboradoreController extends Controller
{
    public function show($id) 
    {
        $service = Colaboradores::find($id);

        return view('web.colaboradore.show', compact('service'));
    }

 /*   public function showSubService($service, $id)
    {
        $subservice = SubServicio::find($id);

        return view('web.servicios.subservice', compact('subservice'));
    }*/
}
