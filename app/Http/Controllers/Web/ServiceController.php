<?php

namespace App\Http\Controllers\Web;

use App\Servicio;
use App\Serviciosdetalle as SubServicio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    public function show($id) 
    {
        $service = Servicio::with('details')->find($id);

        return view('web.servicios.show', compact('service'));
    }

    public function showSubService($service, $id)
    {
        $subservice = SubServicio::find($id);

        return view('web.servicios.subservice', compact('subservice'));
    }
}
