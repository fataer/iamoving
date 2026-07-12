<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\InformeDetalladoCabecera;

class InformePropietarioMail extends Mailable
{
    use Queueable, SerializesModels;
    public $informe;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($informe)
    {
        $this->informe = $informe;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $informe = $this->informe;
        
        $subject = "Publicación Visita Virtual Ref. " . $informe->id;
        
        return $this->subject($subject)->view('emails.informe_propietario', compact('informe'));
    }
}
