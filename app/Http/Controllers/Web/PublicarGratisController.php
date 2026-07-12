<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\PublicarMail;
use App\Mail\PremiumMail;
use App\Mail\VendedorMail;
use App\Aterrizaje_vendedor;
use App\Click_vendedor;
use App\Vendedor_interesado;
use Storage;
use App\Services\MetaConversionsService;

class PublicarGratisController extends Controller
{
    
    // En PublicarGratisController.php
public function registrarWhatsAppClick(Request $request)
{
    $click = new Click_vendedor();
    $click->id_aterrizaje = $request->id_aterrizaje;
    $click->tipo_boton = $request->tipo_boton . '_whatsapp';
    $click->utm_source = $request->utm_source ?? null;
    $click->utm_ad = $request->utm_ad ?? null;
    $click->utm_placement = $request->utm_placement ?? null;
    $click->save();
    
    // También enviar evento a Meta si quieres trackear esta acción
    try {
        $metaService = new MetaConversionsService();
        $metaService->sendCustomEvent(
            'WhatsAppClick',
            $request->tipo_boton,
            $request->ip(),
            $request->header('User-Agent')
        );
    } catch (\Exception $e) {
        \Log::error('Error Meta CAPI WhatsApp click', ['error' => $e->getMessage()]);
    }
    
    return response()->json(['success' => true]);
}
    
