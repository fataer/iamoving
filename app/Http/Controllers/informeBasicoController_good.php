<?php

namespace App\Http\Controllers;

use App\InformeDetalladoCabecera;
use Illuminate\Http\Request;
use DB;
use App\Mail\InformePropietarioMail;

class informeBasicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $barrios =    DB::select('select id,nombre from zone');   
        
        return view('informebasico.index',compact('barrios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) 
    {
        $informe = InformeDetalladoCabecera::findOrFail($request->reference);
        $informe->propiedad_precio = $request->price_property;
        $informe->estudio = $request->study;
        $informe->loft = $request->loft;
        $informe->apartamento = $request->apartment;
        $informe->piso = $request->floor;
        $informe->chalet = $request->chalet;
        $informe->casa = $request->casa;
        $informe->bajo = $request->low;
        $informe->atico = $request->penthouse;
        $informe->contrato = $request->contract;
		$informe->tiempo_maximo = $request->tiempo_maximo;
        $informe->propiedad_estado = $request->state_property;
        $informe->amueblada = $request->furnished;
		//
		$informe->tipo_suelo = $request->tipo_suelo;
		$informe->tipo_pared = $request->tipo_pared;
		$informe->pintura_estado = $request->pintura_estado;
		$informe->codigo_postal = $request->codigo_postal;
		//
		$informe->habitacion_vacia = $request->habitacion_vacia;
		//
		$informe->ciudad_inmueble = $request->city;
		 if($request->has('tipo_inmueble')) $informe->tipo_inmueble = $request->tipo_inmueble;

        $informe->orientacion = $request->orientation;
        $informe->alquiler_casa = $request->home_rental;
        $informe->fecha_salida = $request->departure_date;
        $informe->exterior = $request->exterior;
        $informe->interior = $request->inside;
        $informe->terraza = $request->terrace;
		$informe->tipo_dni_agencia= $request->tipo_dni_agencia;
        $informe->dni_agencia= $request->dni_agencia;
        $informe->nombre_agencia= $request->nombre_agencia;
        $informe->email_agencia=$request->email_agencia;
        $informe->telefono_agencia=$request->telefono_agencia;
        $informe->agencia_aceptar = $request->agencia_aceptar;
		$informe->anuncio_basico = $request->anuncio_basico;
		$informe->iamoving_pro = $request->iamoving_pro;
		$informe->cobrar_visita = $request->cobrar_visita;	

		$informe->pago_unico = $request->pago_unico;		
		$informe->iva_pago_unico = $request->iva_pago_unico;		
		//// new andres
        $informe->tipo_dni= $request->tipo_dni;
        $informe->dni= $request->dni;
        $informe->nombre= $request->nombre;
        if($request->has('email')) $informe->email=$request->email;
        $informe->telefono=$request->telefono;
        $informe->propetario_aceptar=   $request->propetario;
		
        
        $informe->tipo_dni_e= $request->tipo_dni_e;
        $informe->dni_e= $request->dni_e;
        $informe->nombre_e= $request->nombre_e;
        $informe->email_e=$request->email_e;
		$informe->email_visita=$request->email_visita;
        $informe->telefono_e=$request->telefono_e;
        $informe->encargado_aceptar = $request->propetario_e;

        $informe->tipo_dni_iampro= $request->tipo_dni_iampro;
        $informe->dni_iampro= $request->dni_iampro;
        $informe->nombre_iampro= $request->nombre_iampro;
        $informe->email_iampro=$request->email_iampro;
        $informe->telefono_iampro=$request->telefono_iampro;
        $informe->iampro_aceptar = $request->iampro_aceptar;

        //$informe->barrios=$request->barrios;

     
        $informe->balcon = $request->balcony;
        $informe->piso_importante = $request->important_floor;
		if($request->has('plantas_edificio')) $informe->plantas_edificio = $request->plantas_edificio;
        $informe->number_apartment = $request->number_apartment;
        //
		//
		if($request->has('numero_escaparates')) $informe->numero_escaparates = $request->numero_escaparates;
		if($request->has('plantas_local')) $informe->plantas_local = $request->plantas_local;
		$informe->diafano = $request->diafano;
		$informe->divido_mamparas = $request->divido_mamparas;
		$informe->divido_tabiques = $request->divido_tabiques;
		$informe->salida_humos = $request->salida_humos;
		$informe->pie_calle = $request->pie_calle;
		$informe->centro_comercial = $request->centro_comercial;
		$informe->entreplanta = $request->entreplanta;
		$informe->subterraneo = $request->subterraneo;
		$informe->puerta_seguridad = $request->puerta_seguridad;
		$informe->sistema_alarma = $request->sistema_alarma;
		$informe->circuito_seguridad = $request->circuito_seguridad;
		$informe->almacen = $request->almacen;
		$informe->esquina = $request->esquina;		
		if($request->has('numero_ascensores')) $informe->numero_ascensores = $request->numero_ascensores;
		$informe->montacargas = $request->montacargas;		
		if($request->has('plantas_chalet')) $informe->plantas_chalet = $request->plantas_chalet;
		//
		//
        $informe->lift = $request->lift;
        $informe->rampa = $request->ramp;
        $informe->bebe_rampa = $request->baby_cart_lift;
		$informe->portero = $request->portero;
		$informe->video_portero = $request->video_portero;
        $informe->calefaccion = $request->heating;
        $informe->calentador_agua = $request->water_boiler;
		$informe->incluido_comunidad = $request->incluido_comunidad;
		$informe->plazas_garaje = $request->plazas_garaje;
		$informe->orientacion_solar = $request->orientacion_solar;
        $informe->mascotas_no = $request->pets;
        $informe->tenderos = $request->storekeepers;
        $informe->aire_acondicionado = $request->air_conditioner;
        $informe->suite = $request->suite_room;
        $informe->lavavajillas = $request->dishwasher;
        $informe->horno = $request->oven;
        $informe->certificado_energetico = $request->energy_certificate;
        $informe->gastos_incluido_calentamiento = $request->expenses_included_heating;
        $informe->gastos_incluido_agua = $request->expenses_included_water;
        $informe->gastos_incluido_luz = $request->expenses_included_light;
        $informe->gastos_incluidos_gas = $request->expenses_included_gas;
        $informe->gastos_incluidos_basura = $request->expenses_included_garbage;
        $informe->gastos_incluido_comunidad = $request->expenses_included_community;
        $informe->gastos_incluido_ibi = $request->expenses_included_ibi;
        $informe->gastos_incluido_internet = $request->expenses_included_internet;
        $informe->gastos_agua = $request->water_expenses;
        $informe->gastos_basura = $request->garbage_expenses;
        $informe->gastos_comunidad = $request->community_expenses;
        $informe->gastos_ibi = $request->ibi_expenses;
        $informe->jardin = $request->yard;
        $informe->piscina = $request->swimming_pool;
        $informe->gym = $request->gym;
        $informe->sauna = $request->sauna;
        $informe->zona_deportiva = $request->sport_zone;
        $informe->zona_infantil = $request->childish_zone;
        $informe->garaje_incluido_precio = $request->garage_included_price;
		$informe->garaje_dos_plazas = $request->garage_two_places;
        $informe->garaje_opcion = $request->garage_option;
        $informe->testero_incluido = $request->testero_included;
        $informe->opcion_trastero_edificio = $request->storage_room_option_building;
        $informe->aproximate_cost_garages = $request->approximate_cost_garages;
        $informe->venta_cost_garage = $request->venta_cost_garage;
        $informe->antiguedad_edificio = $request->antiquity_building;
        $informe->precio = $request->price;
        $informe->fianza = $request->bail;
        $informe->fecha_de_alta = $request->time;
        $informe->video_primary = $request->video_primary;
        $informe->calendar = implode(", ", $request->calendar);
        $informe->schedule = $request->schedule;
        $informe->published = $request->published;
        
        if ($request->has('address')) $informe->direccion = $request->address;
        if ($request->has('road')) $informe->road = $request->road;
        if ($request->has('road_real')) $informe->road_real = $request->road_real;
        if ($request->has('numero')) $informe->numero_direccion = $request->numero;
        if ($request->has('bedrooms')) $informe->bedrooms = $request->bedrooms;
        if ($request->has('bathrooms')) $informe->bathrooms = $request->bathrooms;
		if ($request->has('aseos')) $informe->aseos = $request->aseos;
        if ($request->has('latitud')) $informe->latitud = $request->latitud;
        if ($request->has('longitud')) $informe->longitud = $request->longitud;

        if ($request->has('garaje_numero')) $informe->garaje_numero = $request->garaje_numero;
        if ($request->has('trastero_numero')) $informe->trastero_numero = $request->trastero_numero;

        if ($request->has('municipio')) $informe->municipio = $request->municipio;
        if ($request->has('plazo_escritura')) $informe->plazo_escritura = $request->plazo_escritura;
        
        // Path images
        if ($request->has('path_image_primary')) $informe->path_image_primary = $request->path_image_primary;
        if ($request->has('path_video_transport')) $informe->path_video_transport = $request->path_video_transport;
        if ($request->has('path_video_nota')) $informe->path_video_nota = $request->path_video_nota;

        if($request->has('alquiler_aproximado')) $informe->alquiler_aproximado = $request->alquiler_aproximado;
        if($request->has('condiciones')) $informe->condiciones = $request->condiciones;
		//
		if($request->has('comision_inmobiliaria')) $informe->comision_inmobiliaria = $request->comision_inmobiliaria;
		if($request->has('propietario_inmobiliaria')) $informe->propietario_inmobiliaria = $request->propietario_inmobiliaria;
		if($request->has('tipo_plan')) $informe->tipo_plan = $request->tipo_plan;
		//
		if($request->has('meters')) $informe->square_meters = $request->meters;

        //if($request->has('estado_inmueble')) $informe->estado_inmueble = $request->inmueblestate;
		$informe->estado_inmueble = empty($request->inmueblestate)?"":$request->inmueblestate;
		$informe->comentario_inmueble = $request->comentario_inmueble;
		$informe->comentario_alquiler_aprox = $request->comentario_alquiler_aprox;
		
		$informe->hora_manana = $request->hora_manana;
		$informe->hora_comida = $request->hora_comida;
		$informe->hora_tarde = $request->hora_tarde;
		$informe->minuto_manana = $request->minuto_manana;
		$informe->minuto_comida = $request->minuto_comida;
		$informe->minuto_tarde = $request->minuto_tarde;
        $informe->flexibilidad = $request->flexibilidad;    
        
		$informe->hora_manana_hasta = $request->hora_manana_hasta;
		$informe->hora_comida_hasta = $request->hora_comida_hasta;
		$informe->hora_tarde_hasta = $request->hora_tarde_hasta;
		$informe->minuto_manana_hasta = $request->minuto_manana_hasta;
		$informe->minuto_comida_hasta = $request->minuto_comida_hasta;
		$informe->minuto_tarde_hasta = $request->minuto_tarde_hasta;

		$informe->hora_dia = $request->hora_dia;
		$informe->minuto_dia = $request->minuto_dia;
		$informe->hora_dia_hasta = $request->hora_dia_hasta;
		$informe->minuto_dia_hasta = $request->minuto_dia_hasta;
		
		$informe->sin_burocracia = $request->sin_burocracia;
		
		if($request->has("email_enviado") && $request->email_enviado){
		    if(!$informe->email_enviado){
		        $informe->email_enviado = "Email enviado a " . $informe->email_e . " el dia " . date('d/m/Y');
		        //$bcc = explode(",",env('MAIL_BCC'));
				$bcc = explode(",",env('MAIL_PUC'));
		        //\Mail::to($informe->email_e)->bcc($bcc)->send(new InformePropietarioMail($informe));
				\Mail::to($informe->email_e)->bcc($bcc)->send(new InformePropietarioMail($informe));
		    }
		}
        
        $informe->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
