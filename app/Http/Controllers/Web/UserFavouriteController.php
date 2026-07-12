<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\UserFavourite;
use App\InformeDetalladoCabecera;

class UserFavouriteController extends Controller
{
	public function __construct()
	{
		$this->middleware('jwt.auth', ['except' => ['index']]);
	}

	public function index()
	{

		return view('web.profile.favoritos');
	}

	public function favoritos()
	{
		$user = auth('api')->user();
		$favoritos = UserFavourite::with('inmueble')->where('user_id',$user->id)->get();

		return response()->json(['favoritos' => $favoritos], 200);
	}


    public function guardar(Request $request){
		try {
	    	$user = auth('api')->user();
	    	if (UserFavourite::where('user_id', $user->id)->where('inmueble_id',$request->reference)->count() == 0) {
		    	$uf = new UserFavourite();
		    	$uf->user_id = $user->id;
		    	$uf->inmueble_id = $request->reference;
		    	$uf->save();
		        
		    }
			return response()->json(['success' => true], 200);
	    }catch (\Exception $e) {
    		return response()->json(['success' => false], 400);
    	}

    }

    
}

