<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Visitaspruebas extends Model
{ 
	protected $table = "visitaspruebas"; 
    
    protected $fillable = ['user_id', 'inmueble_id', 'fecha', 'hora',    'confirmacion',
    'fecha_confirmacion', 
    'token_confirmacion'];

    public function inmueble()
    {
        return $this->belongsTo('App\InformeDetalladoCabecera','inmueble_id');
    }
    
// También añadir estas relaciones si no existen
protected $dates = [
    'fecha_confirmacion',
    'created_at',
    'updated_at'
];

// Opcional: añadir cast para el campo confirmacion
protected $casts = [
    'confirmacion' => 'boolean',
    'fecha_confirmacion' => 'datetime'
];    
}
