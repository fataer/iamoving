<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Factura extends Model
{ 
	protected $table = "factura"; 
    
  /*  protected $fillable = ['user_id', 'inmueble_id', 'fecha', 'hora'];

    public function inmueble()
    {
        return $this->belongsTo('App\InformeDetalladoCabecera','inmueble_id');
    }*/
}