<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aterrizaje_vendedor extends Model
{
    protected $table = 'aterrizajes_vendedor';
    protected $primaryKey = 'id';
    
    // Permitir timestamps
    public $timestamps = true;
    
    protected $fillable = [
        'utm_source',
        'utm_ad',
        'utm_placement'
    ];
}