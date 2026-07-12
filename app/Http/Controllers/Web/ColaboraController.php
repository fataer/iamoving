<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Colaboradores;
use App\Mail\ColaboraMail;
use App\Mail\ColaboraAceptaMail;
use App\Mail\ColaboradorActualizaEmail;
use Carbon\Carbon;

class ColaboraController extends Controller
{
	
	 public function show($id) 
    {
        
        $service = Colaboradores::find($id);
        if($service->estado!=null){
            return view('web.colabora.show', compact('service'));    
        }else{
            \App::abort(500, 'La pagina solicitada no existe');
        }

        
    }
	
    public function index()
    {
        return view('web.colabora.index');        
    }
	
	public function actualiza($id)
    {
		$service = Colaboradores::find($id);
        if($service->estado!=null && $service->actualiza!=null){
            return view('web.colabora.actualiza', compact('service'));    
        }else{
			if($service->estado==1 ){
				return view('web.colabora.exito', compact('exito-iamoving')); 
			}
			else{
				\App::abort(500, 'La pagina solicitada no existe');
			}
        }		
	}
	
       public function condiciones(Request $request){
           
           try{
                $cabecera_detalle = Colaboradores::findOrFail($request->id);
                
                $pdf_url = "https://iamoving.com/storage/condiciones/" . env("CONDICIONES_COLABORADOR","");
                $fecha_aceptacion = date('Y-m-d H:i:s'); 
                
                /*$propietario = new Propietario();
                $propietario->id_inmueble = $request->id;
                $propietario->name = $cabecera_detalle->nombre_e;
                $propietario->email = $cabecera_detalle->email_e;
                $propietario->telefono = $cabecera_detalle->telefono_e;
                //$propietario->direccion = $cabecera_detalle->direccion;
				$propietario->direccion = $cabecera_detalle->road." ".$cabecera_detalle->numero_direccion." ".$cabecera_detalle->number_apartment ;
                $propietario->path_condiciones = $pdf_url;
                $propietario->fecha_aceptacion = $fecha_aceptacion;
                //$propietario->tipo_plan = $cabecera_detalle->tipo_plan;
                $propietario->condiciones_aceptadas = 1;
				$propietario->ciudad_inmueble = $cabecera_detalle->ciudad_inmueble;
				$propietario->fecha_de_alta = $cabecera_detalle->fecha_de_alta;
                $propietario->save();*/
                
				$cabecera_detalle->name = $cabecera_detalle->name;
                $cabecera_detalle->actualiza = null;
                $cabecera_detalle->nota = null;
                $cabecera_detalle->updated_at = $fecha_aceptacion;
                $cabecera_detalle->condiciones_aceptadas = $pdf_url;
				$cabecera_detalle->aceptadas_condiciones =  $fecha_aceptacion;
                $cabecera_detalle->save();
                
                $destinatario =  $cabecera_detalle->email;
                $bcc = env("MAIL_OCULTO","");
                
                \Mail::to($destinatario)->bcc($bcc)->send(new ColaboradorActualizaEmail($cabecera_detalle));
                
                
               // \Mail::to($cabecera_detalle->email)->send(new PropietarioEmail($cabecera_detalle));
           
                //return response()->json(['success' => true]);
				return redirect()->route('exito-iamoving');
           }catch(Exception $e){
                abort(500);
           }
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
		
        $dni = $request->nif;
        
        if(!Colaboradores::where('email',$email)->exists()){
		
		//Grabar
		
		    $colaborador = new Colaboradores();
			$colaborador->name = $name;
		    $colaborador->email = $email;
			$colaborador->address = $address;
			$colaborador->phone = $phone;
			$colaborador->dni = $dni;
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
            
            $subject = "Solicitud de colaboración con IAMOVING";
            \Mail::to($mail_to)->bcc($bcc)->send(new ColaboraMail($dni,$subject,$name,$email,$phone,$address,$avatar,$nif_image,$nif_image2));
			
			\Mail::to($email)->send(new ColaboraAceptaMail($dni,$subject,$name,$email,$phone,$address,$avatar,$nif_image,$nif_image2));
            
            if(count(\Mail::failures()) > 0 ) {
                return redirect()->route('colabora')->with('error','No se ha podido enviar su mensaje');
            }else{
                return redirect()->route('colabora')->with('success','Su mensaje ha sido enviado');
            }
        }else{
            return redirect()->route('colabora')->with('error','Este email ya está dado de alta');
        }
        
    }
}
