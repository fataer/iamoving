<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    protected $table = 'emails';
    protected $primaryKey = 'id_email';
    public $timestamps = false;
    
protected $fillable = ['email', 'nombre', 'utm_source', 'utm_ad', 'utm_placement'];
}