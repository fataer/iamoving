<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
use ReCaptcha\ReCaptcha;

class ContactanosController extends Controller
{
    public function index()
    {
        return view('web.contacto.index');        
    }

    public function send(Request $request)
    {
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'subject' => 'required|string|max:255',
        'body' => 'required|string',
        'conditions' => 'required|accepted',
        'g-recaptcha-response' => 'required',
    ]);

    $recaptcha = new ReCaptcha(env('RECAPTCHA_SECRET_KEY'));
    $resp = $recaptcha->verify($request->input('g-recaptcha-response'), $request->ip());

    if (!$resp->isSuccess()) {
        return redirect()->route('contactanos')->with('error', 'Verificación de reCAPTCHA fallida. Por favor, inténtelo de nuevo.');
    }

        $body = $request->body;
        $email = $request->email;
        $name = $request->name;
        $subject = "IAMOVING CONTÁCTANOS-".$request->subject;

        $mail_to = explode(",",env('MAIL_TO'));
        $bcc = explode(",",env('MAIL_CCO'));

        try {
            Mail::to($mail_to)->bcc($bcc)->send(new ContactMail($body, $subject, $name, $email));
            return redirect()->route('contactanos')->with('success', 'Su mensaje ha sido enviado');
        } catch (\Exception $e) {
            if(count(\Mail::failures()) > 0 ) {
                \Log::error('Error al enviar correo: ' . json_encode(\Mail::failures()));
                return redirect()->route('contactanos')->with('error','Hubo un problema al enviar su mensaje. Por favor, inténtelo de nuevo más tarde.');
            }
        }
    }
}
