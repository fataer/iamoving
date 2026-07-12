<?php

use App\InformeDetalladoCabecera;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/**
 * Rutas de la web
 * 
 */
Route::namespace('Web')->group(function() {
	// Detalles
	Route::post('details/{id}', 'DetalleController@getDetails');
	Route::post('lugares/{id}', 'DetalleController@getDetailsLugar');

	// Pruebas
	//Route::get('test/{id}', 'DetalleController@getDetails');
});

Route::get('/listadoInformedeTallado','InformeDetalladoController@dataDetalalda')->name('listadoInformedeTallado');

Route::post('informe-detallado-guardado','InformeDetalladoController@store')->name('informe-detallado-guardado');

Route::get('/filter-data-meters/{id}',function($id){
  
	 //    $numerosDormitorios= \App\InformeDetalladoDetalle::where('fk_id_informe_detallado_cabecera',$id)
	 //                                                 ->where('tamano_aproximado_dormitorio','>',0)
		// 										    ->select('tamano_aproximado_dormitorio')
		// 										    ->count('tamano_aproximado_dormitorio');
												    

		// $numerobanos = \App\InformeDetalladoDetalle::where('fk_id_informe_detallado_cabecera',$id)
		//                       ->where('tamano_aprox_banos','>',0)
		//                       ->select('tamano_aprox_banos')
		//                       ->count('tamano_aprox_banos');

		   $orientacionSalon= DB::select('select  id, orientacion_salon  from informe_detallado_detalle
									   where fk_id_informe_detallado_cabecera ='.$id.'
									   and CHARACTER_LENGTH(orientacion_salon)>0');

			$orientacionDormitorios= DB::select('select  id, orientacion_dormitorio  from informe_detallado_detalle
									   where fk_id_informe_detallado_cabecera ='.$id.'
									   and CHARACTER_LENGTH(orientacion_dormitorio)>0');                                        
							  

		 $data['data']= array(
		    'salones'=>$orientacionSalon,
		    'dormitorios'=>$orientacionDormitorios
		 );

	return $data;
});
