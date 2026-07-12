<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
# Usar el namespace de Log
use Illuminate\Support\Facades\Log;

class InformeDetalladoCabecera extends Model
{
    protected $table = "informe_detallado_cabecera";
    
    public $timestamps = false;
     
    protected $fillable = [
        'puerta', 
        'recibidor', 
        'tamano_prox_recibidor', 
        'aparador', 
        'armario', 
        'almacenamiento', 
        'sepuede_sacar_algo_mueble_recibidor', 
        'sepuede_sacar_algo_mueble_recibidor', 
        'is_sale',
		'tipo_inmueble',
        'propiedad_precio', 
        'estudio', 
        'loft', 
        'apartamento', 
        'piso', 
        'chalet', 
        'casa', 
        'bajo', 
        'atico', 
        'duplex', 
        'direccion', 
        'contrato', 
        'propiedad_estado', 
        'amueblada', 
		'tipo_suelo',
		'tipo_pared',
		'pintura_estado',
		'codigo_postal',		
        'orientacion', 
        'alquiler_casa', 
        'fecha_salida', 
        'exterior', 
        'interior', 
        'terraza', 
        'balcon', 
        'patio', 
        'piso_importante', 
        'lift', 
        'ventana_climalit', 
        'rampa', 
        'bebe_rampa', 
        'calefaccion', 
        'incluido_comunidad',
		'orientacion_solar',
        'calentador_agua', 
        'mascotas', 
		'mascotas_no',
        'tenderos', 
        'aire_acondicionado', 
        'suite', 
        'lavavajillas', 
        'horno', 
        'certificado_energetico', 
        'gastos_incluido_calentamiento', 
        'gastos_incluido_agua', 
        'gastos_incluido_luz', 
        'gastos_incluidos_gas', 
        'gastos_incluidos_basura', 
        'gastos_incluido_comunidad', 
        'gastos_incluido_ibi', 
        'gastos_incluido_tbasura', 
        'gastos_incluido_internet', 
        'gastos_agua', 
        'gastos_basura', 
        'gastos_comunidad', 
        'gastos_ibi', 
        'gastos_tbasura', 
        'jardin', 
        'piscina', 
        'gym', 
        'sauna', 
        'zona_deportiva', 
        'zona_infantil', 
        'garaje_incluido_precio', 
		'garaje_dos_plazas',
        'garaje_opcion', 
        'testero_incluido', 
        'opcion_trastero_edificio', 
        'aproximate_cost_garages', 
        'venta_cost_garage',
        'antiguedad_edificio', 
        'precio', 
        'fianza',
        'bario_id',
        'dni',
        'email',
        'telefono',
        'propetario_aceptar',
'garaje_comprar',
'precio_compra_garaje',
'garaje_alquilar',
'precio_alquilar_garaje',        
        'dni_e',
        'email_e',
        'telefono_e',
        'encargado_aceptar',
        'fecha_de_alta',
         'road',
        'road_real',
        'numero_direccion',
        'number_apartment',
        'latitud',
        'longitud',
        'alquiler_aproximado',
        'condiciones',
		'comision_inmobiliaria',
		'comision_iva',
		'arras',
		'plazo_formalizar',
		'propietario_inmobiliaria',
		'tipo_plan',
        'published',
        'estado_inmueble',
		'habitacion_vacia',
		'centro_comercial',
		'entreplanta',
		'subterraneo',
        'square_meters',
        'bedrooms',
        'bathrooms',
		'aseos',
'descripcion',
'tamano',
'tipo',
'numero',
'situacion',
'hay_garaje',
'hay_trastero',
'hay_datosedificio',
'hay_transporte',
'plantas_edificio',
'hay_barrio',
'user_id',
'user_email',
'plazas_garaje',
'numero_escaparates',
'plantas_local',
'diafano',
'divido_mamparas',
'divido_tabiques',
'salida_humos',
'pie_calle',
'puerta_seguridad',
'sistema_alarma',
'circuito_seguridad',
'almacen',
'esquina',
'numero_ascensores',
'montacargas',
'plantas_chalet',
'adosado_chalet',
'email_visita',
'tiempo_maximo',
'garaje_numero',
'trastero_numero',
'municipio',
'plazo_escritura',
'comision_iamoving'
    ];

    //protected $appends = ['meters','bedrooms','bathrooms', 'coordinates'];
    //protected $appends = ['bedrooms','bathrooms', 'coordinates'];
    protected $appends = ['coordinates'];

   public function detalles() {
        return $this->hasMany(InformeDetalladoDetalle::class, 'fk_id_informe_detallado_cabecera');
    }

