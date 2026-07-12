<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comprador extends Model
{
    /**
     * Nombre de la tabla asociada con el modelo.
     *
     * @var string
     */
    protected $table = 'compradores';

    /**
     * Los atributos que son asignables masivamente.
     *
     * @var array
     */
    protected $fillable = [
        'oferta_compra_id',
        'nombre',
        'primer_apellido',
        'segundo_apellido',
        'tipo_documento_id',
        'numero_documento',
        'email_comprador',
    ];

    /**
     * Obtiene la oferta de compra asociada con este comprador.
     */
    public function ofertaCompra()
    {
        return $this->belongsTo(OfertaCompra::class, 'oferta_compra_id');
    }

    /**
     * Obtiene el tipo de documento asociado con este comprador.
     */
    public function tipoDocumento()
    {
        return $this->belongsTo(TipoDocumento::class, 'tipo_documento_id');
    }
}