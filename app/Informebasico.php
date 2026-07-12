<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Informebasico extends Model
{
	protected $table="informebasico";

    public   $timestamps=false;

    protected $fillable = [
        'precio',
        'metros_cuadrados',
        'numero_dormitorio',
        'numero_banos',
        'direccion',
        'contiene_estudio',
        'contiene_loft',
        'contiene_apartamento',
        'contiene_piso',
        'contiene_chalet',
        'contrato_tiempo',
        'estado_inmueble',
        'estado_amueblado',
        'orientacion',
        'calendario_inicio',
        'calendario_fin',
        'transporte_tiempo',
        'transporte_vehiculo',
        'transporte_estacion',
        'patio_externo',
        'patio_interno',
        'tiene_terraza',
        'tiene_balcon',
        'referencia_piso',
        'acceso_ascensor',
        'acceso_rampa',
        'acceso_carrito',
        'calefaccion',
        'caldera',
        'acepta_mascotas',
        'acepta_tenderos',
        'acepta_aire',
        'numero_suite',
        'cocina_lavavajillas',
        'cocina_horno',
        'certificado_energetico',
        'aproximado_agua',
        'aproximado_tasa_basura',
        'aproximado_comunidad',
        'aproximado_ibi',
        'gastos_calefaccion',
        'gastos_agua',
        'gastos_luz',
        'gastos_gas',
        'gastos_tasa_basura',
        'gastos_comunidad',
        'gastos_ibi',
        'gastos_internet',
        'datos_edificio_jardin',
        'datos_edificio_piscina',
        'datos_edificio_gym',
        'datos_edificio_sauna',
        'datos_edificio_zona_deportiva',
        'datos_edificio_zona_infantil',
        'datos_edificio_garaje_en_precio',
		'datos_edificio_garaje_2_plazas',
        'datos_edificio_garaje_mismo_edificio',
        'datos_edificio_testero_incluido',
        'datos_edificio_opcion_trasteo',
        'zona_garaje',
        'zona_antiguedad',
        'nota',
        'precio_uno',
        'precio_fianza',
        'estado_funcion',
	'published',
	'estado_inmueble',
	'ciudad',
	'tipo_inmueble'
    ];
}
