<?php

namespace App\Http\Controllers\iamovingtospain;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Aterrizaje;
use Illuminate\Support\Facades\Log;

class AterrizajeController extends Controller
{
    public function store(Request $request)
    {
        try {
            // Log de depuración
            Log::info('Recibida petición de aterrizaje', $request->all());

            // Crear nuevo registro
            $aterrizaje = new Aterrizaje();
            $aterrizaje->utm_source = $request->utm_source;
            $aterrizaje->utm_ad = $request->utm_ad;
            $aterrizaje->utm_placement = $request->utm_placement;
            $aterrizaje->save();

            return response()->json(['success' => true, 'data' => $aterrizaje]);
        } catch (\Exception $e) {
            Log::error('Error al guardar aterrizaje: ' . $e->getMessage());
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }
}