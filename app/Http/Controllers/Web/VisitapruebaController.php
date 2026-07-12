<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Visitaspruebas;
use App\Users_unregistered;
use App\InformeDetalladoCabecera;
use App\Mail\VisitaPropietarioMail;
use App\Mail\VisitaSolicitanteMail;
use App\Mail\VisitaSolicitanteCondicionesMail;
use App\Mail\VisitaCanceladaMail;
use App\Mail\IamovingGestionMail;
use App\Mail\AgenteGestionMail;
//add
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade as PDF;
use App\Mail\VisitaSolicitanteConfirmacionMail;
use Illuminate\Support\Str;
//add
class VisitapruebaController extends Controller
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
		$visitas = Visitaspruebas::with('inmueble')->where('user_id',$user->id)->get();

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
        $visit_date = $request->date != null ? $request->date : null;
        $visit_time = $request->time != null ? $request->time : null;	
        $isPedido = $request->has('tipo_visita');
        
        $visita = new Visitaspruebas();
        $visita->user_id = 1;
        $visita->inmueble_id = $reference->id;
        //**Add
        $inmueble_id = $reference->id;
        //**Add					
        $visita->fecha = $visit_date;
        $visita->hora = $visit_time;
        
        // Generar token de confirmación único
        $visita->token_confirmacion = Str::random(60);

        if($reference->is_sale == 0){
            $user->name = $request->nombre_completo;
            $user->lastname = $request->apellidos_completo;
            $user->email = $request->email_contacto;
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
            $visita->contraoferta_alquiler = $request->contraoferta;
            $visita->comentario_persona = $request->comentario_persona;
            $visita->user_nonominado = $user->id;
            $visita->save();
        }
        else{
            $user->name = $request->nombre_completo_venta;
            $user->lastname = $request->apellidos_completo_venta;
            $user->email = $request->email_contacto_venta;
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
            $user->credito_hipotecario = $request->credito;
            $user->vives_espana = $request->live_spain;
            $user->sobreti_venta = $request->sobreti_venta;
            $user->contraoferta_venta = $request->contraoferta_venta;
            $user->save();
            $visita->user_nonominado = $user->id;
            $visita->save();
        }			

        // CAMBIO PRINCIPAL: Enviar correo de confirmación en lugar del correo directo de condiciones
        $confirmationUrl = url('confirmar_visita/' . $visita->token_confirmacion);
        $solicitanteDestinatarios[] = $user->email;
        $bccc = explode(",",env('MAIL_OCULTO_PRUEBA'));
        
        \Mail::to($solicitanteDestinatarios)->bcc($bccc)->send(new VisitaSolicitanteConfirmacionMail($user, $visita, $confirmationUrl));

        return response()->json(['success' => true,'nombre' => $reference->email], 200);		
    }
    else{
        $user = auth('api')->user();
        $reference = InformeDetalladoCabecera::findOrFail($request->reference);
        $visit_date = $request->date != null ? $request->date : null;
        $visit_time = $request->time != null ? $request->time : null;
        
        $isPedido = $request->has('tipo_visita');

        if (Visitas::where('user_id', $user->id)->where('inmueble_id',$reference->id)->count() == 0) {

            $visita = new Visitaspruebas();
            $visita->user_id = $user->id;
            $visita->inmueble_id = $reference->id;
            $visita->fecha = $visit_date;
            $visita->hora = $visit_time;
            
            // Generar token de confirmación también para usuarios registrados
            $visita->token_confirmacion = Str::random(60);
            
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
                $user->credito_hipotecario = $request->credito;
                $user->vives_espana = $request->live_spain;
                $user->sobreti_venta = $request->sobreti_venta;
                $user->contraoferta_venta = $request->contraoferta_venta;
                $user->save();
            }

            // CAMBIO: Enviar correo de confirmación en lugar del correo directo
            $confirmationUrl = url('confirmar_visita/' . $visita->token_confirmacion);
            $solicitanteDestinatarios[] = $user->email;
            $bccc = explode(",",env('MAIL_OCULTO_PRUEBA'));
            
            \Mail::to($solicitanteDestinatarios)->bcc($bccc)->send(new VisitaSolicitanteConfirmacionMail($user, $visita, $confirmationUrl));

            $fecha_hora = $visita->fecha . " - " . $visita->hora;

            return response()->json(['success' => true, 'fecha'=> $fecha_hora, 'lugar'=> $reference->road, 'user' => $user,'inversor'=>$request->inversor], 200);
        }else{
            return response()->json(['success' => false], 200);
        }
    }
}



