<?php
namespace App\Services;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class DirectMailService 
{
    /**
     * Envía un correo electrónico usando PHPMailer directamente, sin depender del sistema de Laravel
     */
    public static function sendMail($to, $cc = [], $bcc = '', $subject, $htmlBody, $attachmentPath = null, $attachmentName = null)
    {
        // Crear una instancia; pasar `true` habilita excepciones
        $mail = new PHPMailer(true);
        
        try {
            // Configurar codificación UTF-8 desde el principio
            $mail->CharSet = 'UTF-8';
            $mail->Encoding = 'base64';
            
            // Configuración del servidor Hostinger
            $mail->isSMTP();                                      // Usar SMTP
            $mail->Host       = 'smtp.hostinger.com';             // Servidor SMTP de Hostinger
            $mail->SMTPAuth   = true;                             // Habilitar autenticación SMTP
            $mail->Username   = 'roberto@iamoving.com';           // Usuario SMTP (tu dirección de correo)
            $mail->Password   = 'Iamoving2019.';             // Contraseña SMTP
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;      // Habilitar SSL (para puerto 465)
            $mail->Port       = 465;                              // Puerto SSL para Hostinger
            
            // Para debugging - quita estos comentarios si necesitas ver más detalles sobre errores
            // $mail->SMTPDebug = 2;
            // $mail->Debugoutput = function($str, $level) { \Log::info($str); };
            
            // Remitentes y destinatarios
            $mail->setFrom('roberto@iamoving.com', 'IAMOVING');
            $mail->addAddress($to);                               // Destinatario principal
            
            // Añadir CC
            if (!empty($cc)) {
                foreach ($cc as $ccEmail) {
                    if (!empty($ccEmail)) {
                        $mail->addCC($ccEmail);
                    }
                }
            }
            
            // Añadir BCC
            if (!empty($bcc)) {
                $mail->addBCC($bcc);
            }
            
            // Añadir adjunto si existe
            if ($attachmentPath && $attachmentName) {
                $mail->addStringAttachment($attachmentPath, $attachmentName);
            }
            
            // Contenido
            $mail->isHTML(true);                                  // Establecer formato de email a HTML
            $mail->Subject = mb_encode_mimeheader($subject, 'UTF-8');
            
            // Asegurarnos que el HTML está en UTF-8
            $htmlBody = '<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
' . $htmlBody . '
</body>
</html>';
            
            $mail->Body = $htmlBody;
            
            // También establecer una versión alternativa en texto plano
            $textBody = html_entity_decode(strip_tags($htmlBody));
            $mail->AltBody = $textBody;
            
            // Enviar el correo
            $sent = $mail->send();
            \Log::info('Correo enviado con PHPMailer: ' . ($sent ? 'Éxito' : 'Fallido'));
            return $sent;
        } catch (Exception $e) {
            \Log::error("Error al enviar correo con PHPMailer: {$mail->ErrorInfo}");
            \Log::error($e->getMessage());
            return false;
        }
    }
}