    /*public function getMetersAttribute()
    {
        $raw = "SUM(
            
            IFNULL(tamano_prox_recibidor, 0) +
            IFNULL(tamano_aproximado_salon, 0) +   
            IFNULL(tanano_aproximado_cocina, 0) +
            IFNULL(cocina_balcon_m, 0) +
            IFNULL(cocina_terreza_m, 0) +
            IFNULL(tamano_aproximado_dormitorio, 0) +
            IFNULL(dormitorio_balcon_m, 0) +
            IFNULL(dormitorio_terreza_m, 0) +
            IFNULL(tamano_aprox_salon, 0) +
            IFNULL(salon_dormitorio_balcon_m, 0) +
            IFNULL(salon_dormitorio_tereza_m, 0) +
            IFNULL(tamano_aprox_banos, 0) +
            IFNULL(aseo_aprox_pasillo, 0) +
            IFNULL(tamano_aprox_pasillo, 0) +
            IFNULL(tanano_aprox_distribuidor, 0) +
            IFNULL(tanano_aprox_habitacion_servicio, 0) +
            IFNULL(tamano_aprox_bano_servicios, 0)
        ) AS meters";
        error_log('ERROR en InformeDetalladoCabecera.php carpeta app.');

           // IFNULL(salon_dormitorio_balcon_m, 0) +
            // IFNULL(salon_dormitorio_tereza_m, 0) +

        // return $query->select(DB::raw($raw));
        return $this->detalles()->selectRaw($raw)->first()->meters;
    }
*/
   /* public function getBedroomsAttribute(){
            $columna="count(tamano_aproximado_dormitorio) AS bedrooms";
            return $this->detalles()->selectRaw($columna)->where('tamano_aproximado_dormitorio','>',0)->first()->bedrooms; 
    }

    public function getBathroomsAttribute(){
            $columna="count(tamano_aprox_banos) AS bathrooms";
            return $this->detalles()->selectRaw($columna)->where('tamano_aprox_banos','>',0)->first()->bathrooms;
    }*/
/*
        public function getBedroomsAttribute(){
            $columna="count(tamano_aproximado_dormitorio) AS bedrooms";
            $columna2="count(tanano_aprox_habitacion_servicio) AS bedrooms";
            $columna3="count(tamano_aprox_salon) AS bedrooms";
            $dorm1 = $this->detalles()->selectRaw($columna)->where('tamano_aproximado_dormitorio','>',0)->first()->bedrooms;
            $dorm2 =$this->detalles()->selectRaw($columna2)->where('tanano_aprox_habitacion_servicio','>',0)->first()->bedrooms;           
            $dorm3 =$this->detalles()->selectRaw($columna3)->where('tamano_aprox_salon','>',0)->first()->bedrooms;              
            $dormitTotal=  ($dorm1+ $dorm2+ $dorm3) ;
             $dormt=  $dormitTotal . ' as bedrooms';
             //Log::info($dormt);
             return $this->detalles()->selectRaw($dormt)->first()->bedrooms; 
    }

    public function getBathroomsAttribute(){
            $columna="count(tamano_aprox_banos) AS bathrooms";
            $columna2="count(tamano_aprox_bano_servicios) AS bathrooms";
            $dorm1 = $this->detalles()->selectRaw($columna)->where('tamano_aprox_banos','>',0)->first()->bathrooms;
            $dorm2 =$this->detalles()->selectRaw($columna2)->where('tamano_aprox_bano_servicios','>',0)->first()->bathrooms;           
            $dormitTotal=  ($dorm1+ $dorm2) ;
             $dormt=  $dormitTotal . ' as bathrooms';
             //Log::info($dormt);
             return $this->detalles()->selectRaw($dormt)->first()->bathrooms;         
    } 
*/
/*        public function getAseosAttribute(){
            $columna="count(aseo_aprox_pasillo) AS aseos";
            //$columna2="count(tanano_aprox_habitacion_servicio) AS aseos";
            $dorm1 = $this->detalles()->selectRaw($columna)->where('aseo_aprox_pasillo','>',0)->first()->aseos;
            //$dorm2 =$this->detalles()->selectRaw($columna2)->where('tanano_aprox_habitacion_servicio','>',0)->first()->aseos;           
            $dormitTotal=  $dorm1 ;
             $dormt=  $dormitTotal . ' as aseos';
             //Log::info($dormt);
             return $this->detalles()->selectRaw($dormt)->first()->aseos;         
    }     
*/

    public function getRateAttribute()
    {
        $precio = (int) ($this->propiedad_precio);
        // En caso de 1 = true, venta
        if ($this->is_sale) 
        {
            if ($precio < 500000 && $precio > 0) 
            {
                return 2450;
            }
            else if ($precio < 1000000 && $precio > 500000) 
            {
                //return 4850;
                return 2450;
            }
            else if ($precio > 1000000) 
            {
                //return 9500;
                return 2450;
            }
        }
        // En caso de 2 = false, Alquiler

        /*return ($precio * 0.80);*/
        return ($precio);
    }

    public function getCoordinatesAttribute()
    {
        sscanf($this->direccion, '%f,%f', $latitude, $longitude);

        return (object) [
            'latitude' => $latitude,
            'longitude' => $longitude
        ];
    }

    public function multimedia() {
        return $this->hasMany(Multimedia::class, 'fk_id_informe_detallado_cabecera');
    }
    
}
