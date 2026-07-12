<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PremiumMail extends Mailable
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
        //CONDICIONES_COLABORADOR=20210128_condiciones.iamoving.com.pdf
        $path_condiciones =  file_get_contents("https://iamoving.com/storage/condiciones/" . env("CONDICIONES",""));
        $path_politicas = file_get_contents("https://iamoving.com/storage/condiciones/política_privacidad.iamoving.com.pdf");		
    /*    if(strlen($photo) > 0){
            if(is_file($photo)){
                return $this->subject($this->subject)->attach($photo)->view('emails.premium', compact('body','name','email','bedrooms','bathrooms','photo','phone','address','precio','metros'));
            }else{
                return $this->subject($this->subject)->view('emails.premium', compact('body','name','email','bedrooms','bathrooms','photo','phone','address','precio','metros'));
            }
        }else{
            return $this->subject($this->subject)->view('emails.premium', compact('body','name','email','bedrooms','bathrooms','photo','phone','address','precio','metros'));
        }*/
        
	if(strlen($photo) > 0){
            if(is_file($photo)){
                return $this->subject($this->subject)->attach($photo)->view('emails.premium', compact('body','name','email','bedrooms','bathrooms','photo','phone','address','metros','precio'))->attachData($path_condiciones, 'condiciones_colaborador_iamoving.pdf')
        ->attachData($path_politicas, 'politica_privacidad_iamoving.pdf');
            }else{
                return $this->subject($this->subject)->view('emails.premium', compact('body','name','email','bedrooms','bathrooms','photo','phone','address','metros','precio'))->attachData($path_condiciones, 'condiciones_colaborador_iamoving.pdf')
        ->attachData($path_politicas, 'politica_privacidad_iamoving.pdf');
            }
        }else{
            return $this->subject($this->subject)->view('emails.premium', compact('body','name','email','bedrooms','bathrooms','photo','phone','address','metros','precio'))->attachData($path_condiciones, 'condiciones_colaborador_iamoving.pdf')
        ->attachData($path_politicas, 'politica_privacidad_iamoving.pdf');
        }		
        
        
    }
}
