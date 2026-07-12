<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Visitas;
use App\Users_unregistered;
use App\User;
use App\InformeDetalladoCabecera;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Mostrar dashboard de visitas con confirmaciones
     */
    public function visitasConfirmacion(Request $request)
    {
        \Log::info('=== DASHBOARD DEBUG ===');
        
        // Obtener filtro de tiempo (por defecto 24 horas)
        $filtro = $request->get('filtro', '24h');
        $orden = $request->get('orden', 'desc'); // desc = más recientes primero
        
        \Log::info('Filtro: ' . $filtro);
        \Log::info('Orden: ' . $orden);
        
        // Calcular fecha de inicio según filtro (siempre en UTC para consulta)
        $fechaInicio = $this->calcularFechaInicio($filtro);
        
        \Log::info('Fecha inicio calculada: ' . $fechaInicio);
        
        // Fecha límite: 1 de julio 2025 UTC (usando DateTime nativo)
        $fechaLimite = '2025-07-01 00:00:00';
        
        // Si la fecha de inicio es anterior al límite, usar el límite
        if ($fechaInicio < $fechaLimite) {
            $fechaInicio = $fechaLimite;
            \Log::info('Fecha ajustada al límite: ' . $fechaInicio);
        }
        
        // Consultar visitas
        $query = Visitas::where('created_at', '>=', $fechaInicio)
            ->orderBy('id', $orden);
        
        $visitas = $query->get();
        
        \Log::info('Visitas encontradas: ' . $visitas->count());
        
        // Procesar datos para la vista
        $visitasProcessed = $this->procesarVisitas($visitas);
        
        return view('adm.dashboard_visitas_confirmacion', [
            'visitas' => $visitasProcessed,
            'filtro_actual' => $filtro,
            'orden_actual' => $orden,
            'total_visitas' => $visitas->count(),
            'confirmadas' => $visitas->where('confirmacion', 1)->count(),
            'pendientes' => $visitas->where('confirmacion', 0)->count()
        ]);
    }
    
    /**
     * Calcular fecha de inicio según filtro (DateTime nativo - máxima compatibilidad)
     */
    private function calcularFechaInicio($filtro)
    {
        \Log::info('=== CALCULANDO FECHA INICIO ===');
        \Log::info('Filtro recibido: ' . $filtro);
        
        try {
            // Usar DateTime nativo en lugar de Carbon
            $ahora = new \DateTime('now', new \DateTimeZone('Europe/Madrid'));
            \Log::info('Fecha actual Madrid: ' . $ahora->format('Y-m-d H:i:s'));
            
            // Aplicar filtro
            switch ($filtro) {
                case '12h':
                    $ahora->sub(new \DateInterval('PT12H'));
                    break;
                case '24h':
                    $ahora->sub(new \DateInterval('PT24H'));
                    break;
                case '2d':
                    $ahora->sub(new \DateInterval('P2D'));
                    break;
                case '3d':
                    $ahora->sub(new \DateInterval('P3D'));
                    break;
                case '1w':
                    $ahora->sub(new \DateInterval('P1W'));
                    break;
                default:
                    $ahora->sub(new \DateInterval('PT24H'));
                    break;
            }
            
            \Log::info('Fecha después del filtro Madrid: ' . $ahora->format('Y-m-d H:i:s'));
            
            // Convertir a UTC para consulta en base de datos
            $ahora->setTimezone(new \DateTimeZone('UTC'));
            
            $resultado = $ahora->format('Y-m-d H:i:s');
            \Log::info('Fecha final UTC: ' . $resultado);
            
            return $resultado;
            
        } catch (\Exception $e) {
            \Log::error('Error calculando fecha inicio: ' . $e->getMessage());
            // Retornar fecha por defecto en caso de error
            return '2025-07-01 00:00:00';
        }
    }
    
    /**
     * Procesar visitas para mostrar en la vista (Evitando mutadores de Laravel)
     */
    private function procesarVisitas($visitas)
    {
        return $visitas->map(function ($visita) {
            \Log::info('Procesando visita ID: ' . $visita->id);
            
            // Obtener datos del usuario (registrado o no registrado)
            if ($visita->user_nonominado) {
                $user = Users_unregistered::find($visita->user_nonominado);
            } else {
                $user = User::find($visita->user_id);
            }
            
            // Obtener datos del inmueble
            $inmueble = InformeDetalladoCabecera::find($visita->inmueble_id);
            
            // Función para convertir fechas de forma ultra-simple
            $convertirFecha = function($fecha_string, $campo_nombre) {
                if (!$fecha_string) {
                    \Log::info($campo_nombre . ': campo vacío');
                    return null;
                }
                
                \Log::info($campo_nombre . ' original: ' . $fecha_string);
                
                try {
                    // Método 1: Usar strtotime + date (más compatible)
                    $timestamp = strtotime($fecha_string);
                    if ($timestamp !== false) {
                        // Ajustar a Madrid (UTC+1 en invierno, UTC+2 en verano)
                        // Para simplificar, asumimos UTC+2 (horario de verano)
                        $timestamp_madrid = $timestamp + (2 * 3600);
                        $resultado = date('d/m/Y H:i:s', $timestamp_madrid);
                        \Log::info($campo_nombre . ' convertido: ' . $resultado);
                        return $resultado;
                    }
                } catch (\Exception $e) {
                    \Log::error($campo_nombre . ' error método 1: ' . $e->getMessage());
                }
                
                try {
                    // Método 2: Extraer solo la parte de fecha/hora sin microsegundos
                    $fecha_limpia = substr($fecha_string, 0, 19); // YYYY-MM-DD HH:MM:SS
                    $timestamp = strtotime($fecha_limpia);
                    if ($timestamp !== false) {
                        $timestamp_madrid = $timestamp + (2 * 3600);
                        $resultado = date('d/m/Y H:i:s', $timestamp_madrid);
                        \Log::info($campo_nombre . ' convertido método 2: ' . $resultado);
                        return $resultado;
                    }
                } catch (\Exception $e) {
                    \Log::error($campo_nombre . ' error método 2: ' . $e->getMessage());
                }
                
                \Log::error($campo_nombre . ': no se pudo convertir');
                return 'Fecha no válida';
            };
            
            // Acceder a los datos de forma directa para evitar mutadores de Laravel
            $updated_at_raw = $visita->getAttributes()['updated_at'] ?? null;
            $confirmacion_raw = $visita->getAttributes()['fecha_confirmacion'] ?? null;
            $created_at_raw = $visita->getAttributes()['created_at'] ?? null;
            
            \Log::info('Fechas raw obtenidas, procesando...');
            
            $updated_at_madrid = $convertirFecha($updated_at_raw, 'updated_at');
            \Log::info('updated_at procesado, continuando con confirmacion...');
            
            $confirmacion_madrid = $convertirFecha($confirmacion_raw, 'fecha_confirmacion');
            \Log::info('confirmacion procesado, continuando con created_at...');
            
            $created_at_madrid = $convertirFecha($created_at_raw, 'created_at');
            \Log::info('created_at procesado, creando resultado...');
            
            $resultado = [
                'id' => $visita->id,
                'inmueble_id' => $visita->inmueble_id,
                'nombre_completo' => $user ? trim($user->name . ' ' . $user->lastname) : 'Usuario no encontrado',
                'telefono' => $user ? $user->phone : '-',
                'email' => $user ? $user->email : '-',
                'updated_at_madrid' => $updated_at_madrid,
                'confirmacion' => $visita->getAttributes()['confirmacion'] ?? 0, // También usar getAttributes para este
                'fecha_confirmacion_madrid' => $confirmacion_madrid,
                'inmueble_direccion' => $inmueble ? $inmueble->road : 'Inmueble no encontrado',
                'created_at_madrid' => $created_at_madrid
            ];
            
            \Log::info('Visita procesada correctamente: ' . $visita->id);
            return $resultado;
        });
    }
}