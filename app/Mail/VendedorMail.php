<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class VendedorMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $phone;
    public $subject;

    public function __construct($name, $phone, $subject)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->subject = $subject;
    }

    public function build()
    {
        $name = $this->name;
        $phone = $this->phone;
        
        return $this->subject($this->subject)->view('emails.vendedor', compact('name', 'phone'));
    }
}