<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\UneteMail;

class UneteController extends Controller
{
    public function index()
    {
        return view('web.unete.index');        
    }

    public function send(Request $request)
    {
        $company = $request->company;
        $address = $request->address;
        $web = $request->web;
        $phone = $request->phone;
        $email = $request->email;
        $name = $request->name;
        $body = $request->body;
        
        $mail_to = explode(",",env('MAIL_TO'));
        $bcc = explode(",",env('MAIL_BCC'));
        
        $subject = "Trabaja con nosotros";
        \Mail::to($mail_to)->bcc($bcc)->send(new UneteMail($body,$subject,$name,$email,$company,$web,$phone,$address));
        if(count(\Mail::failures()) > 0 ) {
            return redirect()->route('unete')->with('error','No se ha podido enviar su mensaje');
        }else{
            return redirect()->route('unete')->with('success','Su mensaje ha sido enviado');
        }

        
    }
}
