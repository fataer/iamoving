<?php

namespace App\Http\Controllers\Web;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\GlobalController;
use App\Transformers\Json;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{

    use ResetsPasswords;

    public function reset(Request $request){
        $this->validate($request, $this->rules(), $this->validationErrorMessages());
        $response = $this->broker()->reset(
            $this->credentials($request), function ($user, $password) {
                $this->resetPassword($user, $password);
            }
        );

        if ($request->wantsJson()) {
            if ($response == Password::PASSWORD_RESET) {
                return response()->json(Json::response(true, trans('passwords.reset')));
            } else {
                return response()->json(Json::response(false, trans($response), 202));
            }
        }
    }
    


}
