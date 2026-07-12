<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Visitas;
use App\Users_unregistered;
use App\InformeDetalladoCabecera;
use App\Mail\VisitaPropietarioMail;
use App\Mail\VisitaSolicitanteMail;
use App\Mail\VisitaSolicitanteCondicionesTestMail;
use App\Mail\VisitaCanceladaMail;
use App\Mail\IamovingGestionTestMail;
use App\Mail\AgenteGestionMail;
//add
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade as PDF;
//add
class VisitatestController extends Controller
{
	public function __construct()
	{
		//$this->middleware('jwt.auth', ['except' => ['index']]);
	}

	public function index()
	{
		return view('web.profile.visitas');
	}

	public function visitas()
	{
		$user = auth('api')->user();
		$visitas = Visitas::with('inmueble')->where('user_id',$user->id)->get();

		return response()->json(['visitas' => $visitas], 200);
	}


    public function guardar(Request $request){
		//try {
//**Add
		$today_1 = Carbon::now()->format('d-m-Y');
		$num = date("d", strtotime($today_1));
		$anno = date("Y", strtotime($today_1));
		$mes = array('enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre');
		$mes = $mes[(date('m', strtotime($today_1)) * 1) - 1];
		$fecha_letra= $num . ' de ' . $mes . ' del ' . $anno;
		$path_contrato = $today_1.'_'.'terminos_y_condiciones.pdf';
//**Add		
		$nombre_completo = $request->nombre_completo != null ? $request->nombre_completo : null;
		$nombre_completo_venta = $request->nombre_completo_venta != null ? $request->nombre_completo_venta : null;
		if ($nombre_completo !=null or $nombre_completo_venta !=null){
			$user = new Users_unregistered();
	    	$reference = InformeDetalladoCabecera::findOrFail($request->reference);
	    	$direccion= $reference->road;
	    	$visit_date = $request->date != null ? $request->date : null;
	    	$visit_time = $request->time != null ? $request->time : null;	
		    $isPedido = $request->has('tipo_visita');
		    	$visita = new Visitas();
		    	$visita->user_id =1;
		    	$visita->inmueble_id = $reference->id;
//**Add
		$inmueble_id = $reference->id;

//**Add					
		    	$visita->fecha = $visit_date;
		    	$visita->hora = $visit_time;

		    	if($reference->is_sale == 0){
						$user->name = $request->nombre_completo;
						$user->lastname = $request->apellidos_completo;
						$user->	email = $request->email_contacto;
						$user->phone = $request->movil_contacto;
					//*ADD
						$name = $request->nombre_completo;
						$lastname = $request->apellidos_completo;
						$email = $request->email_contacto;
						$phone = $request->movil_contacto;
						$tipo_persona_iamoving='ARRENDATARIO';
					//*ADD
		    			$user->numpersonas_alquiler = $request->numero_personas;
		    			$user->familia_alquiler = $request->tipo_personas;
						//$user->estudias_o_trabajas =$request->estudias_o_trabajas;
						if ($request->has('tipo_visita'))
						{
							$user->estudias_o_trabajas =$request->p_estudias_o_trabajas;
						}
						else{
							$user->estudias_o_trabajas =$request->estudias_o_trabajas;
						}
						$user->mascotas = $request->mascotas;
			    		$user->dondetrabajas_alquiler = $request->trabajo;
			    		$user->trabajo_alquiler = $request->tipo_trabajo;
						$user->tipocontrato_alquiler = $request->tipo_contrato;
						$user->sueldoaproximado_alquiler = $request->sueldo_aproximado;
						$user->fecha_desde_alquiler = $request->fecha_desde;
						$user->duracion_alquiler = $request->duracion_alquiler;
			    		/*$user->estudias_alquiler = $request->estudiante;
			    		$user->queestuias_alquiler = $request->tipo_estudiante;*/
						//$user->aval_1 = $request->aval_1;
						//$user->aval_2 = $request->aval_2;
						//$user->aval_3 = $request->aval_3;
			    		$user->contraoferta_alquiler = $request->contraoferta;
						$user->sobreti_alquiler = $request->comentario_persona;
			    		$user->datos_alquiler=1;
			    		$user->save();

			    		$visita->numero_personas = $request->numero_personas;
			    		$visita->tipo_personas = $request->tipo_personas;
						//$visita->estudias_o_trabajas =$request->estudias_o_trabajas;
						if ($request->has('tipo_visita'))
						{
							$visita->estudias_o_trabajas =$request->p_estudias_o_trabajas;
						}
						else{
							$visita->estudias_o_trabajas =$request->estudias_o_trabajas;
						}						
						$visita->mascotas = $request->mascotas;
			    		$visita->trabajo = $request->trabajo;
			    		$visita->tipo_trabajo = $request->tipo_trabajo;
						$visita->tipo_contrato = $request->tipo_contrato;
						$visita->sueldo_aproximado = $request->sueldo_aproximado;
						$visita->fecha_desde = $request->fecha_desde;
						$visita->duracion_alquiler = $request->duracion_alquiler;						
			    		/*$visita->estudiante = $request->estudiante;
			    		$visita->tipo_estudiante = $request->tipo_estudiante;*/
						//$visita->aval_1 = $request->aval_1;
						//$visita->aval_2 = $request->aval_2;
						//$visita->aval_3 = $request->aval_3;	
						$visita->contraoferta_alquiler = $request->contraoferta;
			    		$visita->comentario_persona = $request->comentario_persona;
			    		$visita->user_nonominado =$user->id;
						$visita->save();
		    	}
				else{

						$user->name = $request->nombre_completo_venta;
						$user->lastname = $request->apellidos_completo_venta;
						$user->	email = $request->email_contacto_venta;
						$user->phone = $request->movil_contacto_venta;
					//*ADD
						$name = $request->nombre_completo_venta;
						$lastname = $request->apellidos_completo_venta;
						$email = $request->email_contacto_venta;
						$phone = $request->movil_contacto_venta;
						$tipo_persona_iamoving='COMPRADOR';
					//*ADD						
					$visita->eres_inversor = $request->inversor;
					$visita->credito_hipotecario = $request->credito;
					$visita->vives_espana = $request->live_spain;
					$visita->sobreti_venta = $request->sobreti_venta;
					$visita->contraoferta_venta = $request->contraoferta_venta;
					$visita->save();
					
					
					$user->eres_inversor = $request->inversor;
					$user->credito_hipotecario =  $request->credito;
					$user->vives_espana = $request->live_spain;
					$user->sobreti_venta = $request->sobreti_venta;
					$user->contraoferta_venta = $request->contraoferta_venta;
					$user->save();
					$visita->user_nonominado =$user->id;
					$visita->save();
				}			
		    //*ADD
			$path_contrato = $visita->id.'___'.$path_contrato;
			$content = PDF::loadView('iamovingpro.contratos.visita_test', compact(['direccion','visit_time','visit_date','fecha_letra','name', 'lastname','email','phone','inmueble_id','tipo_persona_iamoving']))->output();

			Storage::disk('public')->put('/visita/'.$inmueble_id.'/'.$path_contrato, $content);
			//*ADD
				//$bcc = explode(",",env('MAIL_BCC'));
				//$bccc = explode(",",env('MAIL_OCULTO'));
				$bcc = explode(",",'fataer@gmail.com,roberto@iamoving.com');
				$bccc = explode(",",'fataer@gmail.com,roberto@iamoving.com');

		    	
				
				$propietarioDestinatarios = $reference->email;

					if(strtolower(trim($propietarioDestinatarios)) == 'info@iamoving.com'){	
						\Mail::to($bcc)->send(new IamovingGestionTestMail($user,$visita,true,$isPedido,$path_contrato));
						//\Mail::to($bcc)->send(new IamovingGestionTestMail($user,$visita,true,$isPedido));
						if ($reference->email_visita && !$isPedido){
							//$colaboradorVisitas = explode(",",$reference->email_visita);
							$colaboradorVisitas = $reference->email_visita;
							$findme   = '-';
							$pos = strpos($colaboradorVisitas, $findme);
							if ($pos === false) {
							} else {
								$colaboradorVisitas= substr($colaboradorVisitas, 0, $pos);
							}
							for ($i = 1; $i <= 100000000; $i++) {
								if ($i > 10) {
								 
								}								
							}							
							//VOLVER A PONER SI LO PIDE ROBERTO
							//\Mail::to($colaboradorVisitas)->bcc($bcc)->send(new AgenteGestionMail($user,$visita,true,$isPedido));														
						}
						//\Mail::to($bcc)->send(new IamovingGestionTestMail($user,$visita,true,$isPedido));						
					}else{
						\Mail::to($propietarioDestinatarios)->bcc($bcc)->send(new VisitaPropietarioMail($user,$visita,true,$isPedido,$path_contrato));
					}
					


					$solicitanteDestinatarios[] = $user->email;
					

					\Mail::to($solicitanteDestinatarios)->bcc($bccc)->send(new VisitaSolicitanteCondicionesTestMail($user,$visita,false,$isPedido,$path_contrato));
					/*if(strtolower(trim($propietarioDestinatarios)) == 'info@iamoving.com'){
						\Mail::to($bcc)->send(new IamovingGestionTestMail($user,$visita,true,$isPedido));
					}*/						

		    	$fecha_hora = $visita->fecha . " - " . $visita->hora;

		        //return response()->json(['success' => true, 'fecha'=> $fecha_hora, 'lugar'=> $reference->road, 'user' => $user,'inversor'=>$request->inversor], 200);			
			return response()->json(['success' => true,'nombre' =>$reference->email], 200);		
		}
		else{
	    	//$user = auth('api')->user();
            // Añade estas líneas justo después de la línea 205 donde defines $user
            //No se manda la info del user
            $user = auth('api')->user();
            
            // Añadir estas trazas de diagnóstico
            \Log::info('Diagnóstico de usuario:', [
                'user_object' => $user,
                'user_type' => gettype($user),
                'is_null' => is_null($user),
                'auth_check' => auth('api')->check(),
                'guard_name' => auth()->getDefaultDriver(),
                'request_headers' => $request->headers->all(),
                'request_token' => $request->bearerToken()
            ]);
            
            if (is_null($user)) {
                \Log::error('Usuario no autenticado en API guard');
                return response()->json(['error' => 'Usuario no autenticado'], 401);
            }
            
            if (!isset($user->id)) {
                \Log::error('El objeto usuario no tiene propiedad id:', ['user' => $user]);
                return response()->json(['error' => 'Objeto usuario inválido'], 500);
            }	    	
	    	$reference = InformeDetalladoCabecera::findOrFail($request->reference);
	    	$direccion= $reference->road;
	    	$visit_date = $request->date != null ? $request->date : null;
	    	$visit_time = $request->time != null ? $request->time : null;
	    	
	    	$isPedido = $request->has('tipo_visita');


	    	//if (Visitas::where('user_id', $user->id)->where('inmueble_id',$reference)->count() == 0) {
	    	if (Visitas::where('user_id', $user->id)->where('inmueble_id', $reference->id)->count() == 0) {

		    	$visita = new Visitas();
		    	$visita->user_id = $user->id;
		    	$visita->inmueble_id = $reference->id;
		    	$visita->fecha = $visit_date;
		    	$visita->hora = $visit_time;
				//**ADD
				$inmueble_id = $reference->id;
				//$name = $user->name.' '.$user->lastname;
				$name = $user->name;
				$lastname = $user->lastname;
				$email = $user->email;
				$phone = $user->phone;
				//**ADD
		    	if($reference->is_sale == 0){
					//*ADD
						$tipo_persona_iamoving='ARRENDATARIO';
					//*ADD
		    			$user->numpersonas_alquiler = $request->numero_personas;
		    			$user->familia_alquiler = $request->tipo_personas;
						//$user->estudias_o_trabajas =$request->estudias_o_trabajas;
						if ($request->has('tipo_visita'))
						{
							$user->estudias_o_trabajas =$request->p_estudias_o_trabajas;
						}
						else{
							$user->estudias_o_trabajas =$request->estudias_o_trabajas;
						}
						$user->mascotas = $request->mascotas;
			    		$user->dondetrabajas_alquiler = $request->trabajo;
			    		$user->trabajo_alquiler = $request->tipo_trabajo;
						$user->tipocontrato_alquiler = $request->tipo_contrato;
						$user->sueldoaproximado_alquiler = $request->sueldo_aproximado;
						$user->fecha_desde_alquiler = $request->fecha_desde;
						$user->duracion_alquiler = $request->duracion_alquiler;
			    		/*$user->estudias_alquiler = $request->estudiante;
			    		$user->queestuias_alquiler = $request->tipo_estudiante;*/
						//$user->aval_1 = $request->aval_1;
						//$user->aval_2 = $request->aval_2;
						//$user->aval_3 = $request->aval_3;
			    		$user->contraoferta_alquiler = $request->contraoferta;
						$user->sobreti_alquiler = $request->comentario_persona;
			    		$user->datos_alquiler=1;
			    		$user->save();

			    		$visita->numero_personas = $request->numero_personas;
			    		$visita->tipo_personas = $request->tipo_personas;
						//$visita->estudias_o_trabajas =$request->estudias_o_trabajas;
						if ($request->has('tipo_visita'))
						{
							$visita->estudias_o_trabajas =$request->p_estudias_o_trabajas;
						}
						else{
							$visita->estudias_o_trabajas =$request->estudias_o_trabajas;
						}						
						$visita->mascotas = $request->mascotas;
			    		$visita->trabajo = $request->trabajo;
			    		$visita->tipo_trabajo = $request->tipo_trabajo;
						$visita->tipo_contrato = $request->tipo_contrato;
						$visita->sueldo_aproximado = $request->sueldo_aproximado;
						$visita->fecha_desde = $request->fecha_desde;
						$visita->duracion_alquiler = $request->duracion_alquiler;						
			    		/*$visita->estudiante = $request->estudiante;
			    		$visita->tipo_estudiante = $request->tipo_estudiante;*/
						//$visita->aval_1 = $request->aval_1;
						//$visita->aval_2 = $request->aval_2;
						//$visita->aval_3 = $request->aval_3;	
						$visita->contraoferta_alquiler = $request->contraoferta;
			    		$visita->comentario_persona = $request->comentario_persona;
						$visita->save();
		    	}
				else{
					//*ADD
						$tipo_persona_iamoving='COMPRADOR';
					//*ADD					
					$visita->eres_inversor = $request->inversor;
					$visita->credito_hipotecario = $request->credito;
					$visita->vives_espana = $request->live_spain;
					$visita->sobreti_venta = $request->sobreti_venta;
					$visita->contraoferta_venta = $request->contraoferta_venta;
					$visita->save();
					
					
					$user->eres_inversor = $request->inversor;
					$user->credito_hipotecario =  $request->credito;
					$user->vives_espana = $request->live_spain;
					$user->sobreti_venta = $request->sobreti_venta;
					$user->contraoferta_venta = $request->contraoferta_venta;
					$user->save();
				}
		    //*ADD	
			$path_contrato = $visita->id.'_'.$path_contrato;
			$content = PDF::loadView('iamovingpro.contratos.visita_test', compact(['direccion','visit_time','visit_date','fecha_letra','name', 'lastname','email','phone','inmueble_id','tipo_persona_iamoving']))->output();

			Storage::disk('public')->put('/visita/'.$inmueble_id.'/'.$path_contrato, $content);
			//*ADD				
		    	$bcc = explode(",",env('MAIL_BCC'));
				$bccc = explode(",",env('MAIL_OCULTO'));

		    	
		    	/*if($reference->email!=null){
		    		$propietarioDestinatarios[] = $reference->email;
		    	}*/
		    	//$propietarioDestinatarios = explode(",",env('MAIL_TO'));
				
				$propietarioDestinatarios = $reference->email;
				//if($visita->inmueble_id ==6)
				//{
				//	\Mail::to($bccc)->send(new VisitaPropietarioMail($user,$visita,true,$isPedido));
				//	\Mail::to($bccc)->send(new IamovingGestionTestMail($user,$visita,true,$isPedido));
				//	if (!$isPedido){
				//	 \Mail::to($bcc)->send(new AgenteGestionMail($user,$visita,true,$isPedido));
				//	}					
				//}
				//else{
						
					//if(strtolower(trim($propietarioDestinatarios)) == 'info@iamoving.com'){
					if(strtolower(trim($propietarioDestinatarios)) == 'info@iamoving.com'){	

						\Mail::to($bcc)->send(new IamovingGestionTestMail($user,$visita,true,$isPedido,$path_contrato));
						if ($reference->email_visita && !$isPedido){
							//$colaboradorVisitas = explode(",",$reference->email_visita);
							$colaboradorVisitas = $reference->email_visita;
							$findme   = '-';
							$pos = strpos($colaboradorVisitas, $findme);
							if ($pos === false) {
							} else {
								$colaboradorVisitas= substr($colaboradorVisitas, 0, $pos);
							}
							for ($i = 1; $i <= 100000000; $i++) {
								if ($i > 10) {
								 
								}								
							}
							//VOLVER A PONER SI LO PIDE ROBERTO							
							//\Mail::to($colaboradorVisitas)->bcc($bcc)->send(new AgenteGestionMail($user,$visita,true,$isPedido));
						}
						//\Mail::to($bcc)->send(new IamovingGestionTestMail($user,$visita,true,$isPedido));						
					}else{
						\Mail::to($propietarioDestinatarios)->bcc($bcc)->send(new VisitaPropietarioMail($user,$visita,true,$isPedido,$path_contrato));
					}

					$solicitanteDestinatarios[] = $user->email;
					

					//este
					\Mail::to($solicitanteDestinatarios)->bcc($bccc)->send(new VisitaSolicitanteMail($visita,false,$isPedido,$path_contrato));
					/*if(strtolower(trim($propietarioDestinatarios)) == 'info@iamoving.com'){
						\Mail::to($bcc)->send(new IamovingGestionTestMail($user,$visita,true,$isPedido));
					}*/	
					//$solicitanteDestinatarios = explode(",",env('MAIL_TO'));
					//$solicitanteDestinatarios = explode(",",env('MAIL_OCULTO'));

					//\Mail::to($solicitanteDestinatarios)->bcc($bcc)->send(new VisitaSolicitanteMail($visita,true));
					//\Mail::to($solicitanteDestinatarios)->send(new VisitaSolicitanteMail($visita,true,$isPedido));
					
					
					
					/*if (!$isPedido){
						\Mail::to($bcc)->send(new AgenteGestionMail($user,$visita,true,$isPedido));
					}*/
				//}
		    	$fecha_hora = $visita->fecha . " - " . $visita->hora;

		        return response()->json(['success' => true, 'fecha'=> $fecha_hora, 'lugar'=> $reference->road, 'user' => $user,'inversor'=>$request->inversor], 200);
		    }else{
		    	return response()->json(['success' => false], 200);
		    }
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
	    	$bcc = explode(",",env('MAIL_OCULTO'));

	    	\Mail::to($destinatarios)->bcc($bcc)->send(new VisitaCanceladaMail($user,$visita));

    		return response()->json(['success' => true], 200);
    	}catch (\Exception $e) {
    		return response()->json(['success' => false], 400);
    	}

    }
    
}
