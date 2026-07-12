<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CanalController extends Controller
{
    public function show($id)
    {
        $canales = \App\Barriozona::where('zone_id',$id)->get();
        $foto_portoda = \App\Zone::find($id);	   
        
		return view('web.canal.index', compact('canales','foto_portoda'));
    }
}
