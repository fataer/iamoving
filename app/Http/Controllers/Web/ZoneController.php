<?php

namespace App\Http\Controllers\Web;

use \App\Zone;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ZoneController extends Controller
{
    public function index()
    {
        $areas = Zone::latest()->paginate(8);

        $zones = \App\Zone::all();

        return view('web.barrios.index', compact('areas','zones'));
    }

    public function show($id)
    {
        $zone = Zone::find($id);

		return view('web.barrios.show',compact('zone'));
    }
}
