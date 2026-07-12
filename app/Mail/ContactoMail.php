<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactoMail extends Mailable
{
    use Queueable, SerializesModels;
    public $body;
    public $subject;
    public $name;
    public $email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($body,$subject,$name,$email)
    {
        $this->body = $body;
        $this->subject = $subject;
        $this->name = $name;
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $body = $this->body;
        $name = $this->name;
        $email = $this->email;
		$path_politicas = file_get_contents("https://iamoving.com/storage/condiciones/política_privacidad.iamoving.com.pdf");
        return $this->subject($this->subject)->view('emails.contacto', compact('body','name','email'))->attachData($path_politicas, 'politica_privacidad_iamoving.pdf');
    }
}
