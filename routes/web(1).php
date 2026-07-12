<?php

use App\InformeDetalladoCabecera;
use Illuminate\Http\Request;
//use App\Http\Controllers\iamovingtospain\EmailController;

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
/*
// Ruta principal que detecta el dispositivo y redirige
Route::get('/lookfor', 'LookforController@index')->name('lookfor');

// Rutas específicas para cada dispositivo
Route::get('/lookfor/iphone', 'LookforController@iphone')->name('lookfor.iphone');
Route::get('/lookfor/android', 'LookforController@android')->name('lookfor.android');
Route::get('/lookfor/windows', 'LookforController@windows')->name('lookfor.windows');
Route::get('/lookfor/default', 'LookforController@default')->name('lookfor.default');
*/
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
	Route::get('/informe', 'InformeDetalladoController@index');
	
	Route::get('/borrar-detallado-edit', 'BorrarDetalladoController@edit');
	Route::get('/borrar-detallado-cabecera', 'BorrarDetalladoController@index')->name('voyager.borrar-detallado-cabecera.index');
	Route::post('/borrar-detallado-cabecera', 'BorrarDetalladoController@store');
	Route::post('/borrar/{id}/update', 'BorrarDetalladoController@update');

    // Add new route for photo deletion
    Route::post('/informe/delete-photo/{id}', 'BorrarDetalladoController@deletePhoto');
    
    Route::post('/delete-multimedia/{id}', 'BorrarDetalladoController@deleteMultimedia');
        // Debug routes - For testing only, should be removed in production
    Route::get('/debug-fotos', function() {
        return view('borrar.debug');
    });
// Agregar en web.php dentro del grupo de rutas admin
Route::get('/api-inspector', function() {
    return view('borrar.api-inspector');
});

	Route::get('/borrar/{search}', 'BorrarDetalladoController@search');
	Route::get('/borrar', 'BorrarDetalladoController@index');	
	
# Debug routes
Route::get('/debug-fotos-avanzado', function() {
    return view('borrar.debug-enhanced');
});

# Rutas para consultas directas en modo debug
Route::get('/multimedia-by-reference/{id}', 'BorrarDetalladoController@getMultimediaByReference');
Route::get('/detail-by-id/{id}', 'BorrarDetalladoController@getDetailById');	

// Agregar en web.php
Route::get('/fotos-referencia', function() {
    return view('borrar.debug-ajax');
});

// Agregar en web.php
   // Asegúrate de que esta ruta esté aquí si la URL es /admin/db-diagnostic
    Route::get('/db-diagnostic', function() {
        // Registrar consultas SQL para depuración
        $queries = [];
        DB::listen(function($query) use (&$queries) {
            $queries[] = $query->sql . ' [' . implode(', ', $query->bindings) . ']';
        });
        
        // Información de conexión
        $connection = DB::getDefaultConnection();
        $database = DB::connection()->getDatabaseName();
        
        // Listar tablas
        $tables = DB::select('SHOW TABLES');
        $tables_count = count($tables);
        
        // Verificar si la tabla multimedia existe
        $multimedia_exists = Schema::hasTable('multimedia');
        
        // Consulta de multimedia si se proporciona un ID
        $reference_id = request()->get('reference_id');
        $multimedia = [];
        
        if ($reference_id) {
            $multimedia = DB::table('multimedia')
                ->where('fk_id_informe_detallado_cabecera', $reference_id)
                ->get();
        }
        
        return view('borrar.db-diagnostic', compact(
            'connection', 
            'database', 
            'tables_count', 
            'multimedia_exists',
            'reference_id',
            'multimedia',
            'queries'
        ));
    });

});


// Agregar estas rutas en web.php para pruebas
Route::get('/test-multimedia/{id}', function($id) {
    // Consulta directa simple
    $multimedia = DB::table('multimedia')
        ->where('fk_id_informe_detallado_cabecera', $id)
        ->get();
    
    // Respuesta simplificada 
    return response()->json([
        'status' => 'success',
        'reference_id' => $id,
        'count' => count($multimedia),
        'multimedia' => $multimedia
    ]);
});

