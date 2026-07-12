<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegisterSendEmail extends Mailable
{
    use Queueable, SerializesModels;

    //public $token;
    public $name;
	public $lastname;
	public $phone;
	public $email;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$lastname,$phone,$email)
    {
        //$this->token = $token;
        $this->name = $name;
		$this->lastname = $lastname;
		$this->phone = $phone;
		$this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //$token = $this->token;
        $name = $this->name;
		$lastname = $this->lastname;
		$phone = $this->phone;
		$email = $this->email;
        return $this->subject("Nuevo usuario registrado en Iamoving")->view('emails.nuevo_usuario', compact('name','lastname','phone','email'));
    }
}
