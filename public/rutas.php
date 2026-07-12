<?php

// Establece un tiempo límite amplio para la ejecución
set_time_limit(180);

// Imprime mensajes como texto plano
header('Content-Type: text/plain');

echo "Ejecutando comandos Artisan...\n\n";

// Ruta a la carpeta raíz de la aplicación
$basePath = base_path();


echo "Ruta base: " . $basePath . "\n";

?>