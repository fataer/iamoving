<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Colaboradores;
use App\Mail\PaqueteMail;
use App\Mail\PaqueteAceptaMail;
use Carbon\Carbon;

class PaqueteController extends Controller
{
	
	    public function show($id) 
    {
        
        $service = Colaboradores::find($id);
        if($service->estado!=null){
            return view('web.paquete.show', compact('service'));    
        }else{
            \App::abort(500, 'La pagina solicitada no existe');
        }

        
    }
	
    public function index()
    {
        return view('web.paquete.index');        
    }

    public function send(Request $request)
    {
        //$company = $request->company;
        $address = $request->address;
        //$web = $request->web;
        $phone = $request->phone;
        $email = $request->email;
        $name = $request->name;
		//coger la hora
		$paquete_servicios="1";
        $dni = $request->nif;
        
        if(!Colaboradores::where('email',$email)->exists()){
		
		//Grabar
		
		    $colaborador = new Colaboradores();
			$colaborador->name = $name;
		    $colaborador->email = $email;
			$colaborador->address = $address;
			$colaborador->phone = $phone;
			$colaborador->dni = $dni;
			$colaborador->paquete_servicios = $paquete_servicios;
			$colaborador->aceptadas_condiciones = Carbon::now()->format('Y-m-d H:i:s');
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
            
            $subject = "Solicitud de colaboración paquete de servicios con IAMOVING y PreUni.es";
            \Mail::to($mail_to)->bcc($bcc)->send(new PaqueteMail($dni,$subject,$name,$email,$phone,$address,$avatar,$nif_image,$nif_image2,$paquete_servicios));
			
			\Mail::to($email)->send(new PaqueteAceptaMail($dni,$subject,$name,$email,$phone,$address,$avatar,$nif_image,$nif_image2,$paquete_servicios));
            
            if(count(\Mail::failures()) > 0 ) {
                return redirect()->route('paqueteservicios')->with('error','No se ha podido enviar su mensaje');
            }else{
                return redirect()->route('paqueteservicios')->with('success','Su mensaje ha sido enviado');
            }
        }else{
            return redirect()->route('paqueteservicios')->with('error','Este email ya está dado de alta');
        }
        
    }
}
