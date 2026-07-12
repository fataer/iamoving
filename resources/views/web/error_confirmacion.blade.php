<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error de Confirmación - IAMOVING</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        
        .container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 40px;
            text-align: center;
            max-width: 500px;
            width: 90%;
            border-top: 5px solid #dc3545;
        }
        
        .error-icon {
            width: 80px;
            height: 80px;
            border: 3px solid #dc3545;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            background-color: #fff5f5;
        }
        
        .error-mark {
            font-size: 40px;
            color: #dc3545;
            font-weight: bold;
        }
        
        h1 {
            color: #333;
            font-size: 28px;
            margin-bottom: 10px;
        }
        
        .message {
            color: #555;
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 30px;
        }
        
        .btn-back {
            background-color: #6c757d;
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            margin-right: 10px;
        }
        
        .btn-back:hover {
            background-color: #545b62;
        }
        
        .btn-contact {
            background-color: #007bff;
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }
        
        .btn-contact:hover {
            background-color: #0056b3;
        }
        
        .footer {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #eee;
            color: #888;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="error-icon">
            <div class="error-mark">✗</div>
        </div>
        
        <h1>Error de Confirmación</h1>
        
        <div class="message">
            {{ $mensaje ?? 'Ha ocurrido un error al procesar tu solicitud de confirmación.' }}
        </div>
        
        <div>
            <a href="https://www.iamoving.com" class="btn-back">Volver al Inicio</a>
            <a href="mailto:info@iamoving.com" class="btn-contact">Contactar Soporte</a>
        </div>
        
        <div class="footer">
            <p>IAMOVING - ¡Busca tu casa!</p>
            <p>Si necesitas ayuda, no dudes en contactarnos en info@iamoving.com</p>
        </div>
    </div>
</body>
</html>