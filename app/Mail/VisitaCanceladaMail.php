<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\InformeDetalladoCabecera;

class VisitaCanceladaMail extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $visita;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user,$visita)
    {
        $this->user = $user;
        $this->visita = $visita;
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
        $inmueble = InformeDetalladoCabecera::find($visita->inmueble_id);
        return $this->subject("Cancelacion de visita")->view('emails.visita_cancelada', compact('user','visita','inmueble'));
    }
}
