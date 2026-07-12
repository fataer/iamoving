<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ComprarAlquilerEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $isSale;  
    public $name;
    public $email;
    public $phone;
    public $inmueble;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($isSale,$name,$email,$phone,$inmueble)
    {
        $this->isSale = $isSale;
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->inmueble = $inmueble;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if($this->isSale == 1){
            $subject = "Pedido de reserva";
        }else{
            $subject = "Pedido de reserva";
        }
        $name = $this->name;
        $email = $this->email;
        $phone = $this->phone;
        $inmueble = $this->inmueble;
        return $this->subject($subject)->view('emails.comprar_alquilar', compact('name','email','phone','$inmueble'));
    }
}
