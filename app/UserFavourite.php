<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class UserFavourite extends Model
{ 
	protected $table = "users_favourites"; 
    
    protected $fillable = ['user_id', 'inmueble_id'];

    public function inmueble()
    {
        return $this->belongsTo('App\InformeDetalladoCabecera','inmueble_id');
    }
}
