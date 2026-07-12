<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PublicadoMail extends Mailable
{
    use Queueable, SerializesModels;
    public $dni;
    public $subject;
    public $name;
    public $email;
    public $address;
   // public $web;
    public $phone;
	 public $plan;
	 public $owner;
	 public $city;
	 public  $visit_date;
	public 	$visit_time;	 
	public 	$nif_image;
	public 	$nif_image2;
    //public $company;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($dni,$subject,$name,$email,$phone,$address, $plan, $owner, $city,$visit_date ,$visit_time,$nif_image,$nif_image2)
    {
        $this->dni = $dni;
        $this->subject = $subject;
        $this->name = $name;
        $this->email = $email;
        //$this->company = $company;
        //$this->web = $web;
        $this->phone = $phone;
        $this->address = $address;
        $this->plan = $plan;
        $this->owner = $owner;
        $this->city = $city;
				$this->visit_date = $visit_date;
		$this->visit_time = $visit_time;
		$this->nif_image = $nif_image;
        $this->nif_image2 = $nif_image2;
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
        //$company = $this->company;
        //$web = $this->web;
        $phone = $this->phone;
        $address = $this->address;
        $plan = $this->plan;
        $owner = $this->owner;
        $city = $this->city;
		$visit_date= $this->visit_date;
		$visit_time =$this->visit_time;	
        $nif_image = $this->nif_image;
        $nif_image2 = $this->nif_image2;		
        //CONDICIONES_COLABORADOR=20210128_condiciones.iamoving.com.pdf
        $path_condiciones =  file_get_contents("https://iamoving.com/storage/condiciones/" . env("CONDICIONES",""));
        $path_politicas = file_get_contents("https://iamoving.com/storage/condiciones/política_privacidad.iamoving.com.pdf");

		return $this->subject($this->subject)->view('emails.publicado', compact('dni','name','email','phone','address','plan','owner','city', 'visit_date','visit_time','nif_image','nif_image2'))->attachData($path_condiciones, 'condiciones_colaborador_iamoving.pdf')
        ->attachData($path_politicas, 'politica_privacidad_iamoving.pdf');
    }
}