// Ruta para ver los logs directamente (solo usar en desarrollo)
Route::get('/view-logs', function() {
    $logFile = storage_path('logs/laravel-' . date('Y-m-d') . '.log');
    if(file_exists($logFile)) {
        $content = file_get_contents($logFile);
        $content = nl2br($content);
        return response($content)->header('Content-Type', 'text/html');
    } else {
        return "No log file found for today.";
    }
});

/**
 * Rutas de la web
 * 
 */
Route::namespace('Web')->group(function() {
    // Añade esta línea a tu archivo routes/web.php
    Route::get('/paths', 'PathsController@index')->name('paths.index');

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
	
	Route::get('daily_notification', 'DailyNotificationController@add');
	//Route::get('daily_notification/run', 'DailyNotificationController@run');

	// Busqueda
	Route::get('search', 'SearchController@index');
	Route::post('search/{category}', 'SearchController@searchFilters');

	// Servicios
	Route::get('servicio/{id}', 'ServiceController@show');
	Route::get('servicio/{service}/{id}', 'ServiceController@showSubService');
//Tarjeta
Route::get('tarjeta/{id}', 'ColaboraController@show');
Route::get('actualiza_condiciones/{id}', 'ColaboraController@actualiza');
Route::post('/actualiza_notificar', 'ColaboraController@condiciones');
//Route::post('/registro_propietario','RegistroInmuebleController@disponible');	
//Route::get('colabora-con-nosotros', 'ColaboraController@index')->name('colabora');
	
	// Nosotros
	/*Route::get('/quien-somos', function() {
		return view('web.nosotros.index');
	});*/
		Route::get('/exito-iamoving', function() {
		return view('web.colabora.exito');
	})->name('exito-iamoving');	
	
	Route::get('/calculadoras', function() {
		return view('web.calculadora.index');
	});

	// Anuncios
	/*Route::get('/vende-con-nosotros', function() {
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
	})->name('vendiendo-con-Iamoving');	*/
	
	Route::get('/testimonios-iamoving', function() {
		return view('web.testimonios.testimonio');
	})->name('testimonios-iamoving');	

/*	Route::get('/bonificacion-en-efectivo', function() {
		return view('web.anuncios.bonificacion');
	})->name('bonificacion-en-efectivo');	

	Route::get('/buscando-inmuebles-alquiler',function(){
		return view('web.buscando.alquiler');
	});
	Route::get('/buscando-inmuebles-venta',function(){
		return view('web.buscando.venta');
	});*/

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
	Route::post('contacto_send', 'ContactanosController@send');


	Route::get('trabaja-con-nosotros', 'UneteController@index')->name('unete');
	Route::post('unete_notificar', 'UneteController@send');

	Route::get('colabora-con-nosotros', 'ColaboraController@index')->name('colabora');
	Route::post('colabora_notificar', 'ColaboraController@send');	
	
	Route::get('colabora-ceo', 'ColaboraceoController@index')->name('colaboraceo');
	Route::post('colabora_notificar_ceo', 'ColaboraceoController@send');	

	Route::get('colabora-teamleader', 'TeamleaderController@index')->name('teamleader');
	Route::post('colabora_notificar_teamleader', 'TeamleaderController@send');
	
	Route::get('colabora-audiovisual', 'AudiovisualController@index')->name('audiovisual');
	Route::post('colabora_notificar_audiovisual', 'AudiovisualController@send');
	
	Route::get('colabora-audiovisual-mitad-objetivos', 'MediaController@index')->name('mitadobjetivos');
	Route::post('colabora_notificar_mitad_objetivo', 'MediaController@send');
	
//Half objetivos
	Route::get('colabora-audiovisual-half-objetivos', 'HalfController@index')->name('halfobjetivos');
	Route::post('colabora_notificar_half_objetivo', 'HalfController@send');	
//Half objetivos fin

	
//Paquete servicios
	Route::get('colabora-paquete-servicios', 'PaqueteController@index')->name('paqueteservicios');
	Route::post('colabora_notificar_paquete_servicios', 'PaqueteController@send');	
//Paquete servicios fin

//Half iamigo
	Route::get('propietario-alquiler', 'IamigoController@index');
	Route::get('propietario-venta', 'IamigoController@index');
	Route::post('propietario-colaborador-iamigo', 'IamigoController@send');	
//Half iamigo fin


//Comercial
	Route::get('comercial', 'ComercialController@index');
	Route::post('comercial-colaborador', 'ComercialController@send');	
//Comercial

//PaqueteserviciosController
	Route::get('paqueteservicios', 'PaqueteserviciosController@index');
	Route::post('paqueteservicios-colaborador', 'PaqueteserviciosController@send');	
//PaqueteserviciosController

	Route::get('colabora-llamadas', 'LlamadasController@index')->name('llamadas');
	Route::post('colabora_notificar_llamadas', 'LlamadasController@send');
	
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
 * iamovingtospain
 * 
 */
 Route::namespace('iamovingtospain')->group(function() {

		Route::get('iamoving-to-spain', function() {
		return view('iamovingtospain.iamovingtospain');
	});
	/*	Route::get('consulta-iamoving', function() {
		return view('iamovingtospain.consultaiamoving');
	});*/
	
		Route::get('ventajas-spain', function() {
		return view('iamovingtospain.ventajaspain');
	});	
	
		Route::get('quienes-somos', function() {
		return view('iamovingtospain.quienessomos');
	});		
		Route::get('curriculum-abogada', function() {
		return view('iamovingtospain.paola');
	});	


		Route::get('rober', function() {
		return view('iamovingtospain.desencriptar.rober');
	});	

});

Route::namespace('iamovingtospain')->group(function() {
    Route::post('/enviar-consulta', 'ConsultaController@enviar')->name('enviar.consulta');
    Route::post('/crear-sesion-pago', 'PagoController@crearSesion')->name('crear.sesion.pago');
    Route::get('/pago-exitoso', 'PagoController@pagoExitoso')->name('iamovingtospain.pago.exitoso');
    Route::get('/pago-cancelado', 'PagoController@pagoCancelado')->name('iamovingtospain.pago.cancelado');
    //Route::get('/iamovingtospain', 'iamovingtospain\HomeController@index')->name('iamovingtospain.index');
    Route::get('/iamovingtospain', 'iamovingtospain\HomeController@index')->name('iamovingtospain.home');
	Route::get('contacto', 'ContactanosController@index')->name('contacto');
	Route::post('contacto_notificar', 'ContactanosController@send');
	Route::post('/meta-api/evento', 'MetaApiController@enviarEvento')->name('meta.evento');
	  Route::get('iamoving-to-spain', 'HomeController@index')->name('iamovingtospain.index');
	      Route::post('/facebook-event', 'FacebookApiController@enviarEvento')
        ->name('facebook.event');
           
//Route::post('/aterrizaje', 'AterrizajeController@store');        
	//Route::post('/save-email', [EmailController::class, 'store'])->name('save.email');
});

//Route::namespace('App\Http\Controllers\iamovingtospain')->group(function() {
//    Route::post('/save-email', [EmailController::class, 'store'])->name('save.email');
//});
//Route::get('/export-leads', [App\Http\Controllers\iamovingtospain\EmailController::class, 'exportToExcel']);

//Route::get('/export-all', [App\Http\Controllers\iamovingtospain\EmailController::class, 'exportAllData']);

Route::get('/export-enc', [App\Http\Controllers\iamovingtospain\EmailController::class, 'exportAllDataEnc']);

Route::get('/fly', [App\Http\Controllers\iamovingtospain\EmailController::class, 'exportToExcelToFly']); 

Route::group(['namespace' => 'iamovingtospain'], function() {
    Route::post('/save-email', 'EmailController@store')->name('save.email');
});

Route::post('/aterrizaje', [App\Http\Controllers\iamovingtospain\AterrizajeController::class, 'store'])
    ->name('aterrizaje')
    ->middleware('web');
 
/**
 * iamovingpro
 * 
 */
Route::namespace('iamovingpro')->group(function() {
	    //filters
    Route::post('iamovingpro/filters', 'FiltersController@saveFilters');
	Route::name('imprimir')->get('/imprimir', 'PDFController@imprimir');
	// home iamovingpro
	Route::get('/', 'HomeController@index');
	Route::get('/home','HomeController@index')->name('home'); // index
	Route::get('/prueba','PruebaController@index')->name('prueba');;
	
	//Route::get('/olvide-pass','HomeController@index'); // index
	Route::get('/olvide-pass', function() {
		return view('iamovingpro.olvide_pass');
	});	
	// premium iamovingpro
	Route::get('/premium', function() {
		return view('iamovingpro.premium.premium');
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
	Route::post('iamovingpro/find/{category}/{city}', 'FindController@searchFilters');
	
	//Route::get('/iamovingpro','HomeController@index'); // index

Route::get('politicas_cookies', 'iamovingpro\HomeController@cookies');
Route::get('bloqueado', 'iamovingpro\HomeController@bloqueado');

	//Route::get('VisitaVirtual/{id}', 'DetalleController@show');
	
	/*Route::get('VisitaVirtual/{id}/{lan}', 'DetalleController@show');
	Route::get('VisitaVirtual/{id}', 'DetalleController@show_ini');*/
	Route::get('anuncio/{id}', 'DetalleController@show_ini');
	/*Route::get('detalle/{id}', 'NovideoController@show');	*/
	Route::get('oferta/{id}', 'OfertaController@show_ini');	
	Route::post('oferta-formulario', 'OfertaController@send');	

	//Route::get('ofertacompra/{id}', 'OfertaCompraController@show_ini');	
	Route::get('ofertacompra/{id}/{test_email?}', 'OfertaCompraController@show_ini');
	Route::post('ofertacompra-formulario', 'OfertaCompraController@sendCompra');
	
				Route::get('terminos-colaborador', function() {
		return view('iamovingpro.contratos.colabora');
	});	

/*
				Route::get('terminos-colaboradorI', function() {
		return view('iamovingpro.contratos.colaboraI');
	});	
	*/
				Route::get('terminos-ceo', function() {
		return view('iamovingpro.contratos.ceo');
	});	
	
				Route::get('terminos-comercial-llamadas', function() {
		return view('iamovingpro.contratos.llamadas');
	});	

				Route::get('terminos-comercial-audiovisual', function() {
		return view('iamovingpro.contratos.audiovisual');
	});

				Route::get('terminos-comercial-audiovisual-mitad-objetivos', function() {
		return view('iamovingpro.contratos.mediajornada');
	});	


				Route::get('terminos-comercial-audiovisual-half-objetivos', function() {
		return view('iamovingpro.contratos.halfjornada');
	});	

				Route::get('terminos-paquete-servicios', function() {
		return view('iamovingpro.contratos.paquete');
	});	
	
	Route::get('terminos-colaboracion-iamigo', function() {
		return view('iamovingpro.contratos.iamigo');
	});	

	Route::get('terminos-comercial', function() {
		return view('iamovingpro.contratos.comercial');
	});	
	
	Route::get('terminos-condiciones', function() {
		return view('iamovingpro.contratos.visita');
	});

	Route::get('terminos-paqueteservicios', function() {
		return view('iamovingpro.contratos.paqueteservicios');
	});		

				Route::get('terminos-teamleader', function() {
		return view('iamovingpro.contratos.teamleader');
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
