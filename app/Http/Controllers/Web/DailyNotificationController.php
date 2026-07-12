<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Alerta;
use App\User;
use App\Campana;
use Carbon\Carbon;
use App\Mail\DailyNotificationMail;

class DailyNotificationController extends Controller
{
    
    public function run(Request $request)
    {
        $users = User::where('procesado',1)->where('role_id', 4)->get();
        foreach($users as $user){
            \Mail::to($user->email)->send(new DailyNotificationMail($user));
        }
        return view('web.daily_notification.sent',['count'=> $users->count()]);  
    }
	
	public function add(Request $request) 
    {
        $user = User::find($request->id);
        if($user){
            if(Alerta::where('user_id',$user->id)->get()->count() == 0){
                $alerta = new Alerta();
                $alerta->user_id = $request->id;
                $alerta->descripcion1 = "Alerta todo Iamoving";
                $alerta->estado_alerta_id = 1;
                if($alerta->save()){
                    $user->procesado = 0;
                    $user->fecha_ult_procesado = date('Y-m-d H:i:s');
                    $user->save();
                    
                    $campana = new Campana();
                    $campana->user_id = $request->id;
                    $campana->descripcion = $request->cp;
                    $campana->save();
                    
                    return view('web.daily_notification.success');    
                }else{
                    return view('web.daily_notification.error');    
                }
            }
        }else{
            return view('web.daily_notification.error');    
        }
        
    }
	
}
