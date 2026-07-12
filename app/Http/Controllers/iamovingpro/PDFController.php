<?php

namespace App\Http\Controllers\iamovingpro;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade as PDF;

class PDFController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	public function imprimir(){
	$today = Carbon::now()->format('d/m/Y');
	$today_1 = Carbon::now()->format('dmY');
	$nombre = "Mariano";
	//Para mostrar
     //$pdf = \PDF::loadView('pdf', compact('today'));
     //return $pdf->download('ejemplo.pdf');
	    /* $data = PDF::loadView('pdf', compact('today'))
        ->save(storage_path('app/public/') . 'archivo.pdf');*/
		$content = PDF::loadView('pdf', compact(['today','nombre']))->output();

		Storage::disk('public')->put($today_1.'_'.$nombre.'_contrato.pdf', $content);		
	}	
    /// 
}
