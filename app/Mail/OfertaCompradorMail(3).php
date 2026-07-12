<?php
namespace App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OfertaCompradorMail extends Mailable
{
    use Queueable, SerializesModels;
    
    public $subject;
    public $inmueble_id;
    public $num_oferta;
    public $email;
    public $arras;
    public $path_contrato;
    public $primerNombre;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject, $inmueble_id, $num_oferta, $email, $arras, $path_contrato, $primerNombre = null)
    {
        $this->subject = $subject;
        $this->inmueble_id = $inmueble_id;
        $this->num_oferta = $num_oferta;
        $this->email = $email;
        $this->arras = $arras;
        $this->path_contrato = $path_contrato;
        $this->primerNombre = $primerNombre;
    }
    
    /**
     * Build the message.
     *
     * @return $this
     */
   /* public function build()
    {
        $subject = $this->subject;
        $inmueble_id = $this->inmueble_id;
        $num_oferta = $this->num_oferta;
        $email = $this->email;
        $arras = $this->arras;
        $path_contrato = $this->path_contrato;
        $primerNombre = $this->primerNombre;
        
        // Obtener el contenido del archivo PDF
        $path_condiciones = file_get_contents("https://iamoving.com/storage/ofertacompra/".$num_oferta."/".$path_contrato);
        
        // Usar roberto@iamoving.com como remitente en lugar de iamoving.email@gmail.com
        return $this->from('roberto@iamoving.com', 'IAMOVING')
                    // Alternativa: usar non_reply@iamoving.com
                    // return $this->from('non_reply@iamoving.com', 'IAMOVING')
                    ->subject($this->subject)
                    ->view('emails.oferta_comprador', compact('email', 'arras', 'path_contrato', 'primerNombre'))
                    ->attachData($path_condiciones, 'Oferta Compra Ref. '.$inmueble_id.'.pdf');
    }*/
// En el método build() de OfertaCompradorMail
public function build()
{
    $subject = $this->subject;
    $inmueble_id = $this->inmueble_id;
    $num_oferta = $this->num_oferta;
    $email = $this->email;
    $arras = $this->arras;
    $path_contrato = $this->path_contrato;
    $primerNombre = $this->primerNombre;
    
    // Obtener el contenido del archivo PDF
    $path_condiciones = file_get_contents("https://iamoving.com/storage/ofertacompra/".$num_oferta."/".$path_contrato);
    
    // Forzar el remitente específicamente para este correo
    return $this->from('roberto@iamoving.com', 'IAMOVING')
                ->replyTo('roberto@iamoving.com', 'IAMOVING')  // Añadir también replyTo
                ->subject($this->subject)
                ->view('emails.oferta_comprador', compact('email', 'arras', 'path_contrato', 'primerNombre'))
                ->attachData($path_condiciones, 'Oferta Compra Ref. '.$inmueble_id.'.pdf')
                ->withSwiftMessage(function ($message) {
                    $message->setSender('roberto@iamoving.com');
                    $message->setReturnPath('roberto@iamoving.com');
                });
}    
}