<?php

namespace App\Http\Controllers\iamovingpro;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Visitas;
use App\InformeDetalladoCabecera;
use App\Mail\VisitaPropietarioMail;
use App\Mail\VisitaSolicitanteMail;
use App\Mail\VisitaCanceladaMail;

class VisitaController extends Controller
{
	public function __construct()
	{
		$this->middleware('jwt.auth', ['except' => ['index']]);
	}

	public function index()
	{
		return view('iamovingpro.profile.visitas');
	}

	public function visitas()
	{
		$user = auth('api')->user();
		$visitas = Visitas::with('inmueble')->where('user_id',$user->id)->get();

		return response()->json(['visitas' => $visitas], 200);
	}


    public function guardar(Request $request){
		//try {
	    	$user = auth('api')->user();
	    	$reference = InformeDetalladoCabecera::findOrFail($request->reference);
	    	$visit_date = $request->date;
	    	$visit_time = $request->time;

	    	if (Visitas::where('user_id', $user->id)->where('inmueble_id',$reference)->count() == 0) {

		    	$visita = new Visitas();
		    	$visita->user_id = $user->id;
		    	$visita->inmueble_id = $reference->id;
		    	$visita->fecha = $visit_date;
		    	$visita->hora = $visit_time;

		    	if($reference->is_sale == 0){

		    		if($user->datos_alquiler==null){
		    			$user->numpersonas_alquiler = $request->numero_personas;
		    			$user->familia_alquiler = $request->tipo_personas;
			    		$user->dondetrabajas_alquiler = $request->trabajo;
			    		$user->trabajo_alquiler = $request->tipo_trabajo;
			    		$user->estudias_alquiler = $request->estudiante;
			    		$user->queestuias_alquiler = $request->tipo_estudiante;
			    		$user->sobreti_alquiler = $request->comentario_persona;
			    		$user->datos_alquiler=1;
			    		$user->save();

			    		$visita->numero_personas = $request->numero_personas;
			    		$visita->tipo_personas = $request->tipo_personas;
			    		$visita->trabajo = $request->trabajo;
			    		$visita->tipo_trabajo = $request->tipo_trabajo;
			    		$visita->estudiante = $request->estudiante;
			    		$visita->tipo_estudiante = $request->tipo_estudiante;
			    		$visita->comentario_persona = $request->comentario_persona;
		    		}else{
		    			$visita->numero_personas = $user->numpersonas_alquiler;
			    		$visita->tipo_personas = $user->familia_alquiler;
			    		$visita->trabajo = $user->dondetrabajas_alquiler;
			    		$visita->tipo_trabajo = $user->trabajo_alquiler;
			    		$visita->estudiante = $user->estudias_alquiler;
			    		$visita->tipo_estudiante = $user->queestuias_alquiler;
			    		$visita->comentario_persona = $user->sobreti_alquiler;
		    		}

		    	}

		    	$visita->save();

		    	$bcc = explode(",",env('MAIL_BCC'));

		    	
		    	/*if($reference->email!=null){
		    		$propietarioDestinatarios[] = $reference->email;
		    	}*/
		    	$propietarioDestinatarios = explode(",",env('MAIL_TO'));

		    	\Mail::to($propietarioDestinatarios)->bcc($bcc)->send(new VisitaPropietarioMail($user,$visita,true));

		    	
		    	$solicitanteDestinatarios[] = $user->email;
		    	

		    	\Mail::to($solicitanteDestinatarios)->bcc($bcc)->send(new VisitaSolicitanteMail($visita,false));

		    	//$solicitanteDestinatarios = explode(",",env('MAIL_TO'));
		    	$solicitanteDestinatarios = explode(",",env('MAIL_BCC'));

		    	\Mail::to($solicitanteDestinatarios)->bcc($bcc)->send(new VisitaSolicitanteMail($visita,true));

		    	$fecha_hora = $visita->fecha . " - " . $visita->hora;

		        return response()->json(['success' => true, 'fecha'=> $fecha_hora, 'lugar'=> $reference->road], 200);
		    }else{
		    	return response()->json(['success' => false], 200);
		    }
	    //}catch (\Exception $e) {
    	//	return response()->json(['success' => false], 400);
    	//}

    }

    public function eliminar(Request $request){
    	try{
    		$user = auth('api')->user();
    		$visita = Visitas::findOrFail($request->reference);
    		$visita->delete();

    		$inmueble = InformeDetalladoCabecera::findOrFail($visita->inmueble_id);

    		
    		/*if($inmueble->email!=null){
		    	$destinatarios[] = $inmueble->email;
		    }*/
	    	$destinatarios = explode(",", env('MAIL_TO'));
	    	$bcc = explode(",",env('MAIL_BCC'));

	    	\Mail::to($destinatarios)->bcc($bcc)->send(new VisitaCanceladaMail($user,$visita));

    		return response()->json(['success' => true], 200);
    	}catch (\Exception $e) {
    		return response()->json(['success' => false], 400);
    	}

    }
    
}
