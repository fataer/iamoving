<!-- Guardar este archivo en resources/views/web/paths/index.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Paths y Rutas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/css/bootstrap.min.css">
    <style>
        .path-section {
            margin-bottom: 30px;
        }
        .path-container {
            background-color: #f8f9fa;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 20px;
        }
        .path-name {
            font-weight: bold;
            color: #007bff;
        }
        .path-value {
            word-break: break-all;
            font-family: monospace;
        }
        .table-responsive {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Laravel 5.7.29 Paths y Rutas</h1>
        
        <div class="path-section">
            <h2>Paths del Sistema</h2>
            <div class="row">
                @foreach($paths as $name => $value)
                    <div class="col-md-6">
                        <div class="path-container">
                            <div class="path-name">{{ $name }}</div>
                            <div class="path-value">{{ $value }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        
        <div class="path-section">
            <h2>Rutas Registradas</h2>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>Método</th>
                            <th>URI</th>
                            <th>Nombre</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($routes as $route)
                            <tr>
                                <td>{{ $route['method'] }}</td>
                                <td>{{ $route['uri'] }}</td>
                                <td>{{ $route['name'] ?: '-' }}</td>
                                <td>{{ $route['action'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>