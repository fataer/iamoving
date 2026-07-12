<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aterrizaje extends Model
{
    protected $table = 'aterrizajes';
    protected $primaryKey = 'id_aterrizaje';
    
    // Permitir timestamps
    public $timestamps = true;
    
    protected $fillable = [
        'utm_source',
        'utm_ad',
        'utm_placement'
    ];
}