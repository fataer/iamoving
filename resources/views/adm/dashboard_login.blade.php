<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso Dashboard - IAMOVING</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .login-container {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            padding: 40px;
            width: 100%;
            max-width: 400px;
            text-align: center;
        }
        
        .logo {
            font-size: 28px;
            font-weight: bold;
            color: #667eea;
            margin-bottom: 10px;
        }
        
        .subtitle {
            color: #666;
            margin-bottom: 30px;
            font-size: 16px;
        }
        
        .form-group {
            margin-bottom: 25px;
            text-align: left;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: 600;
        }
        
        input[type="password"] {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e1e5e9;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s ease;
            background: #f8f9fa;
        }
        
        input[type="password"]:focus {
            outline: none;
            border-color: #667eea;
            background: white;
        }
        
        .btn-login {
            width: 100%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s ease;
        }
        
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }
        
        .btn-login:active {
            transform: translateY(0);
        }
        
        .security-note {
            margin-top: 25px;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 8px;
            font-size: 14px;
            color: #666;
            border-left: 4px solid #667eea;
        }
        
        .error-message {
            background: #f8d7da;
            color: #721c24;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 20px;
            font-size: 14px;
        }
        
        .attempts-warning {
            background: #fff3cd;
            color: #856404;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 20px;
            font-size: 14px;
        }
        
        @media (max-width: 480px) {
            .login-container {
                margin: 20px;
                padding: 30px 25px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="logo">🔐 IAMOVING</div>
        <div class="subtitle">Dashboard de Administración</div>
        
        @if(session('error'))
        <div class="error-message">
            {{ session('error') }}
        </div>
        @endif
        
        <form method="POST" action="{{ url()->current() }}">
            @csrf
            <div class="form-group">
                <label for="dashboard_password">Contraseña de Acceso:</label>
                <input 
                    type="password" 
                    id="dashboard_password" 
                    name="dashboard_password" 
                    placeholder="Introduce la contraseña"
                    required
                    autocomplete="off"
                    autofocus
                >
            </div>
            
            <button type="submit" class="btn-login">
                🚀 Acceder al Dashboard
            </button>
        </form>
        
        <div class="security-note">
            <strong>🛡️ Área Restringida</strong><br>
            Este dashboard contiene información confidencial de visitas y usuarios.
            El acceso no autorizado está prohibido.
        </div>
    </div>

    <script>
        // Auto-focus en el campo de contraseña
        document.getElementById('dashboard_password').focus();
        
        // Enviar formulario con Enter
        document.getElementById('dashboard_password').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                this.form.submit();
            }
        });
        
        // Limpiar campo después de error
        @if(session('error'))
        document.getElementById('dashboard_password').value = '';
        @endif
    </script>
</body>
</html>