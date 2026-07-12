<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewsNotificationMail extends Mailable
{
    use Queueable, SerializesModels;
    public $nombre;
    public $email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($inmuebles)
    {
        $this->inmuebles = $inmuebles;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $inmuebles = $this->inmuebles;
        return $this->subject("¡Nos acaban de entrar los siguientes inmuebles!")->view('emails.news_notification', compact('inmuebles'));
    }
}