    public function send(Request $request)
    {
        $path = "";

        $tipo = $request->tipo_publicacion;
        $bedrooms = $request->bedrooms;
        $bathrooms = $request->bathrooms;
        $address = $request->address;
        if($request->has('photo') && isset($request->photo)){
            $photo =  $request->photo;
            $request->photo->storeAs('photos', $request->photo->getClientOriginalName());
            $path = Storage::disk('local')->path("photos/".$request->photo->getClientOriginalName());
        }
        
        $phone = $request->phone;
        $email = $request->email;
        $name = $request->name;
        $body = $request->body;
        $metros = $request->metros;
		$precio = $request->precio;
		
		$mail_mandar = explode(",",$request->email);
        $mail_to = explode(",",env('MAIL_TO'));
        $bcc = explode(",",env('MAIL_PUC'));
        
        if($tipo == "alquiler"){
            $subject = "Iamovingpro alquiler";
        }elseif($tipo == "venta"){
			$subject = "IAMOVINGpro venta";    
		}elseif($tipo == "alquiler_free"){
			$subject = "IAMOVINGfree alquiler";    
		}elseif($tipo == "venta_free"){
			$subject = "IAMOVINGfree venta";    
		}elseif($tipo == "iampro"){
            $subject = "IAMPRO";
		}elseif($tipo == "buscando_turistico_conflicto"){
            $subject = "Buscando alquiler turístico - Precio - QUÉ CONSEGUIMOS";
		}elseif($tipo == "buscando_turistico_presentacion"){
            $subject = "Buscando alquiler turístico - Precio - MODELO DE PRESENTACION";
		}elseif($tipo == "buscando_turistico_traductor"){
            $subject = "Buscando alquiler turístico - Precio - IAMOVING TRADUCTOR";
		}elseif($tipo == "buscando_turistico_pagoseguro"){
            $subject = "Buscando alquiler turístico - Precio - PAGO SEGURO";
		}elseif($tipo == "buscando_turistico_juridico"){
            $subject = "Buscando alquiler turístico - Precio -APOYO JURIDICO";
		}elseif($tipo == "buscando_turistico_inventario"){
            $subject = "Buscando alquiler turístico - Precio - INVENTARIO";
		}elseif($tipo == "buscando_turistico_iampremium"){
            $subject = "Buscando alquiler turístico - Precio - IAMPREMIUM";
		}elseif($tipo == "buscando_turistico_inicio"){
            $subject = "Buscando alquiler turístico - Precio - INFORMACION GENERAL";		
        }elseif($tipo == "buscando_alquiler_juridico"){
            $subject = "Buscando alquiler - Precio - APOYO JURIDICO";
        }elseif($tipo == "buscando_alquiler_pagoseguro"){
            $subject = "Buscando alquiler - Precio - PAGO SEGURO";
        }elseif($tipo == "buscando_alquiler_traductor"){
            $subject = "Buscando alquiler - Precio - IAMOVING TRADUCTOR";
        }elseif($tipo == "buscando_alquiler_presentacion"){
            $subject = "Buscando alquiler - Precio - MODELO DE PRESENTACION";
        }elseif($tipo == "buscando_alquiler_inicio"){
            $subject = "Buscando alquiler - INFORMACION GENERAL";
        }elseif($tipo == "buscando_alquiler_inventario"){
            $subject = "Buscando alquiler - Precio - INVENTARIO";			
        }elseif($tipo == "buscando_alquiler_iampremium"){
            $subject = "Buscando alquiler - IAMPREMIUM";			
        }elseif($tipo == "buscando_alquiler_visita"){
            $subject = "Buscando alquiler - Precio - VISITA PRESENCIAL";
        }elseif($tipo == "buscando_habitacion_juridico"){
            $subject = "Buscando habitación - Precio - APOYO JURIDICO";
        }elseif($tipo == "buscando_habitacion_pagoseguro"){
            $subject = "Buscando habitación - Precio - PAGO SEGURO";
        }elseif($tipo == "buscando_habitacion_traductor"){
            $subject = "Buscando habitación - Precio - IAMOVING TRADUCTOR";
        }elseif($tipo == "buscando_habitacion_presentacion"){
            $subject = "Buscando habitación - Precio - MODELO DE PRESENTACION";
        }elseif($tipo == "buscando_habitacion_inventario"){
            $subject = "Buscando habitación - Precio - INVENTARIO";
        }elseif($tipo == "buscando_habitacion_visita"){
            $subject = "Buscando habitación - Precio - VISITA PRESENCIAL";		
        }elseif($tipo == "buscando_comprar_inicio"){
            $subject = "Buscando comprar - Precio - INFORMACION GENERAL";
		}elseif($tipo == "buscando_comprar_visita"){
            $subject = "Buscando comprar - Precio - VISITA PRESENCIAL";
		}elseif($tipo == "buscando_comprar_iampremium"){
			$subject = "Buscando comprar - IAMPREMIUM";	
        }elseif($tipo == "buscando_comprar_traductor"){
            $subject = "Buscando comprar - Precio - IAMOVING TRADUCTOR";
        }elseif($tipo == "buscando_comprar_pagoseguro"){
            $subject = "Buscando comprar - Precio - PAGO SEGURO";
        }elseif($tipo == "buscando_comprar_juridico"){
            $subject = "Buscando comprar - Precio - APOYO JURIDICO";
        }elseif($tipo == "propietario_vender_inicio"){
            $subject = "Propietario vender - INFORMACION GENERAL";			
        }elseif($tipo == "propietario_vender_extranjero"){
            $subject = "Propietario vender - Precio - CONTENIDO AUDIOVISUAL";
        }elseif($tipo == "propietario_vender_plano"){
            $subject = "Propietario vender - Precio - PLANO";			
        }elseif($tipo == "propietario_vender_juridico"){
            $subject = "Propietario vender - Precio - AESORIA JURIDICA";
        }elseif($tipo == "propietario_vender_visitas"){
            $subject = "Propietario vender - Precio - OPEN HOUSE";
        }elseif($tipo == "propietario_vender_iampremium"){
            $subject = "Propietario vender - Precio - IAMPREMIUM";			
        }elseif($tipo == "propietario_alquiler_turistico"){
            $subject = "Propietario alquiler turístico - Precio - VISITA VIRTUAL FUERA DE IAMOVING";
        }elseif($tipo == "propietario_alquiler_turistico_plano"){
            $subject = "Propietario alquiler turístico - Precio - PLANO";			
        }elseif($tipo == "propietario_alquiler_turistico_inicio"){
            $subject = "Propietario alquiler turístico - INFORMACION GENERAL";
        }elseif($tipo == "propietario_alquiler_turistico_solvencia"){
            $subject = "Propietario alquiler turístico - Precio - ESTUDIO SOLVENCIA";
        }elseif($tipo == "propietario_alquiler_turistico_pago"){
            $subject = "Propietario alquiler turístico - Precio - PAGO SEGURO";
        }elseif($tipo == "propietario_alquiler_turistico_contrato"){
            $subject = "Propietario alquiler turístico - Precio - REDACCION CONTRATO";
        }elseif($tipo == "propietario_alquiler_turistico_inmueble"){
            $subject = "Propietario alquiler turístico - Precio - INVENTARIO";
        }elseif($tipo == "propietario_alquiler_turistico_open"){
            $subject = "Propietario alquiler turístico - Precio - OPEN HOUSE";
        }elseif($tipo == "propietario_alquiler_turistico_traductor"){
            $subject = "Propietario alquiler turístico - Precio - TRADUCTOR";
        }elseif($tipo == "propietario_alquiler_turistico_iampremium"){
            $subject = "Propietario alquiler turístico - Precio - IAMPREMIUM";			
        }elseif($tipo == "propietario_alquiler_inquilino"){
            $subject = "Propietario alquiler - Precio - CONTENIDO AUDIOVISUAL";
        }elseif($tipo == "propietario_alquiler_plano"){
            $subject = "Propietario alquiler - Precio - PLANO";			
        }elseif($tipo == "propietario_alquiler_inicio"){
            $subject = "Propietario alquiler - INFORMACION GENERAL";
        }elseif($tipo == "propietario_alquiler_solvencia"){
            $subject = "Propietario alquiler - ESTUDIO SOLVENCIA";
        }elseif($tipo == "propietario_alquiler_asegura"){
            $subject = "Propietario alquiler - ASEGURA TU ALQUILER";
        }elseif($tipo == "propietario_alquiler_administracion"){
            $subject = "Propietario alquiler - ADMINISTRACION DEL INMUEBLE";
        }elseif($tipo == "propietario_alquiler_iampremium"){
            $subject = "Propietario alquiler - Precio - IAMPREMIUM";			
        }elseif($tipo == "propietario_alquiler_contrato"){
            $subject = "Propietario alquiler - Precio - REDACCION CONTRATOS";
        }elseif($tipo == "propietario_alquiler_inventario"){
            $subject = "Propietario alquiler - Precio - INVENTARIO";
        }elseif($tipo == "propietario_alquiler_visitas"){
            $subject = "Propietario alquiler - Precio - OPEN HOUSE";
        }elseif($tipo == "propietario_habitacion_inquilino"){
            $subject = "Propietario alquiler habitación - Precio - VISITA INQUILINO";
        }elseif($tipo == "propietario_habitacion_contrato"){
            $subject = "Propietario alquiler habitación - Precio - REDACCION CONTRATOS";
        }elseif($tipo == "propietario_habitacion_visitas"){
            $subject = "Propietario alquiler habitación - Precio - OPEN HOUSE";
        }elseif($tipo == "propietario_habitacion_inventario"){
            $subject = "Propietario alquiler habitación - Precio - INVENTARIO";
        }elseif($tipo == "propietario_alquiler_iamoving"){
            $subject = "Propietario alquiler IAMOVING - Alquilando con IAMOVING";
        }elseif($tipo == "propietario_vender_iamoving"){
            $subject = "Propietario vender IAMOVING - Vendiendo con IAMOVING";
        }elseif($tipo == "iamoving_premium"){
            
			$subject = "INFORMACION USUARIO IAMOVING PREMIUM";
        }
	

        if($tipo == "iamoving_premium"){
			
			//\Mail::to($mail_to)->bcc($bcc)->send(new PublicarMail($body,$subject,$name,$email,$bedrooms,$bathrooms,$path,$phone,$address,$metros,$precio));
			\Mail::to($bcc)->send(new PublicarMail($body,$subject,$name,$email,$bedrooms,$bathrooms,$path,$phone,$address,$metros,$precio));
			$subject = "SOLICUTD IAMOVING PREMIUM";
			\Mail::to($mail_mandar)->bcc($bcc)->send(new PremiumMail($body,$subject,$name,$email,$bedrooms,$bathrooms,$path,$phone,$address,$metros,$precio));
		}
		else
		{
			\Mail::to($mail_to)->bcc($bcc)->send(new PublicarMail($body,$subject,$name,$email,$bedrooms,$bathrooms,$path,$phone,$address,$metros,$precio));
		}

        if(count(\Mail::failures()) > 0 ) {
            return response()->json(['success' => false]);
        }else{
            return response()->json(['success' => true]);
        }
   
    }

public function sendVendedor(Request $request)
{
    $name = $request->name;
    $phone = $request->phone;
    $tipo_publicacion = $request->tipo_publicacion;
    
    $id_click = $request->id_click;
    
    if ($id_click) {
        $ultimo_click = Click_vendedor::find($id_click);
    } else {
        $ultimo_click = Click_vendedor::orderBy('created_at', 'desc')->first();
    }
    
    // ✅ CAMBIO: Ya no bloqueamos si no hay click, seguimos sin él
    // if (!$ultimo_click) {
    //     return response()->json(['success' => false, 'message' => 'No se encontró click previo']);
    // }
    
    $contador = Vendedor_interesado::count() + 1;
    if (strpos($tipo_publicacion, 'ayuda_precio') !== false) {
        $subject = "Propietario $contador: Ayuda precio";
    } else {
        $subject = "Propietario $contador: Me interesa";
    }
    
    $mail_to = ['roberto@iamoving.com'];
    $bcc = ['fataer@gmail.com'];
    
    try {
        \Mail::to($mail_to)->bcc($bcc)->send(new VendedorMail($name, $phone, $subject));
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'message' => 'Error enviando email']);
    }
    
    // ✅ CAMBIO: Obtener aterrizaje solo si hay click
    $aterrizaje = $ultimo_click ? Aterrizaje_vendedor::find($ultimo_click->id_aterrizaje) : null;
    
    $vendedor_interesado = new Vendedor_interesado();
    
    // ✅ CAMBIO: Asignar campos de click solo si existe
    $vendedor_interesado->id_aterrizaje = $ultimo_click ? $ultimo_click->id_aterrizaje : null;
    $vendedor_interesado->id_click       = $ultimo_click ? $ultimo_click->id : null;
    $vendedor_interesado->nombre         = $name;
    $vendedor_interesado->telefono       = $phone;
    $vendedor_interesado->tipo_boton     = $ultimo_click ? $ultimo_click->tipo_boton : $tipo_publicacion;
    $vendedor_interesado->boton_especifico = $ultimo_click ? $ultimo_click->boton_especifico : null;
    $vendedor_interesado->pagina         = $ultimo_click ? $ultimo_click->pagina 
                                           : (str_contains(request()->header('referer', ''), 'vender_gratis') ? 'vender_gratis' : 'vender');
    
    if ($aterrizaje) {
        $vendedor_interesado->utm_source    = $aterrizaje->utm_source;
        $vendedor_interesado->utm_ad        = $aterrizaje->utm_ad;
        $vendedor_interesado->utm_placement = $aterrizaje->utm_placement;
    }
    
    $vendedor_interesado->save();

    try {
        $metaService = new MetaConversionsService();
        $metaService->sendLead(
            $phone,
            $name,
            $request->ip(),
            $request->header('User-Agent'),
            $request->input('fbp'),
            $request->input('fbclid'),
            $request->input('event_id'),
            'https://iamoving.com/vender'
        );
    } catch (\Exception $e) {
        \Log::error('Error Meta CAPI en sendVendedor', ['error' => $e->getMessage()]);
    }
    
    if (count(\Mail::failures()) > 0) {
        return response()->json(['success' => false]);
    } else {
        return response()->json(['success' => true]);
    }
}

