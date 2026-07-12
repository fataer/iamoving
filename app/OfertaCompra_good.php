<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OfertaCompra extends Model
{
    /**
     * Nombre de la tabla asociada con el modelo.
     *
     * @var string
     */
    protected $table = 'oferta_compra';

    /**
     * Los atributos que son asignables masivamente.
     *
     * @var array
     */
    protected $fillable = [
        'numero_compradores',
        'email_contacto',
        'oferta',
        'arras',
        'restante',
        'inmueble_id',
        'email_propietario',
        'nombre_calle',
        'numero_calle',
        'piso_calle',
        'ciudad',
        'codigo_postal',
        'path_oferta',
        'direccion_completa',
        'dia',
        'mes',
        'annio',
        'ciudad_firma',
        'trastero_numero',
        'garaje_numero',
'plazo_escritura',
'municipio', 
'test_email',
        'aceptadas_condiciones',
    ];

    /**
     * Los atributos que deben ser convertidos a tipos nativos.
     *
     * @var array
     */
    protected $casts = [
        'aceptadas_condiciones' => 'boolean',
        'numero_compradores' => 'integer',
        'inmueble_id' => 'integer',
    ];

    /**
     * Obtiene todos los compradores asociados con esta oferta de compra.
     */
    public function compradores()
    {
        return $this->hasMany(Comprador::class, 'oferta_compra_id');
    }

    /**
     * Obtiene la propiedad inmueble asociada a esta oferta.
     */
    public function inmueble()
    {
        return $this->belongsTo(InformeDetalladoCabecera::class, 'inmueble_id');
    }
}