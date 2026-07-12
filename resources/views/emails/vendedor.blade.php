<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Nuevo contacto de vendedor</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <div style="max-width: 600px; margin: 0 auto; padding: 20px;">
        <h2 style="color: #2c3e50; border-bottom: 2px solid #3498db; padding-bottom: 10px;">
            Nuevo contacto de vendedor
        </h2>
        
        <div style="background-color: #f8f9fa; padding: 20px; border-radius: 5px; margin: 20px 0;">
            <h3 style="margin-top: 0; color: #2c3e50;">Datos del contacto:</h3>
            
            <table style="width: 100%; border-collapse: collapse;">
                <tr>
                    <td style="padding: 8px 0; font-weight: bold; width: 30%;">Nombre:</td>
                    <td style="padding: 8px 0;">{{ $name }}</td>
                </tr>
                <tr>
                    <td style="padding: 8px 0; font-weight: bold;">Teléfono:</td>
                    <td style="padding: 8px 0;">{{ $phone }}</td>
                </tr>
            </table>
        </div>
        
        <div style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #ddd; font-size: 12px; color: #666;">
            <!--<p>Este email fue enviado automáticamente desde el formulario de vendedores de IAMOVING.</p>-->
            <p>Fecha: {{ date('d/m/Y H:i:s') }}</p>
        </div>
    </div>
</body>
</html>