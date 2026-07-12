<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OfertaAdjuntosMail extends Mailable
{
    use Queueable, SerializesModels;
public $subject;
public $num_oferta;
public $email_propietario;
public $path_contrato;
public $numero_arrendatarios;
public $avalistas;
public $nif_image;
public $nif_image2;
public $nif2_image;
public $nif2_image2;
public $nif3_image;
public $nif3_image2;
public $nif4_image;
public $nif4_image2;
public $nif5_image;
public $nif5_image2;
public $contrato_image;
public $contrato_image2;
public $contrato2_image;
public $contrato2_image2;
public $contrato3_image;
public $contrato3_image2;
public $contrato4_image;
public $contrato4_image2;
public $contrato5_image;
public $contrato5_image2;
public $nomina_image;
public $nomina_image2;
public $nomina2_image;
public $nomina2_image2;
public $nomina3_image;
public $nomina3_image2;
public $nomina4_image;
public $nomina4_image2;
public $nomina5_image;
public $nomina5_image2;
public $nif_aval_image;
public $nif_aval_image2;
public $nif2_aval_image;
public $nif2_aval_image2;
public $nif3_aval_image;
public $nif3_aval_image2;
public $nif4_aval_image;
public $nif4_aval_image2;
public $nif5_aval_image;
public $nif5_aval_image2;
public $contrato_aval_image;
public $contrato_aval_image2;
public $contrato2_aval_image;
public $contrato2_aval_image2;
public $contrato3_aval_image;
public $contrato3_aval_image2;
public $contrato4_aval_image;
public $contrato4_aval_image2;
public $contrato5_aval_image;
public $contrato5_aval_image2;
public $nomina_aval_image;
public $nomina_aval_image2;
public $nomina2_aval_image;
public $nomina2_aval_image2;
public $nomina3_aval_image;
public $nomina3_aval_image2;
public $nomina4_aval_image;
public $nomina4_aval_image2;
public $nomina5_aval_image;
public $nomina5_aval_image2;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject,$num_oferta,$email_propietario,$path_contrato,$numero_arrendatarios,$avalistas,$nif_image,$nif_image2,$nif2_image,$nif2_image2,$nif3_image,$nif3_image2,$nif4_image,$nif4_image2,$nif5_image,$nif5_image2,$contrato_image,$contrato_image2,$contrato2_image,$contrato2_image2,$contrato3_image,$contrato3_image2,$contrato4_image,$contrato4_image2,$contrato5_image,$contrato5_image2,$nomina_image,$nomina_image2,$nomina2_image,$nomina2_image2,$nomina3_image,$nomina3_image2,$nomina4_image,$nomina4_image2,$nomina5_image,$nomina5_image2,$nif_aval_image,$nif_aval_image2,$nif2_aval_image,$nif2_aval_image2,$nif3_aval_image,$nif3_aval_image2,$nif4_aval_image,$nif4_aval_image2,$nif5_aval_image,$nif5_aval_image2,$contrato_aval_image,$contrato_aval_image2,$contrato2_aval_image,$contrato2_aval_image2,$contrato3_aval_image,$contrato3_aval_image2,$contrato4_aval_image,$contrato4_aval_image2,$contrato5_aval_image,$contrato5_aval_image2,$nomina_aval_image,$nomina_aval_image2,$nomina2_aval_image,$nomina2_aval_image2,$nomina3_aval_image,$nomina3_aval_image2,$nomina4_aval_image,$nomina4_aval_image2,$nomina5_aval_image,$nomina5_aval_image2)
    {
$this->subject= $subject;
$this->num_oferta= $num_oferta;
$this->email_propietario= $email_propietario;
$this->path_contrato= $path_contrato;
$this->numero_arrendatarios= $numero_arrendatarios ;
$this->avalistas= $avalistas ;
$this->nif_image= $nif_image ;
$this->nif_image2= $nif_image2;
$this->nif2_image= $nif2_image;
$this->nif2_image2= $nif2_image2;
$this->nif3_image= $nif3_image;
$this->nif3_image2= $nif3_image2;
$this->nif4_image= $nif4_image;
$this->nif4_image2= $nif4_image2;
$this->nif5_image= $nif5_image;
$this->nif5_image2= $nif5_image2;
$this->contrato_image= $contrato_image;
$this->contrato_image2= $contrato_image2;
$this->contrato2_image= $contrato2_image;
$this->contrato2_image2= $contrato2_image2;
$this->contrato3_image= $contrato3_image;
$this->contrato3_image2= $contrato3_image2;
$this->contrato4_image= $contrato4_image;
$this->contrato4_image2= $contrato4_image2;
$this->contrato5_image= $contrato5_image;
$this->contrato5_image2= $contrato5_image2;
$this->nomina_image= $nomina_image;
$this->nomina_image2= $nomina_image2;
$this->nomina2_image= $nomina2_image;
$this->nomina2_image2= $nomina2_image2;
$this->nomina3_image= $nomina3_image;
$this->nomina3_image2= $nomina3_image2;
$this->nomina4_image= $nomina4_image;
$this->nomina4_image2= $nomina4_image2;
$this->nomina5_image= $nomina5_image;
$this->nomina5_image2= $nomina5_image2;
$this->nif_aval_image= $nif_aval_image;
$this->nif_aval_image2= $nif_aval_image2;
$this->nif2_aval_image= $nif2_aval_image;
$this->nif2_aval_image2= $nif2_aval_image2;
$this->nif3_aval_image= $nif3_aval_image;
$this->nif3_aval_image2= $nif3_aval_image2;
$this->nif4_aval_image= $nif4_aval_image;
$this->nif4_aval_image2= $nif4_aval_image2;
$this->nif5_aval_image= $nif5_aval_image;
$this->nif5_aval_image2= $nif5_aval_image2;
$this->contrato_aval_image= $contrato_aval_image;
$this->contrato_aval_image2= $contrato_aval_image2;
$this->contrato2_aval_image= $contrato2_aval_image;
$this->contrato2_aval_image2= $contrato2_aval_image2;
$this->contrato3_aval_image= $contrato3_aval_image;
$this->contrato3_aval_image2= $contrato3_aval_image2;
$this->contrato4_aval_image= $contrato4_aval_image;
$this->contrato4_aval_image2= $contrato4_aval_image2;
$this->contrato5_aval_image= $contrato5_aval_image;
$this->contrato5_aval_image2= $contrato5_aval_image2;
$this->nomina_aval_image= $nomina_aval_image;
$this->nomina_aval_image2= $nomina_aval_image2;
$this->nomina2_aval_image= $nomina2_aval_image;
$this->nomina2_aval_image2= $nomina2_aval_image2;
$this->nomina3_aval_image= $nomina3_aval_image;
$this->nomina3_aval_image2= $nomina3_aval_image2;
$this->nomina4_aval_image= $nomina4_aval_image;
$this->nomina4_aval_image2= $nomina4_aval_image2;
$this->nomina5_aval_image= $nomina5_aval_image;
$this->nomina5_aval_image2= $nomina5_aval_image2;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
$subject= $this->subject;
$num_oferta= $this->num_oferta;
$email_propietario= $this->email_propietario;
$path_contrato= $this->path_contrato;
$numero_arrendatarios= $this->numero_arrendatarios ;
$avalistas= $this->avalistas ;
$nif_image= $this->nif_image ;
$nif_image2= $this->nif_image2;
$nif2_image= $this->nif2_image;
$nif2_image2= $this->nif2_image2;
$nif3_image= $this->nif3_image;
$nif3_image2= $this->nif3_image2;
$nif4_image= $this->nif4_image;
$nif4_image2= $this->nif4_image2;
$nif5_image= $this->nif5_image;
$nif5_image2= $this->nif5_image2;
$contrato_image= $this->contrato_image;
$contrato_image2= $this->contrato_image2;
$contrato2_image= $this->contrato2_image;
$contrato2_image2= $this->contrato2_image2;
$contrato3_image= $this->contrato3_image;
$contrato3_image2= $this->contrato3_image2;
$contrato4_image= $this->contrato4_image;
$contrato4_image2= $this->contrato4_image2;
$contrato5_image= $this->contrato5_image;
$contrato5_image2= $this->contrato5_image2;
$nomina_image= $this->nomina_image;
$nomina_image2= $this->nomina_image2;
$nomina2_image= $this->nomina2_image;
$nomina2_image2= $this->nomina2_image2;
$nomina3_image= $this->nomina3_image;
$nomina3_image2= $this->nomina3_image2;
$nomina4_image= $this->nomina4_image;
$nomina4_image2= $this->nomina4_image2;
$nomina5_image= $this->nomina5_image;
$nomina5_image2= $this->nomina5_image2;
$nif_aval_image= $this->nif_aval_image;
$nif_aval_image2= $this->nif_aval_image2;
$nif2_aval_image= $this->nif2_aval_image;
$nif2_aval_image2= $this->nif2_aval_image2;
$nif3_aval_image= $this->nif3_aval_image;
$nif3_aval_image2= $this->nif3_aval_image2;
$nif4_aval_image= $this->nif4_aval_image;
$nif4_aval_image2= $this->nif4_aval_image2;
$nif5_aval_image= $this->nif5_aval_image;
$nif5_aval_image2= $this->nif5_aval_image2;
$contrato_aval_image= $this->contrato_aval_image;
$contrato_aval_image2= $this->contrato_aval_image2;
$contrato2_aval_image= $this->contrato2_aval_image;
$contrato2_aval_image2= $this->contrato2_aval_image2;
$contrato3_aval_image= $this->contrato3_aval_image;
$contrato3_aval_image2= $this->contrato3_aval_image2;
$contrato4_aval_image= $this->contrato4_aval_image;
$contrato4_aval_image2= $this->contrato4_aval_image2;
$contrato5_aval_image= $this->contrato5_aval_image;
$contrato5_aval_image2= $this->contrato5_aval_image2;
$nomina_aval_image= $this->nomina_aval_image;
$nomina_aval_image2= $this->nomina_aval_image2;
$nomina2_aval_image= $this->nomina2_aval_image;
$nomina2_aval_image2= $this->nomina2_aval_image2;
$nomina3_aval_image= $this->nomina3_aval_image;
$nomina3_aval_image2= $this->nomina3_aval_image2;
$nomina4_aval_image= $this->nomina4_aval_image;
$nomina4_aval_image2= $this->nomina4_aval_image2;
$nomina5_aval_image= $this->nomina5_aval_image;
$nomina5_aval_image2= $this->nomina5_aval_image2;
		
        //CABIAR ESTA LINEA!!!!
       $path_condiciones =  file_get_contents("https://iamoving.com/storage/oferta/".$num_oferta."/".$path_contrato);
        //$path_politicas = file_get_contents("https://iamoving.com/storage/condiciones/política_privacidad.iamoving.com.pdf");
		$nif_image_adjunto =  file_get_contents($nif_image);
		$nif_image2_adjunto =  file_get_contents($nif_image2);

		return $this->subject($this->subject)->view('emails.oferta_propietario', compact('email_propietario','path_contrato','numero_arrendatarios','avalistas','nif_image','nif_image2','nif2_image','nif2_image2','nif3_image','nif3_image2','nif4_image','nif4_image2','nif5_image','nif5_image2','contrato_image','contrato_image2','contrato2_image','contrato2_image2','contrato3_image','contrato3_image2','contrato4_image','contrato4_image2','contrato5_image','contrato5_image2','nomina_image','nomina_image2','nomina2_image','nomina2_image2','nomina3_image','nomina3_image2','nomina4_image','nomina4_image2','nomina5_image','nomina5_image2','nif_aval_image','nif_aval_image2','nif2_aval_image','nif2_aval_image2','nif3_aval_image','nif3_aval_image2','nif4_aval_image','nif4_aval_image2','nif5_aval_image','nif5_aval_image2','contrato_aval_image','contrato_aval_image2','contrato2_aval_image','contrato2_aval_image2','contrato3_aval_image','contrato3_aval_image2','contrato4_aval_image','contrato4_aval_image2','contrato5_aval_image','contrato5_aval_image2','nomina_aval_image','nomina_aval_image2','nomina2_aval_image','nomina2_aval_image2','nomina3_aval_image','nomina3_aval_image2','nomina4_aval_image','nomina4_aval_image2','nomina5_aval_image','nomina5_aval_image2'))
		->attachData($nif_image_adjunto, str_replace("..",".","Nif_".$num_oferta."_1.".substr($nif_image, -4)))
		->attachData($nif_image2_adjunto, str_replace("..",".","Nif_".$num_oferta."_2.".substr($nif_image2, -4)))
		->attachData($path_condiciones, 'Oferta'.$num_oferta.'.pdf');
    }
}
