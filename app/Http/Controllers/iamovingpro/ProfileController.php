<?php

namespace App\Http\Controllers\iamovingpro;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
	public function __construct()
	{
		$this->middleware('jwt.auth', ['except' => ['index']]);
	}

    public function index(Request $request)
    {

        return view('iamovingpro.profile.index');
    }

    public function guardar(Request $request){

		try {
	    	$user = auth('api')->user();
	    	$user->name = $request->name;
	    	$user->email = $request->email;
	    	$user->phone = $request->phone;
	    	$user->fecha_nacimiento = $request->birthday;
	    	$user->sexo = $request->genre;

	    	$user->numpersonas_alquiler = $request->numero_personas;
			$user->familia_alquiler = $request->tipo_personas;
    		$user->dondetrabajas_alquiler = $request->trabajo;
    		$user->trabajo_alquiler = $request->tipo_trabajo;
    		$user->estudias_alquiler = $request->estudiante;
    		$user->queestuias_alquiler = $request->tipo_estudiante;
			$user->sobreti_alquiler = $request->comentario_persona;
			
			$user->datos_alquiler = 1;
	    	
	    	$user->save();
	        return response()->json(['success' => true, 'user' => $user], 200);
	    }catch (\Exception $e) {
    		return response()->json(['success' => false], 400);
    	}

    }
    
}
