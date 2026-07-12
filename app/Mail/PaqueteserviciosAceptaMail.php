<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PaqueteserviciosAceptaMail extends Mailable
{
    use Queueable, SerializesModels;
    public $dni;
    public $subject;
    public $name;
    public $email;
    public $address;
   // public $web;
    public $phone;
	public $paquete_servicios;
	public $path_contrato;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($dni,$subject,$name,$email,$phone,$address,$avatar,$nif_image,$nif_image2, $paquete_servicios, $path_contrato)
    {
        $this->dni = $dni;
        $this->subject = $subject;
        $this->name = $name;
        $this->email = $email;
        //$this->company = $company;
        //$this->web = $web;
        $this->phone = $phone;
        $this->address = $address;
        $this->avatar = $avatar;
        $this->nif_image = $nif_image;
        $this->nif_image2 = $nif_image2;
		 $this->paquete_servicios = $paquete_servicios;
		 $this->path_contrato = $path_contrato;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $dni = $this->dni;
        $name = $this->name;
        $email = $this->email;
        $phone = $this->phone;
        $address = $this->address;
        $avatar = $this->avatar;
        $nif_image = $this->nif_image;
        $nif_image2 = $this->nif_image2;
		$paquete_servicios = $this->paquete_servicios;
		$path_contrato = $this->path_contrato;
		
        //CABIAR ESTA LINEA!!!!
        $path_condiciones =  file_get_contents("https://iamoving.com/storage/paqueteservicios/" . $path_contrato);
        $path_politicas = file_get_contents("https://iamoving.com/storage/condiciones/política_privacidad.iamoving.com.pdf");

		return $this->subject($this->subject)->view('emails.colabora_acepta', compact('dni','name','email','phone','address','avatar','nif_image','nif_image2', 'paquete_servicios','path_contrato'))->attachData($path_condiciones, 'condiciones_paqueteservicios_colaborador_iamoving.pdf')
        ->attachData($path_politicas, 'politica_privacidad_iamoving.pdf');
    }
}
