<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;

class Property extends Model
{
    protected $table="property";

    protected $fillable=[
        
           'foto_url', 'video_url', 'precio', 'metro_cuadrados',
           'numero_dormitorios','direccion', 'lat', 'log', 'numero_banos',
           'orientacion', 'min_contrato', 'tipo_moblado', 'trasporte_descripcion',
           'gastos_incluidos', 'ambiente', 'piso', 'descripcion_piso', 'calefaccion',
           'caldera', 'certificado_energertico', 'condiciones', 'estado',
           'calendario_inicial', 'calendario_limite','user_id'

        ];


    public $dataFieldFilter=[
                      "date" => "",
                      "rager_precio" => "",
                      "total_sin_inmuebles" => "",
                      "vacio_cocina" => "",
                      "simi-amublado" => "",
                      "amueblado_" => "",
                      "metros_cuadrados" => "",
                      "numeros_dormitorios" => "",
                      "numeros_baños" => "",
                      "contrato_mes" => "",
                      "estudio" => "",
                      "lof" => "",
                      "apartamento" => "",
                      "pisos" => "",
                      "chalet" => "",
                      "estado_inmueble" => "",
                      "orientacion" => "",
                      "gas_natural_calefaccion" => "",
                      "electrica_calefaccion" => "",
                      "central_calefaccion" => "",
                      "caldera_gas" => "",
                      "caldera_electrica" => "",
                      "central_caldera" => "",
                      "Ascensor" => "",
                      "rampa_menos_valido" => "",
                      "ascensor_bebe" => "",
                      "exterior" => "",
                      "terraza" => "",
                      "balcon" => "",
                      "tendedero" => "",
                      "acepta_mascota" => "",
                      "aire_condicionado_acc2" => "",
                      "horno" => "",
                      "jardin_datos" => "",
                      "piscina_datos" => "",
                      "gym_datos" => "",
                      "sauna_datos" => "",
                      "zona_deportativa_datos" => "jardin",
                      "zona_infantil_datos" => "aire_condicionado_acc2",
                      "garaje_precio_datos" => "",
                      "opcion_garaje" => "",
                      "traste_incluido_datos" => "",
                   ];



    public static function boot()
    {
        parent::boot();
        static::saving(function (Property $pro) {
            if (! \App::runningInConsole()) {
                $pro->user_id = Auth()->user()->id;
            }
        });
    }



    //// metodos consulta
          
    public function parametrosConsulta($valores="")
    {
        //dd($valores->all());



        $fecha=  $valores->input("date");
        $precio= $valores->input("rager_precio");
                         
        $metroCuadrados= $valores->input("metros_cuadrados");
        $numerDormitorios=$valores->input("numeros_dormitorios");
        $numeroBanos=$valores->input("numeros_banos");

        // cheks
        $amoblado= $valores->input("amueblado");
        $total_sin_inmuebles=$valores->input("total_sin_inmuebles");
        $semi_amoblado=$valores->input("simi-amublado");
                         
        

        /// filtro con amoblados  ok
        if (strlen($fecha)>=0 &&  strlen($precio)>=0 && strlen($amoblado)>0 && strlen($metroCuadrados)>=0 && strlen($numerDormitorios)>=0 && strlen($numeroBanos)>=0) {
                                     
                                     //dd("que pasa 1");
            $data=DB::select(
                                         "
				                         	SELECT  p.*,e.*
											FROM property as p
											INNER JOIN edificio as e
											on e.property_id=p.id
											where p.precio <= '".$precio."' 
											and p.tipo_moblado='".$amoblado."'
				                            and p.calendario_inicial='".$fecha."'
				                            and p.metro_cuadrados >='".$metroCuadrados."'
				                            and p.numero_dormitorios >='".$numerDormitorios."'
				                            and p.numero_banos >='".$numeroBanos."' "
                                     );



            return $data;
        }
                         
        // filtro con total_sin_inmuebles
        if (strlen($fecha)>=0 &&  strlen($precio)>=0 && strlen($total_sin_inmuebles)>0 && strlen($metroCuadrados)>=0 && strlen($numerDormitorios)>=0 && strlen($numeroBanos)>=0) {


                                   //dd("que pasa");
            $data=DB::select(
                                         "
						                 SELECT  p.*,e.*
													FROM property as p
													INNER JOIN edificio as e
											on e.property_id=p.id
											where p.precio >= 2500 
											and p.tipo_moblado='Totalmente sin muebles'
				                            and p.calendario_inicial='2019-01-29'
				                            and p.metro_cuadrados >=2
				                            and p.numero_dormitorios >=2
				                            and p.numero_banos >=2"
                                     );
            return $data;
        }

        if (strlen($fecha)>=0 &&  strlen($precio)>=0 && strlen($semi_amoblado)>0 && strlen($metroCuadrados)>=0 && strlen($numerDormitorios)>=0 && strlen($numeroBanos)>=0) {
            //dd("que pasa 2");
            $data=DB::select(
                                         "
				                         	SELECT  p.*,e.*
											FROM property as p
											INNER JOIN edificio as e
											on e.property_id=p.id
											where p.precio >= '".$precio."' 
											and p.tipo_moblado='".$semi_amoblado."'
				                            and p.calendario_inicial='".$fecha."'
				                            and p.metro_cuadrados >='".$metroCuadrados."'
				                            and p.numero_dormitorios >='".$numerDormitorios."'
				                            and p.numero_banos >='".$numeroBanos."' "
                                     );
            return $data;
        }
    }


    ///  relaciones
    public function edificio() {
        return $this->hasOne(Edificio::class);
    }
    
    public function scopeDate($query, $date = null) {
        if ($date == null) return $query;
        
        return $query->whereRaw(DB::raw("DATE(calendario_inicial) >= '".Carbon::parse($date)->format('Y-m-d')."'"));
    }
    
    public function scopeFurnishedTypes($query, $furnishedTypes = []) {
        if (count($furnishedTypes) == 0) return $query;
        
        return $query->whereIn('tipo_moblado', $furnishedTypes);
    }
    
    public function scopeSquareMeter($query, $squareMeter = null) {
        if ($squareMeter == null) return $query;
        
        return $query->where('metro_cuadrados', '>=', $squareMeter);
    }
    
    public function scopeBedrooms($query, $bedrooms = null) {
        if ($bedrooms == null) return $query;
        
        return $query->where('numero_dormitorios', '>=', $bedrooms);
    }
    
    public function scopeBathrooms($query, $bathrooms = null) {
        if ($bathrooms == null) return $query;
        
        return $query->where('numero_banos', '>=', $bathrooms);
    }
    
    public function scopeContract($query, $contract = null) {
        if ($contract == null) return $query;
        
        return $query->where('min_contrato', '>=', $contract);
    }
    
    public function scopeState($query, $state = null) {
        if ($state == null) return $query;
        
        return $query->where('estado', $state);
    }
    
    public function scopeOrientation($query, $orientation = null) {
        if ($orientation == null) return $query;
        
        return $query->where('orientacion', $orientation);
    }
    
    public function scopeHeating($query, $heating = []) {
        if (count($heating) == 0) return $query;
        
        return $query->whereIn('calefaccion', $heating);
    }
    
    public function scopeAmbient($query, $ambient = []) {
        if (count($ambient) == 0) return $query;
        
        return $query->whereIn('ambiente', $ambient);
    }
}
