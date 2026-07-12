<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\ComprarAlquilerEmail;
use App\User;
use App\InformeDetalladoCabecera;
use App\Transformers\Json;

class ComprarAlquilarController extends Controller
{
    public function send(Request $request)
    {
        $user = User::where('id',$request->user_id);
        $inmueble = InformeDetalladoCabecera::where('id',$request->reference);
		$reference = InformeDetalladoCabecera::findOrFail($request->reference);
		//$mail_to =  $inmueble->email;
        if($user->count() > 0 && $inmueble->count() > 0){
            $u = $user->first();
            $i = $inmueble->first();
            $name = $u->name;

            $mail_to =  $reference->email;
			
            $bcc = explode(",",env('MAIL_BCC'));

            \Mail::to($mail_to)->bcc($bcc)->send(new ComprarAlquilerEmail($i->is_sale,$u->name,$u->email,$u->phone,$i));
            if(count(\Mail::failures()) > 0 ) {
                return response()->json(Json::response(false, "No se pudo enviar la solicitud", 400));
            }else{
                return response()->json(Json::response(true, "Notificacion enviada", 200));
            }    
        }else{
            return response()->json(Json::response(false, "Datos invalidos", 400));
        }        
    }
}
