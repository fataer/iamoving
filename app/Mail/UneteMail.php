<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UneteMail extends Mailable
{
    use Queueable, SerializesModels;
    public $body;
    public $subject;
    public $name;
    public $email;
    public $address;
    public $web;
    public $phone;
    public $company;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($body,$subject,$name,$email,$company,$web,$phone,$address)
    {
        $this->body = $body;
        $this->subject = $subject;
        $this->name = $name;
        $this->email = $email;
        $this->company = $company;
        $this->web = $web;
        $this->phone = $phone;
        $this->address = $address;

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
        $company = $this->company;
        $web = $this->web;
        $phone = $this->phone;
        $address = $this->address;
        return $this->subject($this->subject)->view('emails.unete', compact('body','name','email','company','web','phone','address'));
    }
}
