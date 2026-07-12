<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\InformeDetalladoCabecera;

class VisitaSolicitanteMail extends Mailable
{
    use Queueable, SerializesModels;
    public $visita;
    public $admin;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($visita,$admin,$isPedido,$path_contrato)
    {
        $this->visita = $visita;
        $this->admin = $admin;
        $this->isPedido = $isPedido;
		$this->path_contrato =$path_contrato;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $visita = $this->visita;
        $admin = $this->admin;
        $inmueble = InformeDetalladoCabecera::find($visita->inmueble_id);
        $subject = $this->isPedido ? "Hacer una contraoferta" : "Solicitud de visita presencial enviada";
        return $this->subject($subject)->view('emails.visita_solicitante', compact('visita','inmueble','admin'));
    }
}