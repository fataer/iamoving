<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;



    /// api estados y respuestas
    public function ConnectionServerFailed(){

    	$response['status'] = 500;
    	$response['message'] = "La información que desea consultar no registra en nuestra base de datos"; 
    	$response['data'] = [];
    	return $response;
    }

    public function ConnectSuccess($data){

    	$response['status'] = 201;
    	$response['message'] = "Conexión exitosa con el servidor"; 
    	$response['data'] = $data;
    	return $response;
    }

    public function registerSuccess(){
    	$response['status'] = 201;
    	$response['message'] = "Registrado con exito"; 
    	return $response;
    }

    public function UpdateSuccess($data){
        
        $response['status'] = 200;
        $response['message'] = "Conexión exitosa con el servidor"; 
        $response['data'] = $data;
        return $response; 
    }
    /// 
}
