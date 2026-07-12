<?php

namespace App\Http\Controllers\Web;

use \App\Solicitud;
use App\Mail\RequestShipped;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;

class SolicitudController extends Controller
{
    public function store(Request $request, $reference)
    {
        auth()->user()->update($request->all());
        $new = Solicitud::create($request->all());
    

        if ($new) {
            $this->ship($new, $reference);

            return response([
                'error' => 0,
                'state' => 'success',
                'message' => 'Solicitud enviada. En breve le atenderemos.' 
            ]);
        }

        return response([
            'error' => 1,
            'state' => 'danger',
            'message' => 'Ha ocurrido un error, intente más tarde.' 
        ]);
    }

    public function ship($request, $id) 
    {
        $detalle = \App\InformeDetalladoCabecera::findOrFail($id);

        if ($detalle) 
        {
            $email = Mail::to(auth()->user()->email);
            if ($detalle->email) {
                $email = $email->cc($detalle->email);
            }
            if ($detalle->email_e) {
                $email = $email->bcc($detalle->email_e);
            }

            $email->send(new RequestShipped($request));
        }
    }
}
