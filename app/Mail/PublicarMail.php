<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PublicarMail extends Mailable
{
    use Queueable, SerializesModels;

    public $body;
    public $subject;
    public $name;
    public $email;
    public $address;
    public $bedrooms;
    public $bathrooms;
    public $phone;
	public $precio;
	public $metros;
    public $photo;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    //public function __construct($body,$subject,$name,$email,$bedrooms,$bathrooms,$photo,$phone,$address,$precio,$metros)
	public function __construct($body,$subject,$name,$email,$bedrooms,$bathrooms,$photo,$phone,$address,$metros,$precio)
    {
        $this->body = $body;
        $this->subject = $subject;
        $this->name = $name;
        $this->email = $email;
        $this->bedrooms = $bedrooms;
        $this->bathrooms = $bathrooms;
        $this->photo = $photo;
        $this->phone = $phone;
        $this->address = $address;
		$this->metros = $metros;
		$this->precio = $precio;
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
        $bedrooms = $this->bedrooms;
        $bathrooms = $this->bathrooms;
        $photo = $this->photo;
        $phone = $this->phone;
        $address = $this->address;
		$metros = $this->metros;	
		$precio = $this->precio;		
    /*    if(strlen($photo) > 0){
            if(is_file($photo)){
                return $this->subject($this->subject)->attach($photo)->view('emails.publicar', compact('body','name','email','bedrooms','bathrooms','photo','phone','address','precio','metros'));
            }else{
                return $this->subject($this->subject)->view('emails.publicar', compact('body','name','email','bedrooms','bathrooms','photo','phone','address','precio','metros'));
            }
        }else{
            return $this->subject($this->subject)->view('emails.publicar', compact('body','name','email','bedrooms','bathrooms','photo','phone','address','precio','metros'));
        }*/
        
	if(strlen($photo) > 0){
            if(is_file($photo)){
                return $this->subject($this->subject)->attach($photo)->view('emails.publicar', compact('body','name','email','bedrooms','bathrooms','photo','phone','address','metros','precio'));
            }else{
                return $this->subject($this->subject)->view('emails.publicar', compact('body','name','email','bedrooms','bathrooms','photo','phone','address','metros','precio'));
            }
        }else{
            return $this->subject($this->subject)->view('emails.publicar', compact('body','name','email','bedrooms','bathrooms','photo','phone','address','metros','precio'));
        }		
        
        
    }
}
