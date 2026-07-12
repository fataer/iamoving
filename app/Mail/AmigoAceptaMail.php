<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AmigoAceptaMail extends Mailable
{
    use Queueable, SerializesModels;
    public $subject;
    public $name;
    public $email;
    public $phone;
    public $nombre_calle;
	public $numero_calle;
	public $piso_calle;
	public $ciudad;
	public $codigo_postal;
	public $amigo;
	public $es_venta;
	public $path_contrato;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject,$name,$email,$phone,$nombre_calle,$numero_calle,$piso_calle,$ciudad, $codigo_postal,$amigo, $es_venta, $path_contrato)
    {
        $this->subject = $subject;
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->nombre_calle = $nombre_calle;
        $this->numero_calle = $numero_calle;
        $this->piso_calle = $piso_calle;
        $this->ciudad = $ciudad;
		$this->codigo_postal = $codigo_postal;
		 $this->amigo = $amigo;
		 $this->es_venta = $es_venta;
		 $this->path_contrato = $path_contrato;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $name = $this->name;
        $email = $this->email;
        $phone = $this->phone;
        $nombre_calle = $this->nombre_calle;
        $numero_calle = $this->numero_calle;
        $piso_calle = $this->piso_calle;
        $ciudad = $this->ciudad;
		$codigo_postal = $this->codigo_postal;
		$amigo = $this->amigo;
		$es_venta = $this->es_venta;
		$path_contrato = $this->path_contrato;
		
        //CABIAR ESTA LINEA!!!!
        $path_condiciones =  file_get_contents("https://iamoving.com/storage/propietarios/" . $path_contrato);
        $path_politicas = file_get_contents("https://iamoving.com/storage/condiciones/política_privacidad.iamoving.com.pdf");

		return $this->subject($this->subject)->view('emails.colabora_acepta', compact('name','email','phone','nombre_calle','numero_calle','piso_calle','ciudad','codigo_postal', 'amigo','es_venta','path_contrato'))->attachData($path_condiciones, 'condiciones_propietario_colaborador_iamoving.pdf')
        ->attachData($path_politicas, 'politica_privacidad_iamoving.pdf');
    }
}
