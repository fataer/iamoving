<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nuevaconsulta extends Model
{ 
    protected $table = "nuevaconsulta"; 
    
   /* protected $fillable = [
        'nombre',
        'apellidos',
        'pais',
        'otroPais', // Nuevo campo añadido
        'telefono',
        'email',
        'mesConsulta',
        'aceptadas_condiciones',
        'estado',
        'stripe_session_id',
    ];*/

 /*   protected $fillable = [
        'nombre', 'apellidos', 'email', 'pais', 'otroPais', 'telefono', 'mesConsulta', 'estado',
        'stripe_session_id', 'stripe_payment_intent', 'stripe_payment_status', 'stripe_amount_total',
        'stripe_currency', 'stripe_customer', 'stripe_customer_email', 'stripe_customer_name',
        'stripe_payment_method', 'stripe_payment_method_types', 'stripe_captured_amount'
    ];    */
    protected $fillable = [
        'nombre', 'apellidos', 'email', 'pais', 'otroPais', 'telefono', 'mesConsulta', 'estado',
        'stripe_session_id', 'stripe_payment_intent', 'stripe_payment_status', 'stripe_amount_total',
        'stripe_currency', 'stripe_customer', 'stripe_customer_email', 'stripe_customer_name',
        'stripe_payment_method', 'stripe_payment_method_types', 'stripe_captured_amount',
        'stripe_cancel_reason', 'stripe_payment_intent_status', 'stripe_last_payment_error'
    ];    

    protected $dates = [
        'aceptadas_condiciones',
        'created_at',
        'updated_at'
    ];
}