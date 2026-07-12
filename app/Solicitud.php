<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    protected $table = 'solicitudes';

    protected $fillable = [
        'date',
        'exception_date',
        'time',
        'exception_time',
        'state'
    ];
}
