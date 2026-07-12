<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\InformeDetalladoCabecera;

class PropietarioVentaEmail extends Mailable
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
    public function __construct($detalle)
    {
        $this->detalle = $detalle;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $detalle = $this->detalle;
        
        $subject = "Publicación Visita Virtual Ref. " . $detalle->id;
        
        
        $path_condiciones =  file_get_contents("https://iamoving.com/storage/condiciones/" . env("CONDICIONES",""));
        $path_politicas = file_get_contents("https://iamoving.com/storage/condiciones/política_privacidad.iamoving.com.pdf");
        
        return $this->subject($subject)->view('emails.propietario_venta_registro_inmueble', compact('detalle'))->attachData($path_condiciones, 'condiciones_iamoving.pdf')
        ->attachData($path_politicas, 'politica_privacidad_iamoving.pdf');
    }
}
