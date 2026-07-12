<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Nuevaconsulta;
use Klaviyo\Klaviyo;
use Illuminate\Support\Facades\Log;

class SyncKlaviyoData1 extends Command
{
    protected $signature = 'sync:klaviyo';
    protected $description = 'Sincroniza datos de nuevaconsulta con Klaviyo';

    public function handle()
    {
        // Log inicio de sincronización
        Log::info('🔄 Iniciando sincronización con Klaviyo');

        $klaviyo = new Klaviyo(config('services.klaviyo.api_key'), null);
        $registrosProcesados = 0;
        $registrosFallidos = 0;

        try {
            NuevaConsulta::where('estado', '!=', 'pagado')
                ->where('procesado', 0)
                ->chunk(100, function ($consultas) use ($klaviyo, &$registrosProcesados, &$registrosFallidos) {
                    // Log inicio de procesamiento de chunk
                    Log::info("📦 Procesando lote de " . count($consultas) . " registros");

                    foreach ($consultas as $consulta) {
                        $customerProperties = [
                            '$email' => $consulta->email,
                            '$first_name' => $consulta->nombre,
                            '$last_name' => $consulta->apellidos,
                            'pais' => $consulta->pais,
                            'otroPais' => $consulta->otroPais,
                            'telefono' => $consulta->telefono,
                            'mesConsulta' => $consulta->mesConsulta,
                            'aceptadas_condiciones' => $consulta->aceptadas_condiciones,
                        ];

                        try {
                            // Log intento de envío
                            Log::info("📤 Intentando enviar datos a Klaviyo - ID: {$consulta->id}, Email: {$consulta->email}");

                            $response = $klaviyo->track(
                                'Nueva Consulta',
                                null,
                                $customerProperties
                            );

                            if ($response === 1) {
                                $registrosProcesados++;
                                $consulta->procesado = 1;
                                $consulta->ultima_sincronizacion = now();
                                $consulta->error_sincronizacion = null;
                                $consulta->save();

                                // Log éxito
                                Log::info("✅ Registro sincronizado exitosamente - ID: {$consulta->id}");
                                $this->info("✓ Registro ID {$consulta->id} sincronizado con éxito.");
                            } else {
                                $registrosFallidos++;
                                $consulta->error_sincronizacion = "Respuesta inválida de Klaviyo";
                                $consulta->save();

                                // Log error de respuesta
                                Log::error("❌ Error en respuesta de Klaviyo - ID: {$consulta->id}, Respuesta inválida");
                                $this->error("✗ Error al sincronizar registro ID {$consulta->id}: Respuesta inválida de Klaviyo");
                            }
                        } catch (\Exception $e) {
                            $registrosFallidos++;
                            $consulta->error_sincronizacion = $e->getMessage();
                            $consulta->save();

                            // Log excepción
                            Log::error("🚨 Excepción al sincronizar - ID: {$consulta->id}, Error: " . $e->getMessage());
                            $this->error("✗ Error al sincronizar registro ID {$consulta->id}: " . $e->getMessage());
                        }
                    }
                });

            // Log resumen final
            Log::info("📊 Resumen de sincronización: Exitosos: $registrosProcesados, Fallidos: $registrosFallidos");

            // Resumen en consola
            $this->info("\nResumen de sincronización:");
            $this->info("✓ Registros procesados exitosamente: " . $registrosProcesados);
            $this->error("✗ Registros fallidos: " . $registrosFallidos);
            $this->info("Sincronización completada.");

        } catch (\Exception $e) {
            // Log error general
            Log::error("💥 Error general en la sincronización: " . $e->getMessage());
            $this->error("Error general: " . $e->getMessage());
        }

        // Log finalización
        Log::info("🏁 Finalización de la sincronización con Klaviyo");
    }
}