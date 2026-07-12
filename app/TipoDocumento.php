<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
    /**
     * Nombre de la tabla asociada con el modelo.
     *
     * @var string
     */
    protected $table = 'tipo_documento';

    /**
     * Los atributos que son asignables masivamente.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
    ];

    /**
     * Obtiene todos los compradores que tienen este tipo de documento.
     */
    public function compradores()
    {
        return $this->hasMany(Comprador::class, 'tipo_documento_id');
    }
}