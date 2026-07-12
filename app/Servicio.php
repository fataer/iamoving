<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Servicio extends Model
{
    public $appends = ['video'];
    
    public function getVideoAttribute()
    {
        return json_decode($this->video_principal)[0]->download_link ?? null;
    }

    public function details()
    {
        return $this->hasMany('App\Serviciosdetalle', 'servicio_id');
    }
}
