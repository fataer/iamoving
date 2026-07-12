<?php

namespace App\Http\Controllers\iamovingtospain;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use App\Mail\NuevaConsultaMail;
use App\Mail\ConfirmacionConsultaMail;
use App\Nuevaconsulta;
use Carbon\Carbon;

class ConsultaController extends Controller
{
    public function enviar(Request $request)
    {
        try {
            $request->validate([
                'nombre' => 'required|max:25',
                'apellidos' => 'required|max:55',
                'pais' => 'required|max:50',
                'telefono' => 'required|max:20',
                'email' => 'required|email|max:125',
                'mesConsulta' => 'required',
                'terminos' => 'required',
            ]);

            $datos = $request->all();

            // Insertar registro en la base de datos
            $nuevaConsulta = Nuevaconsulta::create([
                'nombre' => $datos['nombre'],
                'apellidos' => $datos['apellidos'],
                'pais' => $datos['pais'],
                'telefono' => $datos['telefono'],
                'email' => $datos['email'],
                'mesConsulta' => $datos['mesConsulta'],
                'aceptadas_condiciones' => Carbon::now(),
            ]);

            // Añadir el ID al array de datos
            $datos['id'] = $nuevaConsulta->id;

            // Enviar email de notificación interna
            Mail::to('benjamindevega@gmail.com')->send(new NuevaConsultaMail($datos));

            // Enviar email de confirmación al usuario
            Mail::to($datos['email'])->send(new ConfirmacionConsultaMail($datos));

            return response()->json(['success' => true, 'message' => 'Su solicitud de consulta ha sido enviada y registrada con éxito.']);
        } catch (\Exception $e) {
            Log::error('Error al procesar la consulta: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Ha ocurrido un error al procesar su solicitud.'], 500);
        }
    }
}