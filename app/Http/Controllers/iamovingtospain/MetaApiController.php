<?php

namespace App\Http\Controllers\iamovingtospain;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class MetaApiController extends Controller
{
    protected $accessToken;
    protected $client;

    public function __construct()
    {
        $this->accessToken = env('FACEBOOK_ACCESS_TOKEN');
        $this->client = new Client([
            'base_uri' => 'https://graph.facebook.com/v18.0/',
        ]);
    }

    public function enviarEvento(Request $request)
    {
        try {
            $response = $this->client->post('events', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->accessToken,
                    'Content-Type' => 'application/json',
                ],
                'json' => $request->all()
            ]);

            return response()->json([
                'success' => true,
                'data' => json_decode($response->getBody())
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }
}