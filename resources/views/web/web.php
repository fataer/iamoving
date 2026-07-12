<?php

use App\InformeDetalladoCabecera;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * Rutas admin
 * 
 */

// Route::get('/user-t',function(){

//     dd(\App\User::all());
//     $user= new \App\User();
//     $user->email="admin10@email.com";
//     $user->name="admin";
//     $user->role_id=1;
//     $user->password=bcrypt("12345678");
//     $user->save();



// });
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
    Route::post('login', ['uses' => 'AdminAuthController@postLogin', 'as' => 'postlogin']);


	Route::get('/informe-detallado-edit', 'InformeDetalladoController@edit');
	Route::get('/informe-detallado-cabecera', 'InformeDetalladoController@index')->name('voyager.informe-detallado-cabecera.index');
	Route::post('/informe-detallado-cabecera', 'InformeDetalladoController@store');
	Route::post('/informe/{id}/update', 'InformeDetalladoController@update');

	Route::get('/informebasico', 'informeBasicoController@index')->name('voyager.informebasico.index');
	Route::post('/informebasico', 'informeBasicoController@store')->name('voyager.informebasico.store');
	// Route::post('/informe/{id}/detail', 'InformeDetalladoController@newDetail');
	// Route::delete('/informe/{id}/detail', 'InformeDetalladoController@removeDetail');

	Route::get('/informe/{search}', 'InformeDetalladoController@search');
});

/**
 * Rutas de la web
 * 
 */
Route::namespace('Web')->group(function() {
	Route::post('/registro_propietario','RegistroInmuebleController@disponible');
	// Home
	//Route::get('/', 'HomeController@mantenimiento');
	//Route::get('/', 'HomeController@index');
	//Route::get('/home','HomeController@index')->name('home'); // index

	// Detalle
	//Route::get('VisitaVirtual/{id}', 'DetalleController@show');
	//Route::get('detalle/{id}', 'NovideoController@show');
	//Route::get('VisitaVirtual/{id}', 'DetalleController@show');

	// Solicitudes
	Route::post('solicitud/{reference}', 'SolicitudController@store');

	// barrrios
	Route::get('barrios', 'ZoneController@index');
	Route::get('barrio/{id}', 'ZoneController@show');

	// Busqueda
	Route::get('search', 'SearchController@index');
	Route::post('search/{category}', 'SearchController@searchFilters');

	// Servicios
	Route::get('servicio/{id}', 'ServiceController@show');
	Route::get('servicio/{service}/{id}', 'ServiceController@showSubService');
//Tarjeta
Route::get('tarjeta/{id}', 'ColaboraController@show');
	
	// Nosotros
	Route::get('/quien-somos', function() {
		return view('web.nosotros.index');
	});
	
	Route::get('/calculadoras', function() {
		return view('web.calculadora.index');
	});

	// Anuncios
	Route::get('/vende-con-nosotros', function() {
		return view('web.anuncios.venta');
	})->name('vende-con-nosotros');

	Route::get('/alquila-con-nosotros',function(){
	   	return view('web.anuncios.alquilar');
	})->name('alquila-con-nosotros');

	//Route::get('/plan-proteccion-alquiler', function() {
	Route::get('/alquilar-con-Iamoving-prime', function() {
		return view('web.anuncios.proteccion');
	})->name('alquilar-con-Iamoving-prime');
	
	Route::get('/alquilar-con-Iamoving-basic', function() {
		return view('web.anuncios.basic');
	})->name('alquilar-con-Iamoving-basic');

	Route::get('/vendiendo-con-Iamoving', function() {
		return view('web.anuncios.vendiendo');
	})->name('vendiendo-con-Iamoving');	
	
	Route::get('/testimonios-iamoving', function() {
		return view('web.testimonios.testimonio');
	})->name('testimonios-iamoving');	

	Route::get('/bonificacion-en-efectivo', function() {
		return view('web.anuncios.bonificacion');
	})->name('bonificacion-en-efectivo');	

	Route::get('/buscando-inmuebles-alquiler',function(){
		return view('web.buscando.alquiler');
	});
	Route::get('/buscando-inmuebles-venta',function(){
		return view('web.buscando.venta');
	});

	// Canal
	Route::get('canal/{id}', 'CanalController@show');

	// Inmueble
	Route::get('inmuebles', 'InmuebleController@index');

	// Contratos
	Route::get('aviso-legal', function() {
		return view('web.contratos.aviso');
	});
		// Terminos
/*	Route::get('/terminosP-condiciones', function() {
		return view('web.contratos.terminosP');
	});

		// Terminos
	Route::get('/terminosC-condiciones', function() {
		return view('web.contratos.terminosC');
	});

		// Terminos
	Route::get('/terminos-condiciones', function() {
		return view('web.contratos.terminos');
	});*/

		// Politicas
	/*Route::get('politica-privacidad', function() {
		return view('web.contratos.politica');
	});	*/
	
	// IamoPro
	/*Route::get('IAMpro', function() {
		return view('web.iampro.iampro');
	});*/		

	Route::get('contactanos', 'ContactanosController@index')->name('contactanos');
	Route::post('contacto_notificar', 'ContactanosController@send');
		

	Route::get('trabaja-con-nosotros', 'UneteController@index')->name('unete');
	Route::post('unete_notificar', 'UneteController@send');

	Route::get('colabora-con-nosotros', 'ColaboraController@index')->name('colabora');
	Route::post('colabora_notificar', 'ColaboraController@send');	
	
	Route::get('colabora-ceo', 'ColaboraceoController@index')->name('colaboraceo');
	Route::post('colabora_notificar_ceo', 'ColaboraceoController@send');	
	
	/*Route::get('publica-tu-inmueble', 'PublicadoController@index')->name('publicado');
	Route::post('publicado_notificar', 'PublicadoController@send');*/
	
	Route::get('publica-tu-alquiler', 'PublicadoController@index')->name('publicado');
	Route::post('publicado_notificar', 'PublicadoController@send');
	
	Route::get('publica-con-iamovingfree', 'PublicadoController@iamovingfree')->name('iamovingfree');
	Route::post('publicado_iamovingfree', 'PublicadoController@send');
	
	Route::get('publica-tu-venta', 'PublicadoController@venta')->name('venta');
	Route::post('publicado_venta', 'PublicadoController@send');	

	Route::get('publica-tu-inmueble', 'PublicadoController@old')->name('antiguo');
	Route::post('publicado_antiguo', 'PublicadoController@send');
	
	Route::post('publicar_gratis', 'PublicarGratisController@send');

	Route::post('comprar_alquilar', 'ComprarAlquilarController@send');

	Route::get('perfil', 'ProfileController@index');
	Route::post('guardar_perfil','ProfileController@guardar');

	Route::post('agendar_visita', 'VisitaController@guardar');
	Route::post('eliminar_visita', 'VisitaController@eliminar');

	Route::get('visitas', 'VisitaController@index');
	Route::get('lista_visitas', 'VisitaController@visitas');

	Route::get('favoritos', 'UserFavouriteController@index');
	Route::get('lista_favoritos', 'UserFavouriteController@favoritos');
	Route::post('guardar_favorito', 'UserFavouriteController@guardar');


});

