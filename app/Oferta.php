<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Oferta extends Model
{ 
	protected $table = "oferta"; 
    
  /*  protected $fillable = ['user_id', 'inmueble_id', 'fecha', 'hora'];

    public function inmueble()
    {
        return $this->belongsTo('App\InformeDetalladoCabecera','inmueble_id');
    }*/
}