<?php

namespace App\Http\Controllers\Web;

use DB;
use Illuminate\Http\Request;
use \App\InformeDetalladoCabecera;
use App\Http\Controllers\Controller;

class NovideoController extends Controller
{
    public function show($id)
    {
        $detalle = InformeDetalladoCabecera::where('id',$id)->where('published',true)->get();

        if ($detalle->count()>0) {
            $detalle = $detalle->first();

            $services = \App\Servicio::find([
                ($detalle->is_sale == 0 ? 1 : 2),
                3
            ]);
            
            if ($detalle->barrios) {
                $area = \App\Zone::find($detalle->barrios);
    
                return view('web.detalle.novideo', compact(['detalle', 'services', 'area']));
            }
            
            return view('web.detalle.novideo', compact(['detalle', 'services']));
        }

        abort(404);
//	return redirect('/');
    }

    public function getDetails(Request $request, $id)
    {
        $data = \App\InformeDetalladoDetalle::with(['multimedia', 'cabecera'])
                                            ->where('fk_id_informe_detallado_cabecera', $id)
                                            ->get();

        return response()->json($data);
    }
}
