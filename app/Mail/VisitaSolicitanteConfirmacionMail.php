<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\InformeDetalladoCabecera;

class VisitaSolicitanteConfirmacionMail extends Mailable
{
    use Queueable, SerializesModels;
    
    public $user;
    public $visita;
    public $confirmationUrl;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $visita, $confirmationUrl)
    {
        $this->user = $user;
        $this->visita = $visita;
        $this->confirmationUrl = $confirmationUrl;
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
        $confirmationUrl = $this->confirmationUrl;
        $inmueble = InformeDetalladoCabecera::find($visita->inmueble_id);

        return $this->subject('Confirma tu solicitud de visita presncial')
                    ->view('emails.visita_solicitante_confirmacion', compact('user', 'visita', 'inmueble', 'confirmationUrl'));
    }
}