<?php

namespace App\Http\Controllers\iamovingtospain;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use Exception;
use App\Nuevaconsulta;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\ConfirmacionConsultaMail;
use App\Mail\NuevaConsultaMail;
use App\Mail\PagoMail;
use App\Mail\PagoCanceladoMail;
use App\Mail\CancelacionConsultaMail;
use Carbon\Carbon;

class PagoController extends Controller
{
    
    
    public function crearSesion(Request $request)
    {

            
        try {
            $request->validate([
                'nombre' => 'required|max:25',
                'apellidos' => 'required|max:55',
                'pais' => 'required|max:50',
                'otroPais' => ['required_if:pais,Otros','max:50'],
                //'telefono' => 'required|max:20',
                'email' => 'required|email|max:125',
                'mesConsulta' => 'required',
                'terminos' => 'required',
            ]);

            $datos = $request->all();

            
            // Almacena la información del cliente
            $nuevaConsulta = new NuevaConsulta();
            $nuevaConsulta->nombre = $request->nombre;
            $nuevaConsulta->apellidos = $request->apellidos;
            $nuevaConsulta->email = $request->email;
            $nuevaConsulta->pais = $request->pais;
            $nuevaConsulta->otroPais = $request->otroPais; // Nuevo campo
            $nuevaConsulta->telefono = $request->telefono;
            $nuevaConsulta->mesConsulta = $request->mesConsulta;
            $nuevaConsulta->aceptadas_condiciones = Carbon::now();
            $nuevaConsulta->estado = 'pendiente';
            $nuevaConsulta->save();
            
            // Enviamos email de notificación interna con los datos de relleno de formulario
            Mail::to(explode(",",env('MAIL_CCO')))->send(new NuevaConsultaMail($nuevaConsulta));
            
            Stripe::setApiKey(env('STRIPE_SECRET'));
    
            $session = Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'eur',
                        'product_data' => [
                            'name' => 'IAMOVING TO SPAIN',
                            'description' => 'Una vez que hayamos recibido el pago de tu consulta entraremos en contacto contigo lo antes posible para concretar día y horario en el mes que tú has establecido.',
                        ],
                        'unit_amount' => 8000,  // 80€ en centavos
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => route('iamovingtospain.pago.exitoso') . '?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => route('iamovingtospain.pago.cancelado') . '?session_id={CHECKOUT_SESSION_ID}',
                'billing_address_collection' => 'auto',
                'shipping_address_collection' => null,
                'customer_email' => $request->email, // Asumiendo que el email viene del formulario
                'locale' => 'es',
                'payment_intent_data' => [
                    'setup_future_usage' => null,
                ],
                'metadata' => [
                    'consulta_id' => $nuevaConsulta->id
                ]
            ]);

            // Actualiza la NuevaConsulta con el ID de la sesión de Stripe
            $nuevaConsulta->stripe_session_id = $session->id;
            $nuevaConsulta->save();
    
            return response()->json(['id' => $session->id]);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


public function pagoExitoso(Request $request)
{
    try {
        Stripe::setApiKey(env('STRIPE_SECRET'));
        $session = Session::retrieve($request->get('session_id'));
        $consultaId = $session->metadata->consulta_id;
        
        $consulta = NuevaConsulta::findOrFail($consultaId);
        $consulta->estado = 'pagado';
        
        // Capturar información adicional de Stripe
        $consulta->stripe_payment_intent = $session->payment_intent;
        $consulta->stripe_payment_status = $session->payment_status;
        $consulta->stripe_amount_total = $session->amount_total;
        $consulta->stripe_currency = $session->currency;
        $consulta->stripe_customer = $session->customer;
        $consulta->stripe_customer_email = $session->customer_details->email;
        $consulta->stripe_customer_name = $session->customer_details->name;
        
        // Si necesitas información del PaymentIntent
        if ($session->payment_intent) {
            $paymentIntent = \Stripe\PaymentIntent::retrieve($session->payment_intent);
            $consulta->stripe_payment_method = $paymentIntent->payment_method;
            $consulta->stripe_payment_method_types = json_encode($paymentIntent->payment_method_types);
            $consulta->stripe_captured_amount = $paymentIntent->amount_received;
        }
        
        $consulta->save();

        // Enviar correo interno
        Mail::to(explode(",",env('MAIL_PUC')))->send(new PagoMail($consulta));

        // Enviar correo al cliente
        Mail::to($consulta->email)->send(new ConfirmacionConsultaMail($consulta));
    
        // Lógica adicional para manejar un pago exitoso
        return view('iamovingtospain.pago.exitoso', ['consulta' => $consulta]);
    } catch (Exception $e) {
        Log::error('Error en pagoExitoso: ' . $e->getMessage());
        return redirect()->route('iamovingtospain.index')->with('error', 'Hubo un problema al procesar su pago. Por favor, contacte con soporte.');
    }
}


public function pagoCancelado(Request $request)
{
    try {
        Stripe::setApiKey(env('STRIPE_SECRET'));
        $session = Session::retrieve($request->get('session_id'));
        $consultaId = $session->metadata->consulta_id;
        
        $consulta = NuevaConsulta::findOrFail($consultaId);
        $consulta->estado = 'cancelado';
        
        // Capturar información adicional de Stripe
        $consulta->stripe_session_id = $session->id;
        $consulta->stripe_payment_status = $session->payment_status;
        $consulta->stripe_amount_total = $session->amount_total;
        $consulta->stripe_currency = $session->currency;
        $consulta->stripe_customer = $session->customer;
        $consulta->stripe_customer_email = $session->customer_details->email ?? null;
        $consulta->stripe_customer_name = $session->customer_details->name ?? null;
        
        // Capturar información sobre el motivo de la cancelación si está disponible
        if ($session->cancel_reason) {
            $consulta->stripe_cancel_reason = $session->cancel_reason;
        }
        
        // Si hay un PaymentIntent asociado, capturar esa información también
        if ($session->payment_intent) {
            $paymentIntent = \Stripe\PaymentIntent::retrieve($session->payment_intent);
            $consulta->stripe_payment_intent = $paymentIntent->id;
            $consulta->stripe_payment_intent_status = $paymentIntent->status;
            $consulta->stripe_last_payment_error = $paymentIntent->last_payment_error ? json_encode($paymentIntent->last_payment_error) : null;
        }
        
        $consulta->save();

        // Enviar correo interno
        Mail::to(explode(",",env('MAIL_CCO')))->send(new PagoCanceladoMail($consulta));

        // Enviar correo al cliente
        Mail::to($consulta->email)->send(new CancelacionConsultaMail($consulta));
    
        // Lógica adicional para manejar un pago cancelado
        return view('iamovingtospain.pago.cancelado', ['consulta' => $consulta]);
    } catch (Exception $e) {
        Log::error('Error en pagoCancelado: ' . $e->getMessage());
        return redirect()->route('iamovingtospain.index')->with('error', 'Hubo un problema al procesar su solicitud. Por favor, inténtelo de nuevo más tarde.');
    }
}    
}