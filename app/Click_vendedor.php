<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Click_vendedor extends Model
{
    protected $table = 'click_vendedor';
    protected $primaryKey = 'id';
    
    // Permitir timestamps
    public $timestamps = true;
    
    protected $fillable = [
        'id_aterrizaje','tipo_boton',
        'utm_source',
        'utm_ad',
        'utm_placement'
    ];
}