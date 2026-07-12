<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\InformeDetalladoCabecera;

class IamovingGestionMail extends Mailable
{
    use Queueable, SerializesModels;
    
    public $user;
    public $visita;
    public $admin;
    public $isPedido; // AÑADIR ESTA LÍNEA
    public $path_contrato;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $visita, $admin, $isPedido, $path_contrato)
    {
        $this->user = $user;
        $this->visita = $visita;
        $this->admin = $admin;
        $this->isPedido = $isPedido; // AÑADIR ESTA LÍNEA
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
        $isPedido = $this->isPedido; // AÑADIR ESTA LÍNEA
        $path_contrato = $this->path_contrato;
        
        // VOLVER A LA VERSIÓN ANTIGUA QUE FUNCIONABA
        $path_condiciones = file_get_contents("https://iamoving.com/storage/visita/". $inmueble->id . "/". $path_contrato);
        $path_politicas = file_get_contents("https://iamoving.com/storage/condiciones/política_privacidad.iamoving.com.pdf"); 
        
        $subject = $isPedido ? "Hacer contraoferta IAMOVING Ref. ". $visita->inmueble_id : "Visita IM  n". $visita->id ." Ref.". $visita->inmueble_id;
        
        /*return $this->subject($subject)
            ->view('emails.iamoving_gestion', compact('user', 'visita', 'inmueble', 'admin', 'isPedido')) // AÑADIR isPedido
            ->attachData($path_condiciones, 'Terminos_de_Intermediacion_IAMOVING_ONLINE_para_Comprador.pdf')
            ->attachData($path_politicas, 'politica_privacidad_iamoving.pdf');*/
return $this->subject($subject)
            ->view('emails.iamoving_gestion', compact('user', 'visita', 'inmueble', 'admin', 'isPedido')) // AÑADIR isPedido
            ->attachData($path_condiciones, 'Terminos_de_Intermediacion_IAMOVING_ONLINE_para_Comprador.pdf');            
    }
}