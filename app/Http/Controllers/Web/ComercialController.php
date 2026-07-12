<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Colaboradores;
use App\Mail\ComercialMail;
use App\Mail\ComercialAceptaMail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade as PDF;

class ComercialController extends Controller
{
	
	  public function show($id) 
    {
        
        $service = Colaboradores::find($id);
        if($service->estado!=null){
            return view('web.comercial.show', compact('service'));    
        }else{
            \App::abort(500, 'La pagina solicitada no existe');
        }

        
    }
	
    public function index()
    {
		Session::put('comercial_url', request()->fullUrl());
        return view('web.comercial.index');        
    }

	public function obtenerFechaEnLetra($fecha)
	{
		// asigno a la variable $dia el dia de la semana dada una fecha ver funcion conocerDiaSemanaFecha
		//$dia = $this->conocerDiaSemanaFecha($fecha);
		// asigno a la variable $num el número del dia de la fecha dada ejemplo: 17/06/2016 $num = 17 ver date en http://php.net/manual/es/function.date.php
		$num = date("j", strtotime($fecha));
		// asigno a la variable $anno el año de la fecha dada ejemplo: 17/06/2016 $anno = 2016 ver date en http://php.net/manual/es/function.date.php
		$anno = date("Y", strtotime($fecha));
		// asigno a la variable $mes una lista de los meses donde cada elemento de la lista concide con el numero del mes - 1
		$mes = array('enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre');
		// redefino la variable $mes que es una lista con el número de mes que me devuelve la (date('m', strtotime($fecha)), lo multiplico x1 y le
		// resto -1 ejemplo : fecha-> 17/06/2016 (date('m', strtotime($fecha))-> m= 07*1 -> 7-1 = 6 -> $mes[6] = junio
		$mes = $mes[(date('m', strtotime($fecha)) * 1) - 1];
		// retorno todo los valores concatenados como quiero ejemplo: Viernes, 17 de junio del 2016
		//return $dia . ', ' . $num . ' de ' . $mes . ' del ' . $anno;
		return $num . ' de ' . $mes . ' del ' . $anno;
	}
	
    public function send(Request $request)
    {
        $name = $request->name;
		$email = $request->email;
        $phone = $request->phone;
		$address = $request->address;
		$dni = $request->nif;
		$comercial="1";
		$today_1 = Carbon::now()->format('d-m-Y');
		$num = date("d", strtotime($today_1));
		$anno = date("Y", strtotime($today_1));
		$mes = array('enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre');
		$mes = $mes[(date('m', strtotime($today_1)) * 1) - 1];
		$fecha_letra= $num . ' de ' . $mes . ' del ' . $anno;
		$path_contrato = $today_1.'_'.$name.'_contrato.pdf';

				
        	
        if(!Colaboradores::where('email',$email)->exists()){
		
		//Grabar
		    $colaborador = new Colaboradores();
			$colaborador->name = $name;
		    $colaborador->email = $email;
			$colaborador->address = $address;
			$colaborador->phone = $phone;
			$colaborador->dni = $dni;
			$colaborador->comercial = $comercial;
			$colaborador->aceptadas_condiciones = Carbon::now()->format('Y-m-d H:i:s');
			$colaborador->path_contrato = $path_contrato;
			$colaborador->save();
			
			if($request->hasFile('avatar')){
                $avatar = $request->file('avatar');;
                $avatar->storeAs('colaboradores/'.$colaborador->id, $avatar->getClientOriginalName());
                $path = "colaboradores/". $colaborador->id ."/" . $avatar->getClientOriginalName();
                $colaborador->avatar = $path;
                $colaborador->save();
            }
    
            if($request->hasFile('nif_img')){
                $nifs = $request->file('nif_img');
                foreach ($nifs as $idx=>$nif) {
                    $nif->storeAs('colaboradores/'.$colaborador->id, $nif->getClientOriginalName());
                    $path = "colaboradores/". $colaborador->id ."/" .$nif->getClientOriginalName();
                    if($idx == 0){
                        $colaborador->nif_image = $path;
                    }else{
                        $colaborador->nif_image2 = $path;
                    }
                    $colaborador->save();
                    
                }
    
            }
			
			$content = PDF::loadView('iamovingpro.contratos.comercial', compact(['fecha_letra','name','email','phone','address','dni']))->output();

			Storage::disk('public')->put('/comercial/'.$path_contrato, $content);			
			
            $mail_to = explode(",",env('MAIL_TO'));
            $bcc = explode(",",env('MAIL_OCULTO'));
            
        
            $avatar = null;
            $nif_image = null;
            $nif_image2 = null;
            if($colaborador->avatar!=''){
                $avatar = url('/') . "/storage/" . $colaborador->avatar;
            }
            if($colaborador->nif_image!=''){
                $nif_image = url('/') . "/storage/" . $colaborador->nif_image;
            }
            if($colaborador->nif_image2!=''){
                $nif_image2 = url('/') . "/storage/" . $colaborador->nif_image2;
            }
            
            $subject = "Solicitud de colaboración de comercial con IAMOVING";
            \Mail::to($mail_to)->bcc($bcc)->send(new ComercialMail($dni,$subject,$name,$email,$phone,$address,$avatar,$nif_image,$nif_image2,$comercial,$path_contrato));
			
			\Mail::to($email)->send(new ComercialAceptaMail($dni,$subject,$name,$email,$phone,$address,$avatar,$nif_image,$nif_image2,$comercial,$path_contrato));
            
			
            if(count(\Mail::failures()) > 0 ) {
				
					if ($request->session()->has('comercial_url')) {
						 return redirect($request->session()->get('comercial_url'))->with('error','No se ha podido enviar su mensaje');
					}
                return redirect()->route('comercial')->with('error','No se ha podido enviar su mensaje');
            }else{
					if ($request->session()->has('comercial_url')) {
						 return redirect($request->session()->get('comercial_url'))->with('error','Enviado, en breve recibirás un mensaje en tu correo electrónico.');
					}				
                return redirect()->route('comercial')->with('success','Su mensaje ha sido enviado');
            }
			//return redirect()->route('comercial')->with('success','Su mensaje ha sido enviado');
        }else{
					if ($request->session()->has('comercial_url')) {
						 return redirect($request->session()->get('comercial_url'))->with('error','Este email ya está dado de alta');
					}		
            return redirect()->route('comercial')->with('error','Este email ya está dado de alta');
        }
        
    }
}
