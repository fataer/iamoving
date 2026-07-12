<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\InformeDetalladoCabecera;

class VisitaSolicitanteCondicionesMail extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $visita;
    public $admin;
	public $path_contrato;

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
   /* public function build()
    {
        $user = $this->user;
        $visita = $this->visita;
        $admin = $this->admin;
        $inmueble = InformeDetalladoCabecera::find($visita->inmueble_id);
		$path_contrato = $this->path_contrato;
		
        //CABIAR ESTA LINEA!!!!
        //$path_condiciones_generales =  file_get_contents("https://iamoving.com/storage/condiciones/" . env("CONDICIONES",""));
        $path_condiciones_generales =  file_get_contents("https://iamoving.com/storage/condiciones/" . env("CONDICIONES",""));
        $path_condiciones =  file_get_contents("https://iamoving.com/storage/visita/". $inmueble->id . "/". $path_contrato);		
		
        //$path_condiciones =  file_get_contents("https://iamoving.com/storage/condiciones/" . env("CONDICIONES",""));
        $path_politicas = file_get_contents("https://iamoving.com/storage/condiciones/política_privacidad.iamoving.com.pdf");  
		
        $subject = $this->isPedido ? "Hacer una contraoferta" : "Solicitud de visita presencial enviada";
        return $this->subject($subject)->view('emails.visita_solicitante_condiciones', compact('user','visita','inmueble','admin'))->attachData($path_condiciones, 'Terminos_de_Intermediacion_IAMOVING_ONLINE_para_Comprador.pdf')
        ->attachData($path_politicas, 'politica_privacidad_iamoving.pdf')->attachData($path_condiciones_generales, 'terminos_y_condiciones_iamoving.pdf');
    }*/
    
    /*public function build()
    {
        $user = $this->user;
        $visita = $this->visita;
        $admin = $this->admin;
        $inmueble = InformeDetalladoCabecera::find($visita->inmueble_id);
        $path_contrato = $this->path_contrato;
        
        // ARCHIVOS LOCALES - Sin descargas HTTP
        //$path_condiciones_local = storage_path('/home/u819346592/domains/iamoving.com/public_html/storage/visita/'.$inmueble->id.'/'.$path_contrato);
    	$path_condiciones_local = config('paths.custom_storage') . 'visita/'.$inmueble->id.'/'.$path_contrato;
        //$path_politicas_local = config('paths.custom_storage') . 'condiciones/política_privacidad.iamoving.com.pdf';
        $path_condiciones_generales_local = config('paths.custom_storage') . 'condiciones/'.env("CONDICIONES","");
        
        $subject = $this->isPedido ? "Hacer una contraoferta" : "Solicitud de visita presencial enviada";
        
        return $this->subject($subject)
                ->view('emails.visita_solicitante_condiciones_test', compact('user','visita','inmueble','admin'))
                ->attach($path_condiciones_local, ['as' => 'Terminos_de_Intermediacion_IAMOVING_ONLINE_para_Comprador.pdf'])
                ->attach($path_condiciones_generales_local, ['as' => 'terminos_condiciones_y_politica_privacidad_iamoving.pdf']);        
    } */
    
public function build()
{
    $user = $this->user;
    $visita = $this->visita;
    $admin = $this->admin;
    $inmueble = InformeDetalladoCabecera::find($visita->inmueble_id);
    $path_contrato = $this->path_contrato;
    
    // VOLVER A LA VERSIÓN ANTIGUA
    $path_condiciones = file_get_contents("https://iamoving.com/storage/visita/". $inmueble->id . "/". $path_contrato);
    $path_condiciones_generales = file_get_contents("https://iamoving.com/storage/condiciones/" . env("CONDICIONES",""));
    //$path_politicas = file_get_contents("https://iamoving.com/storage/condiciones/política_privacidad.iamoving.com.pdf");  
    
    $subject = $this->isPedido ? "Hacer una contraoferta" : "Solicitud de visita presencial enviada";
    
    return $this->subject($subject)
        ->view('emails.visita_solicitante_condiciones', compact('user','visita','inmueble','admin'))
        ->attachData($path_condiciones, 'Terminos_de_Intermediacion_IAMOVING_ONLINE_para_Comprador.pdf')
        ->attachData($path_condiciones_generales, 'terminos_y_condiciones_iamoving.pdf');
        //->attachData($path_politicas, 'politica_privacidad_iamoving.pdf');
        
        
}    
  
}