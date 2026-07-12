<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitud Confirmada - IAMOVING</title>
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
            border-top: 5px solid #4CAF50;
        }
        
        .success-icon, .warning-icon {
            width: 80px;
            height: 80px;
            border: 3px solid #4CAF50;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            background-color: #f8fff8;
        }
        
        .warning-icon {
            border-color: #ff9800;
            background-color: #fff8e1;
        }
        
        .checkmark, .warning-mark {
            font-size: 40px;
            color: #4CAF50;
            font-weight: bold;
        }
        
        .warning-mark {
            color: #ff9800;
        }
        
        h1 {
            color: #333;
            font-size: 28px;
            margin-bottom: 10px;
        }
        
        .subtitle {
            color: #666;
            font-size: 18px;
            margin-bottom: 20px;
        }
        
        .message {
            color: #555;
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 30px;
        }
        
        .btn-ok {
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
        
        .btn-ok:hover {
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
        @if(isset($mensaje) && str_contains($mensaje, 'ya había sido confirmada'))
        <!-- Mensaje para visita ya confirmada -->
        <div class="warning-icon">
            <div class="warning-mark">⚠️</div>
        </div>
        
        <h1>Gracias de nuevo</h1>
        <div class="subtitle">Su solicitud de visita ya fue enviada😊</div>
        
        <div class="message">
            Por favor, revisa tu buzón de correo @if(isset($userEmail))<strong>{{ $userEmail }}</strong>@endif. Es posible que tarde un poco el correo de visita o revisa en tu correo la sección de Spam.
        </div>
        @else
        <!-- Mensaje para confirmación exitosa -->
        <div class="success-icon">
            <div class="checkmark">✓</div>
        </div>
        
        <h1>Gracias</h1>
        <div class="subtitle">Solicitud enviada😊</div>
        
        <div class="message">
            Te confirmaremos lo antes posible, ya que necesitamos de la aprobación del propietario para confirmarte la cita.
        </div>
        @endif
        
        <button class="btn-ok" onclick="window.close();">OK</button>
        
        <div class="footer">
            <p>IAMOVING - ¡BUSCA TU CASA!</p>
        </div>
    </div>
    
    <script>
        // Opcional: cerrar automáticamente después de unos segundos
        setTimeout(function() {
            if (confirm('¿Deseas cerrar esta ventana?')) {
                window.close();
            }
        }, 15000);
    </script>
</body>
</html>