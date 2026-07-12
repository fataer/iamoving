<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Multimedia;

class MultimediaController extends Controller
{
    /**
     * Obtiene las imágenes asociadas a un informe detallado
     *
     * @param  int  $informeId
     * @return \Illuminate\Http\Response
     */
    public function getMediaByInforme($informeId)
    {
        $multimedia = Multimedia::where('fk_id_informe_detallado_cabecera', $informeId)->get();
        
        return response()->json($multimedia);
    }
}