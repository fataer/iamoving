<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Visitas - Confirmaciones</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7fa;
            color: #333;
            line-height: 1.6;
        }
        
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        h1 {
            font-size: 28px;
            font-weight: 300;
            margin-bottom: 10px;
        }
        
        .stats {
            display: flex;
            gap: 20px;
            margin-top: 15px;
        }
        
        .stat-card {
            background: rgba(255,255,255,0.2);
            padding: 15px 20px;
            border-radius: 8px;
            text-align: center;
            min-width: 120px;
        }
        
        .stat-number {
            font-size: 24px;
            font-weight: bold;
            display: block;
        }
        
        .stat-label {
            font-size: 14px;
            opacity: 0.9;
        }
        
        .controls {
            background: white;
            padding: 20px;
            margin: 20px auto;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .filter-group {
            display: flex;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
        }
        
        label {
            font-weight: 600;
            color: #555;
        }
        
        select {
            padding: 8px 12px;
            border: 2px solid #e1e5e9;
            border-radius: 6px;
            font-size: 14px;
            background: white;
            cursor: pointer;
            transition: border-color 0.3s ease;
        }
        
        select:focus {
            outline: none;
            border-color: #667eea;
        }
        
        .btn-refresh {
            background: #667eea;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
            transition: background 0.3s ease;
        }
        
        .btn-refresh:hover {
            background: #5a67d8;
        }
        
        .table-container {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin: 20px auto;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        th {
            background: #f8f9fb;
            padding: 15px 12px;
            text-align: left;
            font-weight: 600;
            color: #555;
            border-bottom: 2px solid #e1e5e9;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        
        th:hover {
            background: #e2e8f0;
        }
        
        th.sortable::after {
            content: ' ↕️';
            font-size: 12px;
            opacity: 0.5;
        }
        
        td {
            padding: 12px;
            border-bottom: 1px solid #f1f3f4;
            vertical-align: middle;
        }
        
        .row-confirmada {
            background-color: #f0fff4;
            border-left: 4px solid #48bb78;
        }
        
        .row-pendiente {
            background-color: #fff5f5;
            border-left: 4px solid #f56565;
        }
        
        .status-badge {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            text-align: center;
            display: inline-block;
            min-width: 80px;
        }
        
        .status-confirmada {
            background: #c6f6d5;
            color: #22543d;
        }
        
        .status-pendiente {
            background: #fed7d7;
            color: #742a2a;
        }
        
        .email-cell {
            max-width: 200px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        
        .phone-cell {
            font-family: monospace;
            font-size: 13px;
        }
        
        .date-cell {
            font-size: 13px;
            color: #666;
        }
        
        .id-cell {
            font-weight: bold;
            color: #667eea;
        }
        
        .no-data {
            text-align: center;
            padding: 40px;
            color: #999;
            font-style: italic;
        }
        
        .timezone-info {
            background: #e6fffa;
            border: 1px solid #81e6d9;
            border-radius: 6px;
            padding: 10px;
            margin: 10px 0;
            font-size: 13px;
            color: #234e52;
        }
        
        @media (max-width: 1200px) {
            .container {
                padding: 0 10px;
            }
            
            table {
                font-size: 14px;
            }
            
            th, td {
                padding: 8px 6px;
            }
            
            .email-cell {
                max-width: 150px;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="container">
            <h1>Dashboard de Confirmaciones de Visitas</h1>
            <div class="stats">
                <div class="stat-card">
                    <span class="stat-number">{{ $total_visitas }}</span>
                    <span class="stat-label">Total Visitas</span>
                </div>
                <div class="stat-card">
                    <span class="stat-number">{{ $confirmadas }}</span>
                    <span class="stat-label">Confirmadas</span>
                </div>
                <div class="stat-card">
                    <span class="stat-number">{{ $pendientes }}</span>
                    <span class="stat-label">Pendientes</span>
                </div>
                <div class="stat-card">
                    <span class="stat-number">{{ $confirmadas > 0 ? round(($confirmadas / $total_visitas) * 100, 1) : 0 }}%</span>
                    <span class="stat-label">Tasa Confirmación</span>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="timezone-info">
            <strong>ℹ️ Información:</strong> Todas las fechas y horas se muestran en horario de Madrid/España (Europe/Madrid). 
            Los datos se almacenan en UTC y se convierten automáticamente para mostrar.
        </div>
        
        <div class="controls">
            <form method="GET" action="{{ url()->current() }}" class="filter-group">
                <label for="filtro">Mostrar visitas de:</label>
                <select name="filtro" id="filtro" onchange="this.form.submit()">
                    <option value="12h" {{ $filtro_actual == '12h' ? 'selected' : '' }}>Últimas 12 horas</option>
                    <option value="24h" {{ $filtro_actual == '24h' ? 'selected' : '' }}>Últimas 24 horas</option>
                    <option value="2d" {{ $filtro_actual == '2d' ? 'selected' : '' }}>Últimos 2 días</option>
                    <option value="3d" {{ $filtro_actual == '3d' ? 'selected' : '' }}>Últimos 3 días</option>
                    <option value="1w" {{ $filtro_actual == '1w' ? 'selected' : '' }}>Última semana</option>
                </select>
                
                <label for="orden">Ordenar por ID:</label>
                <select name="orden" id="orden" onchange="this.form.submit()">
                    <option value="desc" {{ $orden_actual == 'desc' ? 'selected' : '' }}>Más recientes primero</option>
                    <option value="asc" {{ $orden_actual == 'asc' ? 'selected' : '' }}>Más antiguos primero</option>
                </select>
                
                <button type="submit" class="btn-refresh">🔄 Actualizar</button>
            </form>
        </div>

        <div class="table-container">
            @if($visitas->count() > 0)
            <table>
                <thead>
                    <tr>
                        <th class="sortable">ID Visita</th>
                        <th>Inmueble ID</th>
                        <th>Nombre y Apellidos</th>
                        <th>Teléfono</th>
                        <th>Email</th>
                        <th>Última Actualización</th>
                        <th>Estado</th>
                        <th>Fecha Confirmación</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($visitas as $visita)
                    <tr class="{{ $visita['confirmacion'] == 1 ? 'row-confirmada' : 'row-pendiente' }}">
                        <td class="id-cell">{{ $visita['id'] }}</td>
                        <td>{{ $visita['inmueble_id'] }}</td>
                        <td>{{ $visita['nombre_completo'] }}</td>
                        <td class="phone-cell">{{ $visita['telefono'] }}</td>
                        <td class="email-cell" title="{{ $visita['email'] }}">{{ $visita['email'] }}</td>
                        <td class="date-cell">{{ $visita['updated_at_madrid'] }}</td>
                        <td>
                            <span class="status-badge {{ $visita['confirmacion'] == 1 ? 'status-confirmada' : 'status-pendiente' }}">
                                {{ $visita['confirmacion'] == 1 ? 'Confirmada' : 'Pendiente' }}
                            </span>
                        </td>
                        <td class="date-cell">
                            {{ $visita['fecha_confirmacion_madrid'] ?? '-' }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <div class="no-data">
                <h3>📋 No hay visitas en el período seleccionado</h3>
                <p>Intenta seleccionar un rango de tiempo más amplio o verifica que haya visitas registradas desde el 1 de julio de 2025.</p>
            </div>
            @endif
        </div>
    </div>

    <script>
        // Auto-refresh cada 30 segundos
        setTimeout(function() {
            location.reload();
        }, 30000);
        
        // Mostrar hora actual de Madrid
        function mostrarHoraMadrid() {
            const ahora = new Date().toLocaleString('es-ES', {
                timeZone: 'Europe/Madrid',
                year: 'numeric',
                month: '2-digit',
                day: '2-digit',
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit'
            });
            console.log('Hora actual Madrid:', ahora);
        }
        
        mostrarHoraMadrid();
        setInterval(mostrarHoraMadrid, 60000); // Cada minuto
    </script>
</body>
</html>