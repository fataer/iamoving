<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Nuevaconsulta;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class SyncKlaviyoData extends Command
{
    protected $signature = 'sync:klaviyo';
    protected $description = 'Sincroniza datos de nuevaconsulta con Klaviyo';

    protected $klaviyoApiUrl = 'https://a.klaviyo.com/api/track';
    protected $client;

    public function __construct()
    {
        parent::__construct();
        $this->client = new Client();
    }

    public function handle()
    {
        Log::info('🔄 Iniciando sincronización con Klaviyo');

        $registrosProcesados = 0;
        $registrosFallidos = 0;

        try {
            NuevaConsulta::where('estado', '!=', 'pagado')
                ->where('procesado', 0)
                ->chunk(100, function ($consultas) use (&$registrosProcesados, &$registrosFallidos) {
                    Log::info("📦 Procesando lote de " . count($consultas) . " registros");

                    foreach ($consultas as $consulta) {
                        try {
                            Log::info("📤 Intentando enviar datos a Klaviyo - ID: {$consulta->id}, Email: {$consulta->email}");

                            $data = [
                                'token' => config('services.klaviyo.public_key'),
                                'event' => 'Nueva Consulta',
                                'customer_properties' => [
                                    '$email' => $consulta->email,
                                    '$first_name' => $consulta->nombre,
                                    '$last_name' => $consulta->apellidos,
                                    'pais' => $consulta->pais,
                                    'otroPais' => $consulta->otroPais,
                                    'telefono' => $consulta->telefono,
                                    'mesConsulta' => $consulta->mesConsulta,
                                    'aceptadas_condiciones' => $consulta->aceptadas_condiciones,
                                ],
                                'properties' => [
                                    'estado' => $consulta->estado,
                                    'fecha_consulta' => $consulta->created_at->format('Y-m-d H:i:s')
                                ],
                                'time' => time()
                            ];

                            // Convertir a base64 y enviar como parámetro de consulta
                            $encodedData = base64_encode(json_encode($data));
                            
                            $response = $this->client->request('GET', $this->klaviyoApiUrl, [
                                'query' => ['data' => $encodedData],
                                'timeout' => 30,
                            ]);

                            if ($response->getStatusCode() === 200 && (string)$response->getBody() === '1') {
                                $registrosProcesados++;
                                $consulta->procesado = 1;
                                $consulta->updated_at = now();
                                $consulta->error_sincronizacion = null;
                                $consulta->save();

                                Log::info("✅ Registro sincronizado exitosamente - ID: {$consulta->id}");
                                $this->info("✓ Registro ID {$consulta->id} sincronizado con éxito.");
                            } else {
                                throw new \Exception("Respuesta inválida de Klaviyo: " . (string)$response->getBody());
                            }
                        } catch (\Exception $e) {
                            $registrosFallidos++;
                            $consulta->error_sincronizacion = $e->getMessage();
                            $consulta->save();

                            Log::error("🚨 Excepción al sincronizar - ID: {$consulta->id}, Error: " . $e->getMessage());
                            $this->error("✗ Error al sincronizar registro ID {$consulta->id}: " . $e->getMessage());
                        }

                        // Pequeña pausa para no sobrecargar la API
                        usleep(100000); // 100ms de pausa entre peticiones
                    }
                });

            Log::info("📊 Resumen de sincronización: Exitosos: $registrosProcesados, Fallidos: $registrosFallidos");

            $this->info("\nResumen de sincronización:");
            $this->info("✓ Registros procesados exitosamente: " . $registrosProcesados);
            $this->error("✗ Registros fallidos: " . $registrosFallidos);
            $this->info("Sincronización completada.");

        } catch (\Exception $e) {
            Log::error("💥 Error general en la sincronización: " . $e->getMessage());
            $this->error("Error general: " . $e->getMessage());
        }

        Log::info("🏁 Finalización de la sincronización con Klaviyo");
    }
}