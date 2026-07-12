<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\InformeDetalladoCabecera;

class AgenteGestionMail extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $visita;
    public $admin;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user,$visita,$admin,$isPedido)
    {
        $this->user = $user;
        $this->visita = $visita;
        $this->admin = $admin;
        $this->isPedido = $isPedido;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $user = $this->user;
        $visita = $this->visita;
        $admin = $this->admin;
        $inmueble = InformeDetalladoCabecera::find($visita->inmueble_id);
        $isPedido = $this->isPedido;
        
        //$subject = $isPedido ? "Pedido de Reserva" : "Solicitud de visita";
        //$subject = $isPedido ? "Pedido Reserva Agente Ref. ". $visita->inmueble_id : "Visita AG  n". $visita->id ." Ref.".$visita->inmueble_id;
		$subject = "Visita AG n". $visita->id ." Ref.".$visita->inmueble_id;
        return $this->subject($subject)->view('emails.agente_gestion', compact('user','visita','inmueble','admin','isPedido'));
    }
}