public function registrarAterrizajeVendedor(Request $request)
{
    $aterrizaje = new Aterrizaje_vendedor();
    $aterrizaje->utm_source = $request->utm_source;
    $aterrizaje->utm_ad = $request->utm_ad;
    $aterrizaje->utm_placement = $request->utm_placement;
    $aterrizaje->pagina = $request->pagina; // 👈 NUEVO
    $aterrizaje->save();
    
    return response()->json(['success' => true, 'id_aterrizaje' => $aterrizaje->id]);
}
    
public function registrarClickVendedor(Request $request)
{
    try {
        \Log::info('Intentando registrar click', $request->all());
        
        $click = new Click_vendedor();
        $click->id_aterrizaje = $request->id_aterrizaje;
        $click->tipo_boton = $request->tipo_boton;
        $click->boton_especifico = $request->boton_especifico;
        $click->pagina = $request->pagina;
        
        // Obtener datos UTM del aterrizaje si existe
        if ($request->id_aterrizaje) {
            $aterrizaje = Aterrizaje_vendedor::find($request->id_aterrizaje);
            if ($aterrizaje) {
                $click->utm_source = $aterrizaje->utm_source;
                $click->utm_ad = $aterrizaje->utm_ad;
                $click->utm_placement = $aterrizaje->utm_placement;
            }
        }
        
        $click->save();
        
        \Log::info('Click registrado con ID: ' . $click->id);
        
        return response()->json(['success' => true, 'id_click' => $click->id]);
        
    } catch (\Exception $e) {
        \Log::error('Error registrando click: ' . $e->getMessage());
        return response()->json(['success' => false, 'error' => $e->getMessage()]);
    }
}
public function registrarLeadWhatsAppAuto(Request $request)
{
    try {
        // Obtener el click asociado
        $click = Click_vendedor::find($request->id_click);
        
        if (!$click) {
            return response()->json(['success' => false, 'message' => 'Click no encontrado']);
        }
        
        // Crear el lead con datos limitados (sin nombre ni teléfono por ahora)
        $vendedor_interesado = new Vendedor_interesado();
        $vendedor_interesado->id_aterrizaje = $request->id_aterrizaje;
        $vendedor_interesado->id_click = $click->id;
        $vendedor_interesado->nombre = 'Pendiente - WhatsApp'; // Marcador
        $vendedor_interesado->telefono = 'Pendiente - WhatsApp'; // Marcador
        $vendedor_interesado->tipo_boton = $request->tipo_boton . '_whatsapp_auto';
        $vendedor_interesado->boton_especifico = $request->boton_especifico;
        $vendedor_interesado->pagina = $request->pagina;
        $vendedor_interesado->user_agent = $request->user_agent;
        $vendedor_interesado->screen_size = $request->screen_size;
        $vendedor_interesado->url_referrer = $request->url_referrer;
        
        // Si hay aterrizaje, copiar UTMs
        if ($request->id_aterrizaje) {
            $aterrizaje = Aterrizaje_vendedor::find($request->id_aterrizaje);
            if ($aterrizaje) {
                $vendedor_interesado->utm_source = $aterrizaje->utm_source;
                $vendedor_interesado->utm_ad = $aterrizaje->utm_ad;
                $vendedor_interesado->utm_placement = $aterrizaje->utm_placement;
            }
        }
        
        $vendedor_interesado->save();
        
        // Enviar notificación interna (opcional)
        $contador = Vendedor_interesado::count();
        $subject = "WhatsApp Auto-Lead - Propietario $contador: " . $request->tipo_boton;
        $mail_to = ['11roberto@iamoving.com'];
        $bcc = ['fataer@gmail.com'];
        
        try {
            \Mail::to($mail_to)->bcc($bcc)->send(new VendedorMail(
                'Pendiente de contacto',
                'Pendiente',
                $subject . " - ID: " . $vendedor_interesado->id
            ));
        } catch (\Exception $e) {
            \Log::error('Error email lead WhatsApp auto', ['error' => $e->getMessage()]);
        }
        
        // Enviar evento a Meta CAPI
        try {
            $metaService = new MetaConversionsService();
            $metaService->sendCustomEvent(
                'WhatsAppLead',
                $request->tipo_boton,
                $request->ip(),
                $request->header('User-Agent')
            );
        } catch (\Exception $e) {
            \Log::error('Error Meta CAPI lead WhatsApp', ['error' => $e->getMessage()]);
        }
        
        return response()->json(['success' => true, 'id' => $vendedor_interesado->id]);
        
    } catch (\Exception $e) {
        \Log::error('Error registrando lead WhatsApp auto', ['error' => $e->getMessage()]);
        return response()->json(['success' => false, 'error' => $e->getMessage()]);
    }
}
    
}
