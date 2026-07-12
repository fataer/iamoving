<?php
// decrypt_debug.php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try {
   // 1. Verificar versión PHP
    if (version_compare(PHP_VERSION, '7.4.0') < 0) {
        throw new Exception("Se requiere PHP >= 7.4. Actual: " . PHP_VERSION);
    }

    // 2. Verificar extensión OpenSSL
    if (!extension_loaded('openssl')) {
        throw new Exception("Extensión OpenSSL no cargada");
    }

    // 3. Verificar permisos de escritura
    $testFile = __DIR__ . '/test_permissions.tmp';
    if (!file_put_contents($testFile, 'test')) {
        throw new Exception("Sin permisos de escritura en: " . __DIR__);
    }
    unlink($testFile);

    // 4. Verificar configuración PHP
    $requiredSettings = [
        'upload_max_filesize' => '50M',
        'post_max_size' => '50M',
        'session.auto_start' => 0
    ];

    foreach ($requiredSettings as $setting => $value) {
        if (ini_get($setting) != $value) {
            throw new Exception("Configuración requerida: $setting=$value");
        }
    }

    echo "✓ Entorno verificado correctamente";
    
} catch (Exception $e) {
    echo "⚠ Error de diagnóstico: " . $e->getMessage();
} catch (Throwable $e) {
    echo "<h2>Debug Details</h2>";
    echo "<pre>";
    echo "Error: " . htmlspecialchars($e->getMessage()) . "\n\n";
    echo "PHP Version: " . PHP_VERSION . "\n";
    echo "OpenSSL: " . (extension_loaded('openssl') ? 'Enabled' : 'Disabled') . "\n";
    echo "Session Status: " . json_encode(session_status()) . "\n";
    echo "Uploads Dir: " . ini_get('upload_tmp_dir') . "\n";
    echo "Free Disk Space: " . round(disk_free_space(__DIR__) / 1024 / 1024) . "MB\n";
    echo "</pre>";
}
