<?php
// decrypt.php
session_start();

// Configuración inicial
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/decrypt_errors.log');
define('MAX_FILE_SIZE_MB', 50);
define('LOG_FILE', __DIR__ . '/decrypt_logs.log');

// Función de logging mejorada
function logEvent($message, $context = []) {
    $logEntry = sprintf(
        "[%s] %s\nIP: %s\nUser Agent: %s\nContext: %s\nStack Trace: %s\n\n",
        date('Y-m-d H:i:s'),
        $message,
        $_SERVER['REMOTE_ADDR'] ?? 'unknown',
        $_SERVER['HTTP_USER_AGENT'] ?? 'unknown',
        json_encode($context),
        (new Exception())->getTraceAsString()
    );
    file_put_contents(LOG_FILE, $logEntry, FILE_APPEND);
}

try {
    // Verificar requisitos
    if (!extension_loaded('openssl')) {
        throw new RuntimeException("OpenSSL extension no está habilitada");
    }

    // Generar CSRF token si no existe
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Validar CSRF token
        $postToken = $_POST['csrf_token'] ?? '';
        $sessionToken = $_SESSION['csrf_token'] ?? '';
        
        if (empty($postToken) || empty($sessionToken)) {
            throw new RuntimeException("Token CSRF no proporcionado");
        }
        
        if (!hash_equals($sessionToken, $postToken)) {
            throw new RuntimeException("Token CSRF inválido");
        }

        // Validar archivo
        if (!isset($_FILES['encrypted_file']) || $_FILES['encrypted_file']['error'] !== UPLOAD_ERR_OK) {
            throw new RuntimeException("Error en la subida del archivo");
        }

        $file = $_FILES['encrypted_file'];
        
        // Validar tamaño
        if ($file['size'] > (MAX_FILE_SIZE_MB * 1024 * 1024)) {
            throw new RuntimeException("El archivo excede el tamaño máximo de " . MAX_FILE_SIZE_MB . "MB");
        }
        
        // Validar extensión
        $fileExt = pathinfo($file['name'], PATHINFO_EXTENSION);
        if (strtolower($fileExt) !== 'enc') {
            throw new RuntimeException("Solo se permiten archivos .enc");
        }

        // Validar clave
        $key = $_POST['decryption_key'] ?? '';
        if (strlen($key) < 32) {
            throw new RuntimeException("La clave debe tener al menos 32 caracteres");
        }

        // Leer archivo
        $encryptedContent = file_get_contents($file['tmp_name']);
        if ($encryptedContent === false) {
            throw new RuntimeException("Error al leer el archivo subido");
        }

        if (strlen($encryptedContent) < 16) {
            throw new RuntimeException("Formato de archivo inválido");
        }

        // Extraer IV y datos
        $iv = substr($encryptedContent, 0, 16);
        $data = substr($encryptedContent, 16);

        // Desencriptar
        $decrypted = openssl_decrypt(
            $data,
            'aes-256-cbc',
            $key,
            OPENSSL_RAW_DATA,
            $iv
        );

        if ($decrypted === false) {
            throw new RuntimeException("Error en desencriptación: " . openssl_error_string());
        }

        // Generar nombre seguro
        $originalName = preg_replace('/[^a-zA-Z0-9_-]/', '', pathinfo($file['name'], PATHINFO_FILENAME));
        $outputFilename = $originalName . '_decrypted.xlsx';

        // Enviar archivo
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . $outputFilename . '"');
        header('Content-Length: ' . strlen($decrypted));
        header('Cache-Control: no-store, no-cache');
        echo $decrypted;
        exit;

    }

} catch (Throwable $e) {
    logEvent('Error crítico: ' . $e->getMessage(), [
        'errorCode' => $e->getCode(),
        'file' => $e->getFile(),
        'line' => $e->getLine(),
        'trace' => $e->getTraceAsString()
    ]);
    
    $_SESSION['error'] = "Ocurrió un error. Por favor intenta nuevamente.";
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

// HTML
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desencriptar Archivo</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            max-width: 800px;
            margin: 2rem auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .container {
            background: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid #ffcccc;
            background-color: #ffe6e6;
            border-radius: 4px;
            color: #cc0000;
        }
        .form-group {
            margin-bottom: 1.5rem;
        }
        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: #333;
        }
        input[type="file"] {
            border: 2px dashed #ddd;
            padding: 1rem;
            width: 100%;
        }
        input[type="password"] {
            width: 100%;
            padding: 0.8rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }
        button {
            background: #007bff;
            color: white;
            padding: 1rem 2rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background 0.3s;
        }
        button:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Herramienta de Desencriptación</h1>
        
        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert">
                <?= htmlspecialchars($_SESSION['error'], ENT_QUOTES) ?>
            </div>
            <?php unset($_SESSION['error']); ?>
        <?php endif; ?>

        <form method="POST" enctype="multipart/form-data">
            <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token'], ENT_QUOTES) ?>">
            
            <div class="form-group">
                <label>Archivo Encriptado (.enc):</label>
                <input type="file" name="encrypted_file" accept=".enc" required>
                <small>Tamaño máximo: <?= MAX_FILE_SIZE_MB ?>MB</small>
            </div>

            <div class="form-group">
                <label>Clave de Desencriptación:</label>
                <input type="password" name="decryption_key" 
                       placeholder="Mínimo 32 caracteres" 
                       minlength="32" 
                       required>
            </div>

            <button type="submit">Desencriptar Archivo</button>
        </form>
    </div>

    <script>
        // Validación del lado cliente
        document.querySelector('form').addEventListener('submit', function(e) {
            const file = document.querySelector('input[type="file"]').files[0];
            const key = document.querySelector('input[type="password"]').value;
            
            if (file && file.size > <?= MAX_FILE_SIZE_MB * 1024 * 1024 ?>) {
                alert('El archivo es demasiado grande');
                e.preventDefault();
            }
            
            if (key.length < 32) {
                alert('La clave debe tener al menos 32 caracteres');
                e.preventDefault();
            }
        });
    </script>
</body>
</html>