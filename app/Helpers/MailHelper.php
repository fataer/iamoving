<?php

namespace App\Helpers;

class MailHelper
{
    /**
     * Envía un correo electrónico con adjuntos utilizando la función mail() nativa de PHP
     *
     * @param string $to Destinatario principal
     * @param array $cc Lista de destinatarios en copia
     * @param string|array $bcc Lista de destinatarios en copia oculta
     * @param string $subject Asunto del correo
     * @param string $htmlMessage Contenido HTML del mensaje
     * @param array $attachments Array de adjuntos [['name' => 'nombre.pdf', 'content' => $binaryContent]]
     * @param string $from Dirección de correo del remitente
     * @param string $fromName Nombre del remitente
     * @param string $replyTo Dirección de respuesta
     * @return bool Resultado del envío
     */
    public static function sendMailWithAttachments(
        $to, 
        $cc = [], 
        $bcc = '', 
        $subject, 
        $htmlMessage, 
        $attachments = [], 
        $from = 'roberto@iamoving.com',
        $fromName = 'IAMOVING',
        $replyTo = 'roberto@iamoving.com'
    ) {
        // Generar un boundary único para el email
        $boundary = md5(time());
        
        // Cabeceras del correo mejoradas
        $headers = "MIME-Version: 1.0\r\n";
        
        // Añadir cabeceras para mejorar la autenticación del remitente
        $headers .= "From: {$fromName} <{$from}>\r\n";
        $headers .= "Reply-To: {$replyTo}\r\n";
        $headers .= "Return-Path: {$from}\r\n"; // Importante para autenticación
        $headers .= "Message-ID: <" . time() . rand(1000, 9999) . "@" . parse_url(env('APP_URL', 'iamoving.com'), PHP_URL_HOST) . ">\r\n";
        $headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";
        $headers .= "X-Priority: 3\r\n";
        $headers .= "X-Sender: {$from}\r\n"; // Añadido para autenticación
        
        // Añadir fecha RFC2822
        $headers .= "Date: " . date("r") . "\r\n";
        
        // Añadir copias (CC) si existen
        if (!empty($cc)) {
            if (is_array($cc)) {
                $headers .= "Cc: " . implode(", ", $cc) . "\r\n";
            } else {
                $headers .= "Cc: {$cc}\r\n";
            }
        }
        
        // Añadir copia oculta (BCC) si existe
        if (!empty($bcc)) {
            if (is_array($bcc)) {
                $headers .= "Bcc: " . implode(", ", $bcc) . "\r\n";
            } else {
                $headers .= "Bcc: {$bcc}\r\n";
            }
        }
        
        $headers .= "Content-Type: multipart/mixed; boundary=\"" . $boundary . "\"\r\n";
        
        // Cuerpo del mensaje
        $body = "--" . $boundary . "\r\n";
        $body .= "Content-Type: text/html; charset=UTF-8\r\n";
        $body .= "Content-Transfer-Encoding: base64\r\n\r\n";
        $body .= chunk_split(base64_encode($htmlMessage)) . "\r\n";
        
        // Procesar adjuntos
        if (!empty($attachments)) {
            foreach ($attachments as $attachment) {
                if (isset($attachment['name']) && isset($attachment['content'])) {
                    $body .= "--" . $boundary . "\r\n";
                    
                    // Determinar el tipo MIME basado en la extensión del archivo
                    $fileExtension = pathinfo($attachment['name'], PATHINFO_EXTENSION);
                    $mimeType = self::getMimeType($fileExtension);
                    
                    $body .= "Content-Type: {$mimeType}; name=\"" . $attachment['name'] . "\"\r\n";
                    $body .= "Content-Transfer-Encoding: base64\r\n";
                    $body .= "Content-Disposition: attachment; filename=\"" . $attachment['name'] . "\"\r\n\r\n";
                    $body .= chunk_split(base64_encode($attachment['content'])) . "\r\n";
                }
            }
        }
        
        // Cierre del mensaje
        $body .= "--" . $boundary . "--";
        
        // Configuración adicional para envío de correo
        $additionalParams = null;
        
        // Si estamos en un entorno Linux/Unix, podemos intentar configurar el Return-Path
        if (PHP_OS !== 'WIN32' && PHP_OS !== 'WINNT') {
            $additionalParams = "-f {$from}";
        }
        
        // Enviar correo
        $result = mail($to, $subject, $body, $headers, $additionalParams);
        
        // Registrar resultado
        if ($result) {
            \Log::info("Correo enviado correctamente a: {$to}");
        } else {
            \Log::error("Error al enviar correo a: {$to}");
        }
        
        return $result;
    }
    
    /**
     * Obtiene el tipo MIME basado en la extensión del archivo
     *
     * @param string $extension Extensión del archivo
     * @return string Tipo MIME
     */
    private static function getMimeType($extension)
    {
        $mimeTypes = [
            'pdf'  => 'application/pdf',
            'doc'  => 'application/msword',
            'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'xls'  => 'application/vnd.ms-excel',
            'xlsx' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'jpg'  => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'png'  => 'image/png',
            'gif'  => 'image/gif',
            'zip'  => 'application/zip',
            'txt'  => 'text/plain',
        ];
        
        return isset($mimeTypes[strtolower($extension)]) ? $mimeTypes[strtolower($extension)] : 'application/octet-stream';
    }
}
