<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Users_unregistered extends Model
{ 
	protected $table = "users_unregistered"; 
    
  /*  protected $fillable = ['user_id', 'inmueble_id', 'fecha', 'hora'];

    public function inmueble()
    {
        return $this->belongsTo('App\InformeDetalladoCabecera','inmueble_id');
    }*/
}