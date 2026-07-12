<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Propietario;
use App\InformeDetalladoCabecera;
use App\Mail\PropietarioAceptaEmail;
use App\Mail\PropietarioEmail;
use App\Mail\PropietarioVentaEmail;

use Storage;

class RegistroInmuebleController extends Controller
{
       public function disponible(Request $request){
           
           try{
                $cabecera_detalle = InformeDetalladoCabecera::findOrFail($request->id);
                
                $pdf_url = "https://iamoving.com/storage/condiciones/" . env("CONDICIONES","");
                $fecha_aceptacion = date('Y-m-d H:i:s'); 
                
                $propietario = new Propietario();
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
                $propietario->save();
                
                $cabecera_detalle->estado_inmueble = "Disponible";
                $cabecera_detalle->path_condiciones = $pdf_url;
                $cabecera_detalle->fecha_aceptacion = $fecha_aceptacion;
                $cabecera_detalle->condiciones_aceptadas = 1;
                $cabecera_detalle->save();
                
                $destinatario = env("MAIL_PU","");
                $bcc = env("MAIL_OCULTO","");
                
                \Mail::to($destinatario)->bcc($bcc)->send(new PropietarioAceptaEmail($cabecera_detalle));
                
                if ($cabecera_detalle->is_sale=='0'){
					\Mail::to($cabecera_detalle->email_e)->send(new PropietarioEmail($cabecera_detalle));
				}
				else
				{
					\Mail::to($cabecera_detalle->email_e)->send(new PropietarioVentaEmail($cabecera_detalle));
				}
                return response()->json(['success' => true]);
           }catch(Exception $e){
                abort(500);
           }
       }
}