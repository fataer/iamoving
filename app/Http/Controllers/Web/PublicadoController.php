<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Publicado;
//TODO HAY QUE CREARLOSS!!
use App\Mail\PublicadoMail;
use App\Mail\PublicadoAceptaMail;
use Carbon\Carbon;

class PublicadoController extends Controller
{
	

	
    public function index()
    {
        return view('web.publicado.index');        
    }
	
    public function old()
    {
        return view('web.publicado.old');        
    }	
	
	public function iamovingfree()
    {
        return view('web.publicado.free');        
    }

	public function venta()
    {
        return view('web.publicado.venta');        
    }
	
    public function send(Request $request)
    {
		$plan = $request->plan;
        $city = $request->city;
        $address = $request->address;
        $owner = $request->owner;
        $phone = $request->phone;
        $email = $request->email;
        $name = $request->name;
		$pdf_url = "https://iamoving.com/storage/condiciones/" . env("CONDICIONES","");
		$visit_date = $request->date;
	    $visit_time = $request->time;
		//coger la hora
		$tipo_solicitud = $request->subject;
        $dni = $request->nif;
        
		//Grabar
		
		    $publicado = new Publicado();
			$publicado->tipo_plan = $plan;
			$publicado->propietario_inmobiliaria = $owner;
			$publicado->ciudad_inmueble = $city;
			$publicado->name = $name;
		    $publicado->email = $email;
			$publicado->direccion = $address;
			$publicado->telefono = $phone;
			$publicado->dni = $dni;
			$publicado->fecha_visita = $visit_date;
			$publicado->hora_visita = $visit_time;
			$publicado->path_condiciones = $pdf_url;
			$publicado->condiciones_aceptadas = Carbon::now()->format('Y-m-d H:i:s');
			$publicado->tipo_solicitud = $tipo_solicitud;
			$publicado->save();
			
            if($request->hasFile('nif_img')){
                $nifs = $request->file('nif_img');
                foreach ($nifs as $idx=>$nif) {
                    $nif->storeAs('publicado/'.$publicado->id, $nif->getClientOriginalName());
                    $path = "publicado/". $publicado->id ."/" .$nif->getClientOriginalName();
                    if($idx == 0){
                        $publicado->nif_image = $path;
                    }else{
                        $publicado->nif_image2 = $path;
                    }
                    $publicado->save();
                    
                }
    
            }
			
			
            $mail_to = explode(",",env('MAIL_TO'));
            $bcc = explode(",",env('MAIL_OCULTO'));
			
            $nif_image = null;
            $nif_image2 = null;
            if($publicado->nif_image!=''){
                $nif_image = url('/') . "/storage/" . $publicado->nif_image;
            }
            if($publicado->nif_image2!=''){
                $nif_image2 = url('/') . "/storage/" . $publicado->nif_image2;
            }			
            
            if($tipo_solicitud == "Alquiler"){
				$subject = "Solicitud alquiler confirmada";
			}elseif($tipo_solicitud == "Iamovingfree"){
				$subject = "Solicitud IAMOVINGfree confirmada";    
			}elseif($tipo_solicitud == "Venta"){
				$subject = "Solicitud venta confirmada";    
			}elseif($tipo_solicitud == "Antiguo"){
				$subject = "Solicitud confirmada";    
			}
            //$subject = "Solicitud confirmada";
            \Mail::to($mail_to)->bcc($bcc)->send(new PublicadoMail($dni,$subject,$name,$email,$phone,$address, $plan, $owner, $city,$visit_date ,$visit_time ,$nif_image,$nif_image2));
			
			\Mail::to($email)->send(new PublicadoAceptaMail($dni,$subject,$name,$email,$phone,$address, $plan, $owner, $city,$visit_date ,$visit_time));
            
            /*if(count(\Mail::failures()) > 0 ) {
                return redirect()->route('publicado')->with('error','No se ha podido enviar su mensaje');
            }else{
                return redirect()->route('publicado')->with('success','Su mensaje ha sido enviado');
            }*/
            if($tipo_solicitud == "Alquiler"){
				if(count(\Mail::failures()) > 0 ) {
					return redirect()->route('publicado')->with('error','No se ha podido enviar su mensaje');
				}else{
					return redirect()->route('publicado')->with('success','Su mensaje ha sido enviado');
				}
			}elseif($tipo_solicitud == "Iamovingfree"){
				if(count(\Mail::failures()) > 0 ) {
					return redirect()->route('iamovingfree')->with('error','No se ha podido enviar su mensaje');
				}else{
					return redirect()->route('iamovingfree')->with('success','Su mensaje ha sido enviado');
				}
			}elseif($tipo_solicitud == "Venta"){
				if(count(\Mail::failures()) > 0 ) {
					return redirect()->route('venta')->with('error','No se ha podido enviar su mensaje');
				}else{
					return redirect()->route('venta')->with('success','Su mensaje ha sido enviado');
				}   
			}elseif($tipo_solicitud == "Antiguo"){
				if(count(\Mail::failures()) > 0 ) {
					return redirect()->route('antiguo')->with('error','No se ha podido enviar su mensaje');
				}else{
					return redirect()->route('antiguo')->with('success','Su mensaje ha sido enviado');
				}   
			}			
        
    }
}
