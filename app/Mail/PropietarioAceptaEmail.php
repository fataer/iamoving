<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\InformeDetalladoCabecera;
use App\Ciudad;

class PropietarioAceptaEmail extends Mailable
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
        
        //$subject = "Un propietario ha aceptado las condiciones para " . $detalle->tipo_plan;
		$subject = "Un propietario ha aceptado las condiciones de IAMOVING";
        
        
        $path_condiciones =  file_get_contents("https://iamoving.com/storage/condiciones/" . env("CONDICIONES",""));
        $path_politicas = file_get_contents("https://iamoving.com/storage/condiciones/política_privacidad.iamoving.com.pdf");
        if($detalle->ciudad_inmueble){
            $ciudad = Ciudad::find($detalle->ciudad_inmueble)->name;
        }
        return $this->subject($subject)->view('emails.propietario_acepta', compact('detalle','ciudad'))->attachData($path_condiciones, 'condiciones_iamoving.pdf')
        ->attachData($path_politicas, 'politica_privacidad_iamoving.pdf');
    }
}
