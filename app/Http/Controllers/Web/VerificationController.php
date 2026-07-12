<?php

namespace App\Http\Controllers\Web;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\GlobalController;
use App\Transformers\Json;

class VerificationController extends Controller
{

    public function verify(Request $request){
        
        $user = User::where('verification_code',$request->verification_code);
        if($user->count() > 0){
            $u = $user->first();
            $u->email_verified_at = date('Y-m-d H:i:s');
            $u->save();
            return response()->json(Json::response(true, "Usuario verificado", 200));
        }else{
            return response()->json(Json::response(null, "No se ha podido verificar"), 400);
        }
    }
    


}
