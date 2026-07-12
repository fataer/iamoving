<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Facades\Voyager;
use App\User;

class AdminAuthController extends Controller
{
    use AuthenticatesUsers;

    public function postLogin(Request $request)
    {
    	if(User::where('email',$request->email)->whereIN('role_id',[1,2])->get()->count() > 0){
	        $this->validateLogin($request);

	        if ($this->hasTooManyLoginAttempts($request)) {
	            $this->fireLockoutEvent($request);

	            return $this->sendLockoutResponse($request);
	        }

	        $credentials = $this->credentials($request);

	        if ($this->guard()->attempt($credentials, $request->has('remember'))) {
	            return $this->sendLoginResponse($request);
	        }

	        $this->incrementLoginAttempts($request);

        	return $this->sendFailedLoginResponse($request);
	    }else{

        	$this->incrementLoginAttempts($request);

        	return $this->sendFailedLoginResponse($request);
        }
    }


}
