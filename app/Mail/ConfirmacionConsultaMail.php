<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConfirmacionConsultaMail extends Mailable
{
    use Queueable, SerializesModels;

    public $datos;

    public function __construct($datos)
    {
        $this->datos = $datos;
    }

    public function build()
    {
        return $this->view('emails.confirmacion-consulta')
                    ->subject('N de ref ' . $this->datos['id'] . ' Su pago ha sido realizado en IAMOVING to Spain')
                    ->bcc(explode(",",env('MAIL_CCO')));
    }
}