/**
 * iamovingpro
 * 
 */
Route::namespace('iamovingpro')->group(function() {
	// home iamovingpro
	Route::get('/', 'HomeController@index');
	Route::get('/home','HomeController@index')->name('home'); // index
	//Route::get('/olvide-pass','HomeController@index'); // index
	Route::get('/olvide-pass', function() {
		return view('iamovingpro.olvide_pass');
	});	
	
	// propietario vender iamovingpro
	Route::get('/vender', function() {
		return view('iamovingpro.propietario.vender');
	});

	// propietario alquiler_habitacion iamovingpro
	Route::get('/alquiler-habitacion', function() {
		return view('iamovingpro.propietario.alquiler_habitacion');
	});	
	
		// propietario alquiler_turistico iamovingpro
	Route::get('/alquiler-turistico', function() {
		return view('iamovingpro.propietario.alquiler_turistico');
	});
	
		// propietario alquiler iamovingpro
	Route::get('/alquiler', function() {
		return view('iamovingpro.propietario.alquiler');
	});	
	
	/*	Route::get('/alquilar-con-Iamoving', function() {
		return view('iamovingpro.propietario.proteccion');
	})->name('alquilar-con-Iamoving');*/
	
		Route::get('/alquilando-con-iamoving', function() {
		return view('iamovingpro.propietario.proteccion');
	})->name('alquilando-con-iamoving');

		Route::get('/alquilando-con-iamovingfree', function() {
		return view('iamovingpro.propietario.free');
	})->name('alquilando-con-iamovingfree');	
	
	/*Route::get('/vendiendo-con-Iamoving', function() {
		return view('iamovingpro.propietario.vendiendo');
	})->name('vendiendo-con-Iamoving');	*/
	
	Route::get('/vendiendo-con-iamoving', function() {
		return view('iamovingpro.propietario.vendiendo');
	})->name('vendiendo-con-iamoving');
	
	Route::get('/vendiendo-con-iamovingfree', function() {
		return view('iamovingpro.propietario.vendiendofree');
	})->name('vendiendo-con-iamovingfree');
	
	// buscando comprar iamovingpro
	Route::get('/comprar', function() {
		return view('iamovingpro.buscando.comprar');
	});	

	// propietario alquiler_habitacion iamovingpro
	Route::get('/buscando-habitacion', function() {
		return view('iamovingpro.buscando.alquiler_habitacion');
	});	
	
		// propietario alquiler_turistico iamovingpro
	Route::get('/buscando-turistico', function() {
		return view('iamovingpro.buscando.alquiler_turistico');
	});
	
		// propietario alquiler iamovingpro
	Route::get('/buscando-alquiler', function() {
		return view('iamovingpro.buscando.alquiler');
	});	
	
		// Terminos Iamoving.com
	Route::get('/terminosI-condiciones', function() {
		return view('iamovingpro.contratos.terminosI');
	});
		Route::get('/terminosC-condiciones', function() {
		return view('iamovingpro.contratos.terminosC');
	});
	
		// Nosotros
	Route::get('/somos-iamoving', function() {
		return view('iamovingpro.nosotros.index');
	});
		// Find
	Route::get('iamovingpro/find', 'FindController@index');
	Route::post('iamovingpro/find/{category}', 'FindController@searchFilters');
	
	//Route::get('/iamovingpro','HomeController@index'); // index

Route::get('politicas_cookies', 'iamovingpro\HomeController@cookies');
Route::get('bloqueado', 'iamovingpro\HomeController@bloqueado');

	Route::get('VisitaVirtual/{id}', 'DetalleController@show');
	Route::get('detalle/{id}', 'NovideoController@show');	

				Route::get('terminos-colaborador', function() {
		return view('iamovingpro.contratos.colabora');
	});		
				Route::get('terminos-ceo', function() {
		return view('iamovingpro.contratos.ceo');
	});	
		Route::get('politica-privacidad', function() {
		return view('iamovingpro.contratos.politica');
	});
	
});	
/**
 * Auth
 * 
 */
