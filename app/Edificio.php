<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Edificio extends Model
{
    protected $table="edificio";
    
    public function scopeYard($query, $yard = null) {
        if ($yard == null) return $query;
        
        return $query->where('jardin', 'si');
    }
}
