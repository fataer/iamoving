<?php

try {
    require 'vendor/autoload.php';
    $app = require_once 'bootstrap/app.php';
    
    // Limpiar cache de configuración
    $configPath = $app->getCachedConfigPath();
    if (file_exists($configPath)) {
        unlink($configPath);
        echo "Cache de configuración limpiado<br>";
    }
    
    // Limpiar cache de rutas
    $routesPath = $app->getCachedRoutesPath();
    if (file_exists($routesPath)) {
        unlink($routesPath);
        echo "Cache de rutas limpiado<br>";
    }
    
    // Limpiar cache de servicios
    $servicesPath = $app->getCachedServicesPath();
    if (file_exists($servicesPath)) {
        unlink($servicesPath);
        echo "Cache de servicios limpiado<br>";
    }
    
    echo "Cachés limpiados correctamente<br>";
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "<br>";
}