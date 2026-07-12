<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Confirma tu solicitud de visita</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .btn-confirm {
            display: inline-block;
            padding: 15px 30px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            margin: 20px 0;
        }
        .btn-confirm:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <p>Hola <?php
            $mystring = $user->name;
            $findme   = ' ';
            $pos = strpos($mystring, $findme);
            if ($pos === false) {
                echo $mystring;
            } else {
                echo substr($mystring, 0, $pos);
            }
        ?>,</p>

        <p>Para confirmar tu solicitud de visita, haz clic en el siguiente botón:</p>
        
        <div style="text-align: center;">
            <a href="{{ $confirmationUrl }}" class="btn-confirm">Confirmar Solicitud de Visita</a>
        </div>
        

        
        <p>Si por precaución prefieres no hacer clic en el botón, copia y pega este enlace en tu navegador y tu solicitud de visita será confirmada:</p>
        <p>{{ $confirmationUrl }}</p>
        <p><strong>Detalles de la visita:</strong></p>
        <p>Inmueble: <a href="https://www.iamoving.com/anuncio/{{ $inmueble->id }}" target="_blank">{{ $inmueble->road }}</a></p>
        <p>Fecha y hora solicitada: {{ $visita->fecha }}, {{ $visita->hora }}</p>        
        <br>
        <p>Saludos,<br>Equipo IAMOVING</p>
    </div>
</body>
</html>