/**
 * Confirmar la visita mediante token
 */
/**
 * Confirmar la visita mediante token
 */
public function confirmarVisita($token)
{
    try {
        // Buscar la visita por el token
        $visita = Visitaspruebas::where('token_confirmacion', $token)->first();
        
        if (!$visita) {
            return view('web.error_confirmacion')->with('mensaje', 'Token de confirmación inválido.');
        }
        
        // Verificar si ya está confirmada
        if ($visita->confirmacion == 1) {
            // Obtener el usuario para mostrar su email
            if ($visita->user_nonominado) {
                $user = Users_unregistered::find($visita->user_nonominado);
            } else {
                $user = \App\User::find($visita->user_id);
            }
            
            $userEmail = $user ? $user->email : 'tu correo electrónico';
            return view('web.visita_confirmada')->with([
                'mensaje' => 'Esta solicitud ya había sido confirmada anteriormente.',
                'userEmail' => $userEmail
            ]);
        }
        
        // Actualizar la confirmación
        $visita->confirmacion = 1;
        $visita->fecha_confirmacion = Carbon::now();
        $visita->save();
        
        // Obtener el usuario (registrado o no registrado)
        if ($visita->user_nonominado) {
            $user = Users_unregistered::find($visita->user_nonominado);
        } else {
            $user = \App\User::find($visita->user_id);
        }
        
        if (!$user) {
            return view('web.error_confirmacion')->with('mensaje', 'No se pudo encontrar la información del usuario.');
        }
        
        // Generar el PDF de términos y condiciones
        $today_1 = Carbon::now()->format('d-m-Y');
        $num = date("d", strtotime($today_1));
        $anno = date("Y", strtotime($today_1));
        $mes = array('enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre');
        $mes = $mes[(date('m', strtotime($today_1)) * 1) - 1];
        $fecha_letra = $num . ' de ' . $mes . ' del ' . $anno;
        $path_contrato = $visita->id . '_' . $today_1 . '_terminos_y_condiciones.pdf';
        
        $inmueble = InformeDetalladoCabecera::find($visita->inmueble_id);
        $inmueble_id = $inmueble->id;
        $name = $user->name;
        $lastname = $user->lastname;
        $email = $user->email;
        $phone = $user->phone;
        
        // Determinar el tipo de persona
        $tipo_persona_iamoving = ($inmueble->is_sale == 0) ? 'ARRENDATARIO' : 'COMPRADOR';
        
        // Generar PDF
        $content = PDF::loadView('iamovingpro.contratos.visita', compact(
            'fecha_letra', 'name', 'lastname', 'email', 'phone', 'inmueble_id', 'tipo_persona_iamoving'
        ))->output();
        
        Storage::disk('public')->put('/visita/' . $inmueble_id . '/' . $path_contrato, $content);
        
        // Enviar correos tras la confirmación
        $isPedido = false; // Ajustar según tu lógica si es necesario
        $bcc = explode(",", env('MAIL_BCC_PRUEBA'));
        $bccc = explode(",", env('MAIL_OCULTO_PRUEBA'));
        
        \Log::info('=== INICIO ENVÍO DE CORREOS ===');
        \Log::info('Visita ID: ' . $visita->id);
        \Log::info('Usuario: ' . $user->email);
        \Log::info('Inmueble ID: ' . $inmueble->id);
        \Log::info('Path contrato: ' . $path_contrato);
        \Log::info('BCC: ' . json_encode($bcc));
        \Log::info('BCCC: ' . json_encode($bccc));
        
        // Enviar correo al propietario/gestión
        $propietarioDestinatarios = $inmueble->email;
        \Log::info('Propietario destinatarios: ' . $propietarioDestinatarios);
        
        if (strtolower(trim($propietarioDestinatarios)) == 'info@iamoving.com') {	
            \Log::info('Enviando correo a info@iamoving.com (IamovingGestionMail)');
            try {
                \Mail::to($bcc)->send(new IamovingGestionMail($user, $visita, true, $isPedido, $path_contrato));
                \Log::info('✓ Correo IamovingGestionMail enviado exitosamente');
            } catch (\Exception $e) {
                \Log::error('✗ Error enviando IamovingGestionMail: ' . $e->getMessage());
            }
            
            if ($inmueble->email_visita && !$isPedido) {
                \Log::info('Email visita disponible: ' . $inmueble->email_visita);
                $colaboradorVisitas = $inmueble->email_visita;
                $findme = '-';
                $pos = strpos($colaboradorVisitas, $findme);
                if ($pos !== false) {
                    $colaboradorVisitas = substr($colaboradorVisitas, 0, $pos);
                }
                \Log::info('Colaborador visitas procesado: ' . $colaboradorVisitas);
                for ($i = 1; $i <= 100000000; $i++) {
                    if ($i > 10) {
                        break;
                    }								
                }
                // VOLVER A PONER SI LO PIDE ROBERTO
                // \Log::info('Enviando correo a colaborador: ' . $colaboradorVisitas);
                // \Mail::to($colaboradorVisitas)->bcc($bcc)->send(new AgenteGestionMail($user, $visita, true, $isPedido));														
            } else {
                \Log::info('No hay email_visita o es un pedido');
            }
        } else {
            \Log::info('Enviando correo a propietario específico (VisitaPropietarioMail): ' . $propietarioDestinatarios);
            try {
                \Mail::to($propietarioDestinatarios)->bcc($bcc)->send(new VisitaPropietarioMail($user, $visita, true, $isPedido, $path_contrato));
                \Log::info('✓ Correo VisitaPropietarioMail enviado exitosamente');
            } catch (\Exception $e) {
                \Log::error('✗ Error enviando VisitaPropietarioMail: ' . $e->getMessage());
            }
        }
        
        // Enviar correo de condiciones al solicitante
        $solicitanteDestinatarios = [];
        $solicitanteDestinatarios[] = $user->email;
        \Log::info('Enviando correo de condiciones al solicitante: ' . $user->email);
        try {
            \Mail::to($solicitanteDestinatarios)->bcc($bccc)->send(new VisitaSolicitanteCondicionesMail($user, $visita, false, $isPedido, $path_contrato));
            \Log::info('✓ Correo VisitaSolicitanteCondicionesMail enviado exitosamente');
        } catch (\Exception $e) {
            \Log::error('✗ Error enviando VisitaSolicitanteCondicionesMail: ' . $e->getMessage());
        }
        
        \Log::info('=== FIN ENVÍO DE CORREOS ===');
        
        // Mostrar página de confirmación exitosa
        return view('web.visita_confirmada');
        
    } catch (\Exception $e) {
        \Log::error('Error confirmando visita: ' . $e->getMessage());
        return view('web.error_confirmacion')->with('mensaje', 'Ocurrió un error al procesar la confirmación. Por favor, contacta con soporte.');
    }
}

    public function eliminar(Request $request){
    	try{
    		$user = auth('api')->user();
    		$visita = Visitaspruebas::findOrFail($request->reference);
    		$visita->delete();

    		$inmueble = InformeDetalladoCabecera::findOrFail($visita->inmueble_id);

    		
    		/*if($inmueble->email!=null){
		    	$destinatarios[] = $inmueble->email;
		    }*/
	    	$destinatarios = explode(",", env('MAIL_TO'));
	    	$bcc = explode(",",env('MAIL_OCULTO_PRUEBA'));

	    	\Mail::to($destinatarios)->bcc($bcc)->send(new VisitaCanceladaMail($user,$visita));

    		return response()->json(['success' => true], 200);
    	}catch (\Exception $e) {
    		return response()->json(['success' => false], 400);
    	}

    }

}