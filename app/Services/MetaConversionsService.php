<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class MetaConversionsService
{
    protected $pixelId;
    protected $accessToken;
    protected $apiUrl;

    public function __construct()
    {
        $this->pixelId = env('META_PIXEL_ID');
        $this->accessToken = env('META_ACCESS_TOKEN');
        $this->apiUrl = "https://graph.facebook.com/v19.0/{$this->pixelId}/events";
    }

    /**
     * Enviar evento Lead a Meta Conversions API
     * SIN EMAIL (decisión de marketing)
     * 
     * @param string $phone Teléfono del usuario
     * @param string $name Nombre completo del usuario
     * @param string $clientIp IP del cliente
     * @param string $userAgent User Agent del navegador
     * @param string|null $fbp Cookie _fbp del navegador
     * @param string|null $fbclid Facebook Click ID (parámetro fbclid en URL)
     * @param string|null $eventId ID único del evento (para deduplicación)
     * @param string|null $sourceUrl URL de la página donde ocurrió el evento
     */
    public function sendLead(
        $phone, 
        $name, 
        $clientIp,
        $userAgent,
        $fbp = null,
        $fbclid = null,
        $eventId = null,
        $sourceUrl = null
    ) {
        // Preparar datos del usuario (TODOS hasheados con SHA256 excepto IP y User Agent)
        $userData = [];

        // Teléfono (CRÍTICO - formato E.164: +34XXXXXXXXX)
        if ($phone) {
            $phoneClean = $this->normalizePhone($phone);
            $userData['ph'] = [hash('sha256', $phoneClean)];
        }

        // Nombre (separar en first_name y last_name)
        if ($name) {
            $nameParts = $this->splitName($name);
            if ($nameParts['first_name']) {
                $userData['fn'] = [hash('sha256', $nameParts['first_name'])];
            }
            if ($nameParts['last_name']) {
                $userData['ln'] = [hash('sha256', $nameParts['last_name'])];
            }
        }

        // IP del cliente (SIN hashear - CRÍTICO)
        if ($clientIp) {
            $userData['client_ip_address'] = $clientIp;
        }

        // User Agent (SIN hashear - CRÍTICO)
        if ($userAgent) {
            $userData['client_user_agent'] = $userAgent;
        }

        // Cookie _fbp (SIN hashear - CRÍTICO para matching)
        if ($fbp) {
            $userData['fbp'] = $fbp;
        }

        // Facebook Click ID - formato: fb.1.timestamp.fbclid
        if ($fbclid) {
            $userData['fbc'] = 'fb.1.' . time() . '.' . $fbclid;
        }

        // País (España)
        $userData['country'] = [hash('sha256', 'es')];

        // Ciudad genérica (Madrid - mejora matching)
        $userData['ct'] = [hash('sha256', 'madrid')];

        // Generar event_id si no se proporcionó
        if (!$eventId) {
            $eventId = 'lead_' . time() . '_' . uniqid();
        }

        // Construir payload
        $payload = [
            'data' => [
                [
                    'event_name'       => 'Lead',
                    'event_time'       => time(),
                    'event_id'         => $eventId, // ✅ CRÍTICO para deduplicación
                    'action_source'    => 'website',
                    'event_source_url' => $sourceUrl ?? 'https://iamoving.com/vender',
                    'user_data'        => $userData,
                ]
            ],
            'test_event_code' => env('META_TEST_EVENT_CODE', null) // Para testing
        ];

        try {
            $client = new Client();
            $response = $client->post($this->apiUrl, [
                'query' => ['access_token' => $this->accessToken],
                'json'  => $payload,
                'headers' => [
                    'Content-Type' => 'application/json',
                ]
            ]);

            $result = json_decode($response->getBody(), true);
            
            Log::info('Meta CAPI Lead enviado correctamente', [
                'event_id' => $eventId,
                'events_received' => $result['events_received'] ?? 0,
                'phone' => substr($phone, 0, 3) . 'XXX', // Log parcial por privacidad
                'match_quality_score' => 'Estimado: 6.0-7.5 (sin email)',
            ]);

            return true;

        } catch (\Exception $e) {
            Log::error('Meta CAPI error al enviar Lead', [
                'error' => $e->getMessage(),
                'phone' => substr($phone ?? '', 0, 3) . 'XXX',
            ]);
            
            return false;
        }
    }

    /**
     * Normalizar teléfono a formato E.164 (+34XXXXXXXXX)
     */
    protected function normalizePhone($phone)
    {
        // Eliminar espacios, guiones, paréntesis
        $phone = preg_replace('/[^0-9+]/', '', $phone);
        
        // Si no empieza con +, añadir +34 (España)
        if (substr($phone, 0, 1) !== '+') {
            $phone = '+34' . ltrim($phone, '0');
        }
        
        return $phone;
    }

    /**
     * Separar nombre completo en first_name y last_name
     */
    protected function splitName($fullName)
    {
        $parts = explode(' ', trim($fullName));
        
        return [
            'first_name' => strtolower($parts[0] ?? ''),
            'last_name' => strtolower(implode(' ', array_slice($parts, 1)) ?? '')
        ];
    }
}