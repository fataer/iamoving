<?php

namespace App\Http\Controllers\iamovingpro;

use DB;
use Illuminate\Http\Request;
use \App\InformeDetalladoCabecera;
use App\Http\Controllers\Controller;
use App\Ciudad;

class DetalleController extends Controller
{
    public function show_ini($id)
    {
        $detalle = InformeDetalladoCabecera::where('id',$id)->where('published',true)->get();

        if ($detalle->count()>0) {
            $detalle = $detalle->first();
            $ciudad = "Madrid";
            if($detalle->ciudad_inmueble){
                $ciudad = Ciudad::find($detalle->ciudad_inmueble)->name;
            }
            
            if(strlen(trim($detalle->estado_inmueble)) > 0 && strtolower(trim($detalle->estado_inmueble)) == 'registro'){
                
                return view('iamovingpro.detalle.registro', compact(['detalle','ciudad']));
                    
            }else{

                $services = \App\Servicio::find([
                    ($detalle->is_sale == 0 ? 1 : 2),
                    3
                ]);
                
                if ($detalle->barrios) {
                    $area = \App\Zone::find($detalle->barrios);
    				if($detalle->hay_transporte>0) {
    					$transportes = \App\InformeDetalladoDetalle::where('fk_id_informe_detallado_cabecera', $id)
    					//$transportes = \App\InformeDetalladoDetalle::where('fk_id_informe_detallado_cabecera','=', 1049)
    											->where('type','=','23')
    																						->where('tipo_transporte','!=','null')
    																						->orderBy('tipo_transporte', 'asc')
                                                ->get();
        
    					return view('iamovingpro.detalle.show', compact(['detalle', 'services', 'area','transportes','ciudad']));
    				}
    				else
    				{
    					return view('iamovingpro.detalle.show', compact(['detalle', 'services', 'area','ciudad']));
    				}
    			}
    			else
    			{
    				if($detalle->hay_transporte>0) {
    			   $transportes = \App\InformeDetalladoDetalle::where('fk_id_informe_detallado_cabecera', $id)
    				//$transportes = \App\InformeDetalladoDetalle::where('fk_id_informe_detallado_cabecera','=', 1049)
    											->where('type','=','23')
    																						->where('tipo_transporte','!=','null')
    																						->orderBy('tipo_transporte', 'asc')
    											->get();
    	
    					return view('iamovingpro.detalle.show', compact(['detalle', 'services', 'transportes','ciudad']));
    				}
    				
    			}
    			
    			if($detalle->hay_transporte>0) {
                    $transportes = \App\InformeDetalladoDetalle::where('fk_id_informe_detallado_cabecera', $id)
    			    //$transportes = \App\InformeDetalladoDetalle::where('fk_id_informe_detallado_cabecera','=', 1049)
    											->where('type','=','23')
    																						->where('tipo_transporte','!=','null')
    																						->orderBy('tipo_transporte', 'asc')
                                                ->get();

					return view('iamovingpro.detalle.show', compact(['detalle', 'services','transportes','ciudad']));

                }
				return view('iamovingpro.detalle.show', compact(['detalle', 'services','ciudad']));
            }
        }

        abort(404);
//	return redirect('/');
    }	
	
    public function show($id,$lan)
    {
        $detalle = InformeDetalladoCabecera::where('id',$id)->where('published',true)->get();

        if ($detalle->count()>0) {
            $detalle = $detalle->first();
            $ciudad = "Madrid";
            if($detalle->ciudad_inmueble){
                $ciudad = Ciudad::find($detalle->ciudad_inmueble)->name;
            }
            
            if(strlen(trim($detalle->estado_inmueble)) > 0 && strtolower(trim($detalle->estado_inmueble)) == 'registro'){
				if ($lan=='en'){
					return view('iamovingpro.detalle.en.registro', compact(['detalle','ciudad']));
				}
				else
				{                
					return view('iamovingpro.detalle.registro', compact(['detalle','ciudad']));
				}
                    
            }else{

                $services = \App\Servicio::find([
                    ($detalle->is_sale == 0 ? 1 : 2),
                    3
                ]);
                
                if ($detalle->barrios) {
                    $area = \App\Zone::find($detalle->barrios);
    				if($detalle->hay_transporte>0) {
    					$transportes = \App\InformeDetalladoDetalle::where('fk_id_informe_detallado_cabecera', $id)
    					//$transportes = \App\InformeDetalladoDetalle::where('fk_id_informe_detallado_cabecera','=', 1049)
    											->where('type','=','23')
    																						->where('tipo_transporte','!=','null')
    																						->orderBy('tipo_transporte', 'asc')
                                                ->get();
						if ($lan=='en'){
							return view('iamovingpro.detalle.en.show-en', compact(['detalle', 'services', 'area','transportes','ciudad']));
						}
						else
						{         
							return view('iamovingpro.detalle.show', compact(['detalle', 'services', 'area','transportes','ciudad']));
						}
    				}
    				else
    				{
						if ($lan=='en'){
							return view('iamovingpro.detalle.en.show-en', compact(['detalle', 'services', 'area','ciudad']));
						}
						else
						{     						
							return view('iamovingpro.detalle.show', compact(['detalle', 'services', 'area','ciudad']));
						}
    				}
    			}
    			else
    			{
    				if($detalle->hay_transporte>0) {
    			   $transportes = \App\InformeDetalladoDetalle::where('fk_id_informe_detallado_cabecera', $id)
    				//$transportes = \App\InformeDetalladoDetalle::where('fk_id_informe_detallado_cabecera','=', 1049)
    											->where('type','=','23')
    																						->where('tipo_transporte','!=','null')
    																						->orderBy('tipo_transporte', 'asc')
    											->get();
						if ($lan=='en'){
							return view('iamovingpro.detalle.en.show-en', compact(['detalle', 'services', 'transportes','ciudad']));
						}
						else
						{ 												
							return view('iamovingpro.detalle.show', compact(['detalle', 'services', 'transportes','ciudad']));
						}
    				}
    				
    			}
    			
    			if($detalle->hay_transporte>0) {
                    $transportes = \App\InformeDetalladoDetalle::where('fk_id_informe_detallado_cabecera', $id)
    			    //$transportes = \App\InformeDetalladoDetalle::where('fk_id_informe_detallado_cabecera','=', 1049)
    											->where('type','=','23')
    																						->where('tipo_transporte','!=','null')
    																						->orderBy('tipo_transporte', 'asc')
                                                ->get();
        
                    if ($lan=='en'){
						return view('iamovingpro.detalle.en.show-en', compact(['detalle', 'services','transportes','ciudad']));
					}
					else
					{
						return view('iamovingpro.detalle.show', compact(['detalle', 'services','transportes','ciudad']));
					}
					
                }
                if ($lan=='en'){
                return view('iamovingpro.detalle.en.show-en', compact(['detalle', 'services','ciudad']));
				}
				else
				{
					return view('iamovingpro.detalle.show', compact(['detalle', 'services','ciudad']));
				}
            }
        }

        abort(404);
//	return redirect('/');
    }

    public function getDetails(Request $request, $id)
    {
        $data = \App\InformeDetalladoDetalle::with(['multimedia', 'cabecera'])
                                            ->where('fk_id_informe_detallado_cabecera', $id)
												->where('type','<','23')												
                                            ->get();

        return response()->json($data);
    }

    public function getDetailsLugar(Request $request, $id)
    {
        $data = \App\InformeDetalladoDetalle::with(['multimedia', 'cabecera'])
                                            ->where('fk_id_informe_detallado_cabecera', $id)
												->where('type','24')
                                            ->get();

        return response()->json($data);
    }	
}
