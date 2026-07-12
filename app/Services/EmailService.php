<?php
namespace App\Services;

class EmailService 
{
    /**
     * Envía un correo electrónico con la oferta de compra
     * 
     * @param string $destinatarioPrincipal Correo del destinatario principal
     * @param array $otrosDestinatarios Lista de correos en copia (CC)
     * @param string $copiaOculta Correo en copia oculta (BCC)
     * @param string $subject Asunto del correo
     * @param object $ofertaCompra Objeto con la información de la oferta
     * @param string $path_contrato Ruta al archivo PDF del contrato
     * @param string $primerNombre Primer nombre del comprador
     * @return bool Éxito o fracaso del envío
     */
    public static function sendOfertaEmail($destinatarioPrincipal, $otrosDestinatarios, $copiaOculta, $subject, $ofertaCompra, $path_contrato, $primerNombre)
    {
        try {
            // Cargar la plantilla de correo y reemplazar variables
            $template = file_get_contents(resource_path('views/emails/oferta_comprador.blade.php'));
            $template = str_replace(['{{ isset($primerNombre) ? \' \' . $primerNombre : \'\' }}', '<?php echo date(\'Y\')?>'], 
                               [' ' . $primerNombre, date('Y')], 
                               $template);
            
            // Obtener el contenido del archivo PDF
            $path_condiciones = file_get_contents("https://iamoving.com/storage/ofertacompra/".$ofertaCompra->id."/".$path_contrato);
            
            // Preparar cabeceras para el email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";
            $headers .= "From: IAMOVING <roberto@iamoving.com>" . "\r\n";
            $headers .= "Reply-To: roberto@iamoving.com" . "\r\n";
            $headers .= "Return-Path: roberto@iamoving.com" . "\r\n";
            
            // Añadir CC si hay otros destinatarios
            if (!empty($otrosDestinatarios)) {
                $headers .= "Cc: " . implode(", ", $otrosDestinatarios) . "\r\n";
            }
            
            // Añadir BCC
            if (!empty($copiaOculta)) {
                $headers .= "Bcc: " . $copiaOculta . "\r\n";
            }
            
            // Para adjuntos, necesitamos usar un límite (boundary)
            $boundary = md5(time());
            $headers .= "Content-Type: multipart/mixed; boundary=\"" . $boundary . "\"" . "\r\n";
            
            // Preparar el cuerpo del mensaje
            $message = "--" . $boundary . "\r\n";
            $message .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
            $message .= "Content-Transfer-Encoding: 8bit" . "\r\n" . "\r\n";
            $message .= $template . "\r\n";
            
            // Añadir el PDF adjunto
            $message .= "--" . $boundary . "\r\n";
            $message .= "Content-Type: application/pdf; name=\"Oferta Compra Ref. ".$ofertaCompra->inmueble_id.".pdf\"" . "\r\n";
            $message .= "Content-Transfer-Encoding: base64" . "\r\n";
            $message .= "Content-Disposition: attachment; filename=\"Oferta Compra Ref. ".$ofertaCompra->inmueble_id.".pdf\"" . "\r\n" . "\r\n";
            $message .= chunk_split(base64_encode($path_condiciones)) . "\r\n";
            $message .= "--" . $boundary . "--";
            
            // Enviar el correo utilizando mail()
            $mailEnviado = mail($destinatarioPrincipal, $subject, $message, $headers);
            
            return $mailEnviado;
            
        } catch (\Exception $e) {
            \Log::error('Error al enviar correo electrónico: ' . $e->getMessage());
            return false;
        }
    }
}