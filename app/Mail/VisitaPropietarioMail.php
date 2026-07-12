<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\InformeDetalladoCabecera;

class VisitaPropietarioMail extends Mailable
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
    public function __construct($user,$visita,$admin,$isPedido,$path_contrato)
    {
        $this->user = $user;
        $this->visita = $visita;
        $this->admin = $admin;
        $this->isPedido = $isPedido;
		$this->path_contrato = $path_contrato;
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
        
        $subject = $isPedido ? "Hacer una contraoferta" : "Solicitud de visita";
        
        return $this->subject($subject)->view('emails.visita_propietario', compact('user','visita','inmueble','admin','isPedido'));
    }
}
