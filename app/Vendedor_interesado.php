<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendedor_interesado extends Model
{
    protected $table = 'vendedor_interesado';
    protected $primaryKey = 'id';
    
    // Permitir timestamps
    public $timestamps = true;
    
    protected $fillable = [
        'id_aterrizaje','id_click','nombre','telefono','tipo_boton',
        'utm_source',
        'utm_ad',
        'utm_placement'
    ];
}