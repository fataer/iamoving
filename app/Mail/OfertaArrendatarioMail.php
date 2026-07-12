<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OfertaArrendatarioMail extends Mailable
{
    use Queueable, SerializesModels;
    
	 public $subject;
	 public $inmueble_id;
	 public $num_oferta;
    public $email;
    public $importe;
	public $path_contrato;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject,$inmueble_id,$num_oferta,$email,$importe, $path_contrato)
    {
        
        
        $this->subject = $subject;
		$this->inmueble_id = $inmueble_id;
		$this->num_oferta = $num_oferta;
		
        $this->email = $email;
         $this->importe = $importe;
		 $this->path_contrato = $path_contrato;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        $subject = $this->subject;
		$inmueble_id = $this->inmueble_id;
		$num_oferta = $this->num_oferta;
        $email = $this->email;
		$importe = $this->importe;
		$path_contrato = $this->path_contrato;
		
        //CABIAR ESTA LINEA!!!!
        $path_condiciones =  file_get_contents("https://iamoving.com/storage/oferta/".$num_oferta."/".$path_contrato);
        //$path_politicas = file_get_contents("https://iamoving.com/storage/condiciones/política_privacidad.iamoving.com.pdf");

		return $this->subject($this->subject)->view('emails.oferta_arrendatario', compact('email','importe','path_contrato'))->attachData($path_condiciones, 'Oferta Ref. '.$inmueble_id.'.pdf');
    }
}
