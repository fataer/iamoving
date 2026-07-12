<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendar Visita - IAmovingPro</title>
</head>
<body>
<div class="container">
    <div class="form-container">
        <h2>Agendar Visita</h2>
        
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        
        <form action="{{ route('prueba_agendar_visita') }}" method="POST">
            @csrf
            
            <!-- Campos requeridos por el controlador -->
            <input type="hidden" name="reference" value="1007">
            <input type="hidden" name="tipo_visita" value="1">
            
            <div class="form-group">
                <label for="date">Fecha <span class="required">*</span></label>
                <input type="date" id="date" name="date" value="{{ old('date') }}" required>
                @if($errors->has('date'))
                    <div class="error-message">{{ $errors->first('date') }}</div>
                @endif
            </div>
            
            <div class="form-group">
                <label for="time">Hora <span class="required">*</span></label>
                <input type="time" id="time" name="time" value="{{ old('time') }}" required>
                @if($errors->has('time'))
                    <div class="error-message">{{ $errors->first('time') }}</div>
                @endif
            </div>
            
            <div class="form-group">
                <label for="nombre_completo_venta">Nombre Completo <span class="required">*</span></label>
                <input type="text" id="nombre_completo_venta" name="nombre_completo_venta" 
                       value="{{ old('nombre_completo_venta') }}" placeholder="Ingrese su nombre completo" required>
                @if($errors->has('nombre_completo_venta'))
                    <div class="error-message">{{ $errors->first('nombre_completo_venta') }}</div>
                @endif
            </div>
            
            <div class="form-group">
                <label for="apellidos_completo_venta">Apellidos Completos <span class="required">*</span></label>
                <input type="text" id="apellidos_completo_venta" name="apellidos_completo_venta" 
                       value="{{ old('apellidos_completo_venta') }}" placeholder="Ingrese sus apellidos completos" required>
                @if($errors->has('apellidos_completo_venta'))
                    <div class="error-message">{{ $errors->first('apellidos_completo_venta') }}</div>
                @endif
            </div>
            
            <div class="form-group">
                <label for="email_contacto_venta">Email de Contacto <span class="required">*</span></label>
                <input type="email" id="email_contacto_venta" name="email_contacto_venta" 
                       value="{{ old('email_contacto_venta') }}" placeholder="ejemplo@correo.com" required>
                @if($errors->has('email_contacto_venta'))
                    <div class="error-message">{{ $errors->first('email_contacto_venta') }}</div>
                @endif
            </div>
            
            <div class="form-group">
                <label for="movil_contacto_venta">Móvil de Contacto <span class="required">*</span></label>
                <input type="text" id="movil_contacto_venta" name="movil_contacto_venta" 
                       value="{{ old('movil_contacto_venta') }}" placeholder="Ingrese su número de móvil" required>
                @if($errors->has('movil_contacto_venta'))
                    <div class="error-message">{{ $errors->first('movil_contacto_venta') }}</div>
                @endif
            </div>
            
            <div class="form-group">
                <label for="live_spain"><b><span>&#8265;</span></b> <b>1. ¿Vives en España?</b> <span class="required">*</span></label>
                <select id="live_spain" name="live_spain" required>
                    <option value="">Selecciona una opción</option>
                    <option value="Si" {{ old('live_spain') == 'Si' ? 'selected' : '' }}>Si</option>
                    <option value="No" {{ old('live_spain') == 'No' ? 'selected' : '' }}>No</option>
                </select>
                @if($errors->has('live_spain'))
                    <div class="error-message">{{ $errors->first('live_spain') }}</div>
                @endif
            </div>
            
            <div class="form-group">
                <label for="inversor"><b><span>&#8265;</span></b> <b>2. ¿El comprador es una persona física o una sociedad?</b> <span class="required">*</span></label>
                <select id="inversor" name="inversor" required>
                    <option value="">Selecciona una opción</option>
                    <option value="Persona física" {{ old('inversor') == 'Persona física' ? 'selected' : '' }}>Persona física</option>
                    <option value="Sociedad" {{ old('inversor') == 'Sociedad' ? 'selected' : '' }}>Sociedad</option>
                </select>
                @if($errors->has('inversor'))
                    <div class="error-message">{{ $errors->first('inversor') }}</div>
                @endif
            </div>
            
            <div class="form-group">
                <label for="credito"><b><span>&#8265;</span></b> <b>3. ¿Cuál sería la forma de pago?</b> <span class="required">*</span></label>
                <select id="credito" name="credito" required>
                    <option value="">Selecciona una opción</option>
                    <option value="Ya dispongo del dinero, no necesito de un crédito" {{ old('credito') == 'Ya dispongo del dinero, no necesito de un crédito' ? 'selected' : '' }}>Ya dispongo del dinero, no necesito de un crédito</option>
                    <option value="Tengo que pedir un crédito hipotecario" {{ old('credito') == 'Tengo que pedir un crédito hipotecario' ? 'selected' : '' }}>Tengo que pedir un crédito hipotecario</option>
                    <option value="Tengo un crédito hipotecario aprobado sobre este valor" {{ old('credito') == 'Tengo un crédito hipotecario aprobado sobre este valor' ? 'selected' : '' }}>Tengo un crédito hipotecario aprobado sobre este valor</option>
                </select>
                @if($errors->has('credito'))
                    <div class="error-message">{{ $errors->first('credito') }}</div>
                @endif
            </div>
            
            <div class="form-group">
                <label for="sobreti_venta">Sobre ti - Venta</label>
                <input type="text" id="sobreti_venta" name="sobreti_venta" 
                       value="{{ old('sobreti_venta') }}" placeholder="Cuéntanos sobre ti">
                @if($errors->has('sobreti_venta'))
                    <div class="error-message">{{ $errors->first('sobreti_venta') }}</div>
                @endif
            </div>
            
            <button type="submit" class="submit-btn">Agendar Visita</button>
        </form>
    </div>
</div>

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f5f5f5;
        margin: 0;
        padding: 20px;
    }
    
    .container {
        max-width: 600px;
        margin: 0 auto;
    }
    
    .form-container {
        background: white;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    
    .form-container h2 {
        color: #333;
        text-align: center;
        margin-bottom: 30px;
    }
    
    .form-group {
        margin-bottom: 20px;
    }
    
    .form-group label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
        color: #555;
    }
    
    .form-group input[type="text"],
    .form-group input[type="email"],
    .form-group input[type="date"],
    .form-group input[type="time"],
    .form-group select {
        width: 100%;
        padding: 12px;
        border: 2px solid #ddd;
        border-radius: 5px;
        font-size: 16px;
        transition: border-color 0.3s;
        box-sizing: border-box;
        background-color: white;
    }
    
    .form-group input:focus,
    .form-group select:focus {
        border-color: #4CAF50;
        outline: none;
    }
    
    .submit-btn {
        background-color: #4CAF50;
        color: white;
        padding: 12px 30px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        width: 100%;
        transition: background-color 0.3s;
    }
    
    .submit-btn:hover {
        background-color: #45a049;
    }
    
    .required {
        color: #e74c3c;
    }
    
    .error-message {
        color: #e74c3c;
        font-size: 14px;
        margin-top: 5px;
    }
    
    .alert {
        padding: 15px;
        margin-bottom: 20px;
        border: 1px solid transparent;
        border-radius: 4px;
    }
    
    .alert-success {
        color: #3c763d;
        background-color: #dff0d8;
        border-color: #d6e9c6;
    }
    
    .alert-danger {
        color: #a94442;
        background-color: #f2dede;
        border-color: #ebccd1;
    }
</style>
</body>
</html>