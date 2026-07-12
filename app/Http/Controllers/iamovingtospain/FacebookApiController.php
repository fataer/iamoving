<?php

namespace App\Http\Controllers\iamovingtospain;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;

class FacebookApiController extends Controller
{
    protected $accessToken;
    protected $client;

    public function __construct()
    {
        $this->accessToken = env('FACEBOOK_ACCESS_TOKEN');
        $this->client = new Client([
            'base_uri' => 'https://graph.facebook.com/v18.0/'
        ]);
    }

    public function enviarEvento(Request $request)
    {
        try {
            $response = $this->client->post('events', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->accessToken,
                    'Content-Type' => 'application/json'
                ],
                'json' => $request->all()
            ]);

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}