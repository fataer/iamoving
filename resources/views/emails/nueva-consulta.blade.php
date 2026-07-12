<!DOCTYPE html>
<html>
<head>
    <title>Nueva Solicitud Iamoving to Spain</title>
</head>
<body>
    <h1>Solicitud Iamoving to Spain - Ref.: {{ $datos['id'] }}</h1>
    <p>Se ha recibido una nueva solicitud de consulta con los siguientes datos:</p>
    <ul>
        <li>ID: {{ $datos['id'] }}</li>
        <li>Nombre: {{ $datos['nombre'] }} {{ $datos['apellidos'] }}</li>
        <li>País: {{ $datos['pais'] }}</li>
        <li>Teléfono: {{ $datos['telefono'] }}</li>
        <li>Email: {{ $datos['email'] }}</li>
        <li>Mes de consulta: {{ $datos['mesConsulta'] }}</li>
    </ul>
</body>
</html>
Con estas modificaciones, su sistema ahora insertará un registro en la base de datos, recuperará el ID, y lo incluirá en el asunto del email antes de enviarlo.

Copy
Retry


Claude does not have the ability to run the code it generates yet. Claude does not have internet access. Links provided may not be accurate or up to date.
Claude can make mistakes. Please double-check responses.