<?php

namespace App\Http\Controllers\iamovingpro;

use App\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use App\Alerta;

class FiltersController extends Controller
{
    public function saveFilters(Request $request){
        $postData = json_decode($request->getContent(), true);
        $isNew = true;
        if(array_key_exists("alerta_id", $postData)){
            //$alerta = Alerta::where('user_id',$postData['user_id'])->get();    
            $alerta = Alerta::find($postData['alerta_id']);    
            $isNew = false;
        }
        
        
        
        if($isNew){
           
            $alerta = new Alerta();
            $alerta->filtros = 1;
            $alerta->user_id = $postData['user_id'];
            $alerta->alquiler = $postData['category'] == 0;
            $alerta->precio_minimo = trim(explode(" ",$postData['propiedad_price'])[0]);
            $alerta->precio_maximo = trim(explode(" ",$postData['price'])[0]);
            $alerta->metros_minimo = trim($postData['propiedad_tamano']) != ""  ? (int)$postData['propiedad_tamano'] : null;
            $alerta->metros_maximo = trim($postData['tamano']) != "" ? (int)$postData['tamano'] : null;
            $alerta->dormitorios = count($postData['piesas']) > 0 ? implode(",",$postData['piesas']) : null;
            $alerta->banos =  count($postData['numerosBanos']) > 0 ? implode(",",$postData['numerosBanos']) : null;
            $alerta->estado_alerta_id = 1;
            $alerta->descripcion1 = 'Alerta de preferencias de búsqueda';
            $alerta->descripcion2 = '';
            $alerta->cuidad_inmueble = $postData['city'];
            $alerta->tipo_inmueble = $postData['tipoinmueble'];
            $alerta->tipo_vivienda = count($postData['furnished_types']) > 0 ? implode(",",$postData['furnished_types']) : null;
            $alerta->amueblado = count($postData['qualities']) > 0 ? implode(",",$postData['qualities']) : null;
            $alerta->estado_inmueble = count($postData['estadoInmueble']) > 0 ? implode(",",$postData['estadoInmueble']) : null;
            $alerta->es_importante = count($postData['access']) > 0 ? implode(",",$postData['access']) : null;
            $alerta->calefaccion = count($postData['heating']) > 0 ? implode(",",$postData['heating']) : null;
    	    $alerta->caldera_agua = count($postData['calderaAgua']) > 0 ? implode(",",$postData['calderaAgua']) : null;
    	    $alerta->contrato = $postData['contract'];
    	    $alerta->extras = count($postData['building']) > 0 ? implode(",",$postData['building']) : null;
    
            if($alerta->save()){
                return response()->json(['success'=> true,'message'=>'Alerta guardada']);
            }else{
                return response()->json(['success'=> false]);
            }
        }else{
            //$alerta = $alerta->first();
            $alerta->alquiler = $postData['category'] == 0;
            $alerta->precio_minimo = trim(explode(" ",$postData['propiedad_price'])[0]);
            $alerta->precio_maximo = trim(explode(" ",$postData['price'])[0]);
            
            $alerta->metros_minimo = trim($postData['propiedad_tamano']) != ""  ? (int)$postData['propiedad_tamano'] : null;
            $alerta->metros_maximo = trim($postData['tamano']) != "" ? (int)$postData['tamano'] : null;
            
            $alerta->dormitorios = count($postData['piesas']) > 0 ? implode(",",$postData['piesas']) : null;
            $alerta->banos =  count($postData['numerosBanos']) > 0 ? implode(",",$postData['numerosBanos']) : null;
            
            $alerta->estado_alerta_id = 1;
            $alerta->descripcion2 = '';
            
            $alerta->tipo_inmueble = $postData['tipoinmueble'];
            $alerta->tipo_vivienda = count($postData['furnished_types']) > 0 ? implode(",",$postData['furnished_types']) : null;
            $alerta->amueblado = count($postData['qualities']) > 0 ? implode(",",$postData['qualities']) : null;
            $alerta->estado_inmueble = count($postData['estadoInmueble']) > 0 ? implode(",",$postData['estadoInmueble']) : null;
            $alerta->es_importante = count($postData['access']) > 0 ? implode(",",$postData['access']) : null;
            $alerta->calefaccion = count($postData['heating']) > 0 ? implode(",",$postData['heating']) : null;
    	    $alerta->caldera_agua = count($postData['calderaAgua']) > 0 ? implode(",",$postData['calderaAgua']) : null;
    	    $alerta->contrato = $postData['contract'];
    	    $alerta->extras = count($postData['building']) > 0 ? implode(",",$postData['building']) : null;
    	    if($alerta->save()){
                return response()->json(['success'=> true, 'message'=>'Alerta actualizada']);
            }else{
                return response()->json(['success'=> false]);
            }
        }
        return response()->json(['success'=> true, 'data'=> $postData]);
    }
}