$this->post('auth/register', 'Web\AuthController@register');
$this->post('auth/retrieve', 'Web\AuthController@retrieve');
$this->post('auth/retrieve_pass', 'Web\AuthController@retrieve_pass');
$this->post('auth/reset', 'Web\ResetPasswordController@reset');
$this->get('auth/verify', 'Web\VerificationController@verify');
$this->post('auth/resend', 'Web\AuthController@resend');

Route::group([
    'middleware' => 'api',
], function ($router) {
    $this->post('auth/login', 'Web\AuthController@login');
	$this->post('auth/logout', 'Web\AuthController@logout');
    Route::post('auth/refresh', 'Web\AuthController@refresh');
    Route::post('auth/me', 'Web\AuthController@me');

});

$this->post('autho/register', 'iamovingpro\AuthController@register');
$this->post('autho/retrieve', 'iamovingpro\AuthController@retrieve');
$this->post('autho/reset', 'iamovingpro\ResetPasswordController@reset');
$this->get('autho/verify', 'iamovingpro\VerificationController@verify');
$this->post('autho/resend', 'iamovingpro\AuthController@resend');
Route::group([
    'middleware' => 'api',
], function ($router) {
    $this->post('autho/login', 'iamovingpro\AuthController@login');
	$this->post('autho/logout', 'iamovingpro\AuthController@logout');
    Route::post('autho/refresh', 'iamovingpro\AuthController@refresh');
    Route::post('autho/me', 'iamovingpro\AuthController@me');

});


Route::get('form', function() {
	return view('formexample.index');
});



Route::get('/example',function(){
	$data = \App\Property::all();
    return view('example',compact('data'));
});

Route::post('/reportAll', function(Request $request) {
	
    if(auth()->user()->role_id == 1){
		return InformeDetalladoCabecera::query()
		//->with('detalles')
		->where('id', 'like', "%{$request->search}%")
		->get();
	}else{
		return InformeDetalladoCabecera::query()
		->where('id', 'like', "%{$request->search}%")
		->where('user_id', auth()->user()->id)
		->get();
	}
});





Route::post('upload', 'FileController@upload');

Route::get('test/{id}', function($id) {
	$informe = \App\InformeDetalladoDetalle::with('cabecera')
																	->where('fk_id_informe_detallado_cabecera', $id)
																	->get();


	return response()->json([
		'id' => $id,
		'data' => $informe
	]);
});


Route::get('/pruebacel',function(){

  return view('cel');
});

Route::post('cel-facebook','FormPruebaController@cel')->name('cel-facebook');

Route::get('politicas_cookies', 'Web\HomeController@cookies');
Route::get('bloqueado', 'Web\HomeController@bloqueado');
