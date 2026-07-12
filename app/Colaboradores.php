<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Colaboradores extends Model
{ 
	protected $table = "colaboradores"; 
    
  /*  protected $fillable = ['user_id', 'inmueble_id', 'fecha', 'hora'];

    public function inmueble()
    {
        return $this->belongsTo('App\InformeDetalladoCabecera','inmueble_id');
    }*/
}