<?php

namespace App\Http\Controllers\iamovingpro;

use DB;
use Illuminate\Http\Request;
use \App\InformeDetalladoCabecera;
use App\Http\Controllers\Controller;
use App\Ciudad;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade as PDF;
use App\Oferta;
use App\Mail\OfertaPropietarioMail;
use App\Mail\OfertaArrendatarioMail;
use App\Mail\OfertaAdjuntosMail;

class OfertaController extends Controller
{
    public function show_ini($id)
    {
        Session::put('oferta_url', request()->fullUrl());
		$detalle = InformeDetalladoCabecera::where('id',$id)->where('published',true)->get();

        if ($detalle->count()>0) {
            $detalle = $detalle->first();
            $ciudad = "Madrid";
            if($detalle->ciudad_inmueble){
                $ciudad = Ciudad::find($detalle->ciudad_inmueble)->name;
            }
            
            if(strlen(trim($detalle->estado_inmueble)) > 0 && strtolower(trim($detalle->estado_inmueble)) == 'registro'){
                
                return view('iamovingpro.oferta.registro', compact(['detalle','ciudad']));
                    
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
        
    					return view('iamovingpro.oferta.show', compact(['detalle', 'services', 'area','transportes','ciudad']));
    				}
    				else
    				{
    					return view('iamovingpro.oferta.show', compact(['detalle', 'services', 'area','ciudad']));
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
    	
    					return view('iamovingpro.oferta.show', compact(['detalle', 'services', 'transportes','ciudad']));
    				}
    				
    			}
    			
    			if($detalle->hay_transporte>0) {
                    $transportes = \App\InformeDetalladoDetalle::where('fk_id_informe_detallado_cabecera', $id)
    			    //$transportes = \App\InformeDetalladoDetalle::where('fk_id_informe_detallado_cabecera','=', 1049)
    											->where('type','=','23')
    																						->where('tipo_transporte','!=','null')
    																						->orderBy('tipo_transporte', 'asc')
                                                ->get();

					return view('iamovingpro.oferta.show', compact(['detalle', 'services','transportes','ciudad']));

                }
				return view('iamovingpro.oferta.show', compact(['detalle', 'services','ciudad']));
            }
        }

        abort(404);
//	return redirect('/');
    }	

    public function send(Request $request){
		//HAY QUE MULTIPLICAR LA FIANZA POR LA Oferta
		//CALCULAR EL IVA DE LA OFERTA TAMBIÉN
		//FALTA LA REFERENCIA
		//FALTAN ESTOS DOS CAMPOS
		$inmueble_id = $request->referencia;
		$email = $request->email;
        $name = $request->name;
		$name2 = $request->name2;
		$name3 = $request->name3;
		$name4 = $request->name4;
		$name5 = $request->name5;
		$id = $request->referencia;
		$numero_arrendatarios = $request->numero_arrendatarios;
		$avalistas = $request->avalistas;
		//$fecha_entrada = str_replace("/20", "/", $request->date);
		$fecha_entrada = str_replace("/", "-", $request->date);
		$importe =  $request->importe;
		$fianza =$request->fianza;
		$email_propietario=$request->email_e;	
		$iva=21;
		$nombre_calle =$request->road;
		$numero_calle = $request->numero_direccion;
		$piso_calle =$request->number_apartment;
		$ciudad=$request->ciudad;
		$codigo_postal=$request->codigo_postal;
		
		$dni = $request->nif;
		$dni2 = $request->nif2;
		$dni3 = $request->nif3;
		$dni4 = $request->nif4;
		$dni5 = $request->nif5;
		//MODULO DE IDENTIFICACION DE DOCUMENTO ACREDITATIVO
		$idDoc="documento";
		 if (isset($dni)) {
			if ( substr(strtoupper($dni), 0, 1)=="X" or substr(strtoupper($dni), 0, 1)=="Y"){
				$idDoc="NIE";
			}
			elseif ( substr(strtoupper($dni), 0, 1)=="0" or substr(strtoupper($dni), 0, 1)=="1" or substr(strtoupper($dni), 0, 1)=="2" or substr(strtoupper($dni), 0, 1)=="3" or substr(strtoupper($dni), 0, 1)=="4" or substr(strtoupper($dni), 0, 1)=="5" or substr(strtoupper($dni), 0, 1)=="6" or substr(strtoupper($dni), 0, 1)=="7" or substr(strtoupper($dni), 0, 1)=="8"  or substr(strtoupper($dni), 0, 1)=="9"){
				$idDoc="DNI";
			}
		}
		
		$idDoc2="documento";
		 if (isset($dni2)) {
			if ( substr(strtoupper($dni2), 0, 1)=="X" or substr(strtoupper($dni2), 0, 1)=="Y"){
				$idDoc2="NIE";
			}
			elseif ( substr(strtoupper($dni2), 0, 1)=="0" or substr(strtoupper($dni2), 0, 1)=="1" or substr(strtoupper($dni2), 0, 1)=="2" or substr(strtoupper($dni2), 0, 1)=="3" or substr(strtoupper($dni2), 0, 1)=="4" or substr(strtoupper($dni2), 0, 1)=="5" or substr(strtoupper($dni2), 0, 1)=="6" or substr(strtoupper($dni2), 0, 1)=="7" or substr(strtoupper($dni2), 0, 1)=="8"  or substr(strtoupper($dni2), 0, 1)=="9"){
				$idDoc2="DNI";
			}
		}
		
		$idDoc3="documento";
		 if (isset($dni3)) {
			if ( substr(strtoupper($dni3), 0, 1)=="X" or substr(strtoupper($dni3), 0, 1)=="Y"){
				$idDoc3="NIE";
			}
			elseif ( substr(strtoupper($dni3), 0, 1)=="0" or substr(strtoupper($dni3), 0, 1)=="1" or substr(strtoupper($dni3), 0, 1)=="2" or substr(strtoupper($dni3), 0, 1)=="3" or substr(strtoupper($dni3), 0, 1)=="4" or substr(strtoupper($dni3), 0, 1)=="5" or substr(strtoupper($dni3), 0, 1)=="6" or substr(strtoupper($dni3), 0, 1)=="7" or substr(strtoupper($dni3), 0, 1)=="8"  or substr(strtoupper($dni3), 0, 1)=="9"){
				$idDoc3="DNI";
			}
		}

		$idDoc4="documento";
		 if (isset($dni4)) {
			if ( substr(strtoupper($dni4), 0, 1)=="X" or substr(strtoupper($dni4), 0, 1)=="Y"){
				$idDoc4="NIE";
			}
			elseif ( substr(strtoupper($dni4), 0, 1)=="0" or substr(strtoupper($dni4), 0, 1)=="1" or substr(strtoupper($dni4), 0, 1)=="2" or substr(strtoupper($dni4), 0, 1)=="3" or substr(strtoupper($dni4), 0, 1)=="4" or substr(strtoupper($dni4), 0, 1)=="5" or substr(strtoupper($dni4), 0, 1)=="6" or substr(strtoupper($dni4), 0, 1)=="7" or substr(strtoupper($dni4), 0, 1)=="8"  or substr(strtoupper($dni4), 0, 1)=="9"){
				$idDoc4="DNI";
			}
		}

		$idDoc5="documento";
		 if (isset($dni5)) {
			if ( substr(strtoupper($dni5), 0, 1)=="X" or substr(strtoupper($dni5), 0, 1)=="Y"){
				$idDoc5="NIE";
			}
			elseif ( substr(strtoupper($dni5), 0, 1)=="0" or substr(strtoupper($dni5), 0, 1)=="1" or substr(strtoupper($dni5), 0, 1)=="2" or substr(strtoupper($dni5), 0, 1)=="3" or substr(strtoupper($dni5), 0, 1)=="4" or substr(strtoupper($dni5), 0, 1)=="5" or substr(strtoupper($dni5), 0, 1)=="6" or substr(strtoupper($dni5), 0, 1)=="7" or substr(strtoupper($dni5), 0, 1)=="8"  or substr(strtoupper($dni5), 0, 1)=="9"){
				$idDoc5="DNI";
			}
		}		
		//MODULO DE IDENTIFICACION DE DOCUMENTO ACREDITATIVO
		$today_1 = Carbon::now()->format('d-m-Y');
		$num = date("d", strtotime($today_1));
		$anno = date("Y", strtotime($today_1));
		$num_entrada = date("d", strtotime($fecha_entrada));
		$anno_entrada = date("Y", strtotime($fecha_entrada));
		$mes = array('enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre');
		$mes = $mes[(date('m', strtotime($today_1)) * 1) - 1];
		$mes_entrada = array('enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre');
		$mes_entrada = $mes_entrada[(date('m', strtotime($fecha_entrada)) * 1) - 1];		
		$fecha_letra= $num . ' de ' . $mes . ' del ' . $anno;
		$fecha_entrada_letra= $num_entrada . ' de ' . $mes_entrada . ' del ' . $anno_entrada;
		$path_contrato = $today_1.'_'.$name.'_oferta_ref_'.$id.'.pdf';
				
        	
		//Grabar
		    $oferta = new Oferta();
			$oferta->inmueble_id = $inmueble_id;
			$oferta->email = $email;
			$oferta->name = $name;
			$oferta->name2 = $name2;
			$oferta->name3 = $name4;
			$oferta->name4 = $name4;
			$oferta->name5 = $name5;
			
			$oferta->dni = $dni;
			$oferta->dni2 = $dni2;
			$oferta->dni3 = $dni3;
			$oferta->dni4 = $dni4;
			$oferta->dni5 = $dni5;
			$oferta->numero_arrendatarios = $numero_arrendatarios;
			$oferta->avalistas = $avalistas;
			$oferta->fecha_entrada = $fecha_entrada;
			$oferta->importe = $importe;
			$oferta->fianza = $fianza;
			$oferta->email_propietario = $email_propietario;
			$oferta->iva = $iva;
			$oferta->nombre_calle = $nombre_calle;
			$oferta->numero_calle = $numero_calle;
			$oferta->piso_calle = $piso_calle;
			$oferta->ciudad = $ciudad;
			$oferta->codigo_postal = $codigo_postal;
			$direccion_completa=$nombre_calle.', '.$numero_calle.', Piso '.$piso_calle.' - '.$codigo_postal.' '.$ciudad;
			$oferta->direccion_completa = $direccion_completa;
			
			$importe_fianza=$importe*$fianza;
			$oferta->total_fianza = $importe_fianza;
			$importe_iva=$importe*$iva/100;
			$oferta->importe_iva = $importe_iva;
			$total=$importe*$fianza + $importe*$iva/100;
			$oferta->importe_total =$total;
			
			
			$oferta->aceptadas_condiciones = Carbon::now()->format('Y-m-d H:i:s');
			$oferta->path_contrato = $path_contrato;
			$oferta->numero_arrendatarios = $numero_arrendatarios;

			
			$oferta->save();
			
            if($request->hasFile('nif_img')){
                $nifs = $request->file('nif_img');
                foreach ($nifs as $idx=>$nif) {
                    $nif->storeAs('oferta/'.$oferta->id.'/nif', $nif->getClientOriginalName());
                    $path = "oferta/". $oferta->id ."/nif/" .$nif->getClientOriginalName();
                    if($idx == 0){
                        $oferta->nif_image = $path;
                    }elseif($idx == 1){
                        $oferta->nif_image2 = $path;
                    }else if($idx == 2){
                        $oferta->nif2_image = $path;
                    }else if($idx == 3){
                        $oferta->nif2_image2 = $path;
                    }else if($idx == 4){
                        $oferta->nif3_image = $path;
                    }else if($idx == 5){
                        $oferta->nif3_image2 = $path;
                    }else if($idx == 6){
                        $oferta->nif4_image = $path;
                    }else if($idx == 7){
                        $oferta->nif4_image2 = $path;
                    }else if($idx == 8){
                        $oferta->nif5_image = $path;
                    }else if($idx == 9){
                        $oferta->nif5_image2 = $path;
                    }                
					
                    $oferta->save();
                    
                }
    
            }
			
            if($request->hasFile('contrato_img')){
                $contratos = $request->file('contrato_img');
                foreach ($contratos as $idx=>$contrato) {
                    $contrato->storeAs('oferta/'.$oferta->id.'/contrato', $contrato->getClientOriginalName());
                    $path = "oferta/". $oferta->id ."/contrato/" .$contrato->getClientOriginalName();
                    if($idx == 0){
                        $oferta->contrato_image = $path;
                    }elseif($idx == 1){
                        $oferta->contrato_image2 = $path;
                    }else if($idx == 2){
                        $oferta->contrato2_image = $path;
                    }else if($idx == 3){
                        $oferta->contrato2_image2 = $path;
                    }else if($idx == 4){
                        $oferta->contrato3_image = $path;
                    }else if($idx == 5){
                        $oferta->contrato3_image2 = $path;
                    }else if($idx == 6){
                        $oferta->contrato4_image = $path;
                    }else if($idx == 7){
                        $oferta->contrato4_image2 = $path;
                    }else if($idx == 8){
                        $oferta->contrato5_image = $path;
                    }else if($idx == 9){
                        $oferta->contrato5_image2 = $path;
                    }                
					
                    $oferta->save();
                    
                }
    
            }

            if($request->hasFile('nomina_img')){
                $nominas = $request->file('nomina_img');
                foreach ($nominas as $idx=>$nomina) {
                    $nomina->storeAs('oferta/'.$oferta->id.'/nomina', $nomina->getClientOriginalName());
                    $path = "oferta/". $oferta->id ."/nomina/" .$nomina->getClientOriginalName();
                    if($idx == 0){
                        $oferta->nomina_image = $path;
                    }elseif($idx == 1){
                        $oferta->nomina_image2 = $path;
                    }else if($idx == 2){
                        $oferta->nomina2_image = $path;
                    }else if($idx == 3){
                        $oferta->nomina2_image2 = $path;
                    }else if($idx == 4){
                        $oferta->nomina3_image = $path;
                    }else if($idx == 5){
                        $oferta->nomina3_image2 = $path;
                    }else if($idx == 6){
                        $oferta->nomina4_image = $path;
                    }else if($idx == 7){
                        $oferta->nomina4_image2 = $path;
                    }else if($idx == 8){
                        $oferta->nomina5_image = $path;
                    }else if($idx == 9){
                        $oferta->nomina5_image2 = $path;
                    }                
					
                    $oferta->save();
                    
                }
    
            }

            if($request->hasFile('nif_img_aval')){
                $nifs_aval = $request->file('nif_img_aval');
                foreach ($nifs_aval as $idx=>$nif_aval) {
                    $nif_aval->storeAs('oferta/'.$oferta->id."/nif_aval", $nif_aval->getClientOriginalName());
                    $path = "oferta/". $oferta->id ."/nif_aval/" .$nif_aval->getClientOriginalName();
                    if($idx == 0){
                        $oferta->nif_aval_image = $path;
                    }elseif($idx == 1){
                        $oferta->nif_aval_image2 = $path;
                    }else if($idx == 2){
                        $oferta->nif2_aval_image = $path;
                    }else if($idx == 3){
                        $oferta->nif2_aval_image2 = $path;
                    }else if($idx == 4){
                        $oferta->nif3_aval_image = $path;
                    }else if($idx == 5){
                        $oferta->nif3_aval_image2 = $path;
                    }else if($idx == 6){
                        $oferta->nif4_aval_image = $path;
                    }else if($idx == 7){
                        $oferta->nif4_aval_image2 = $path;
                    }else if($idx == 8){
                        $oferta->nif5_aval_image = $path;
                    }else if($idx == 9){
                        $oferta->nif5_aval_image2 = $path;
                    }                
					
                    $oferta->save();
                    
                }
    
            }
			
            if($request->hasFile('contrato_img_aval')){
                $contratos_aval = $request->file('contrato_img_aval');
                foreach ($contratos_aval as $idx=>$contrato_aval) {
                    $contrato_aval->storeAs('oferta/'.$oferta->id.'/contrato_aval', $contrato_aval->getClientOriginalName());
                    $path = "oferta/". $oferta->id ."/contrato_aval/" .$contrato_aval->getClientOriginalName();
                    if($idx == 0){
                        $oferta->contrato_aval_image = $path;
                    }elseif($idx == 1){
                        $oferta->contrato_aval_image2 = $path;
                    }else if($idx == 2){
                        $oferta->contrato2_aval_image = $path;
                    }else if($idx == 3){
                        $oferta->contrato2_aval_image2 = $path;
                    }else if($idx == 4){
                        $oferta->contrato3_aval_image = $path;
                    }else if($idx == 5){
                        $oferta->contrato3_aval_image2 = $path;
                    }else if($idx == 6){
                        $oferta->contrato4_aval_image = $path;
                    }else if($idx == 7){
                        $oferta->contrato4_aval_image2 = $path;
                    }else if($idx == 8){
                        $oferta->contrato5_aval_image = $path;
                    }else if($idx == 9){
                        $oferta->contrato5_aval_image2 = $path;
                    }                
					
                    $oferta->save();
                    
                }
    
            }			
			
            if($request->hasFile('nomina_img_aval')){
                $nominas_aval = $request->file('nomina_img_aval');
                foreach ($nominas_aval as $idx=>$nomina_aval) {
                    $nomina_aval->storeAs('oferta/'.$oferta->id.'/nomina_aval', $nomina_aval->getClientOriginalName());
                    $path = "oferta/". $oferta->id ."/nomina_aval/" .$nomina_aval->getClientOriginalName();
                    if($idx == 0){
                        $oferta->nomina_aval_image = $path;
                    }elseif($idx == 1){
                        $oferta->nomina_aval_image2 = $path;
                    }else if($idx == 2){
                        $oferta->nomina2_aval_image = $path;
                    }else if($idx == 3){
                        $oferta->nomina2_aval_image2 = $path;
                    }else if($idx == 4){
                        $oferta->nomina3_aval_image = $path;
                    }else if($idx == 5){
                        $oferta->nomina3_aval_image2 = $path;
                    }else if($idx == 6){
                        $oferta->nomina4_aval_image = $path;
                    }else if($idx == 7){
                        $oferta->nomina4_aval_image2 = $path;
                    }else if($idx == 8){
                        $oferta->nomina5_aval_image = $path;
                    }else if($idx == 9){
                        $oferta->nomina5_aval_image2 = $path;
                    }                
					
                    $oferta->save();
                    
                }
    
            }
			
			
			$content = PDF::loadView('iamovingpro.oferta.oferta', compact(['name','dni','idDoc','name2','dni2','idDoc2','name3','dni3','idDoc3','name4','dni4','idDoc4','name5','dni5','idDoc5','direccion_completa','importe_iva','total','importe_fianza','numero_arrendatarios','fecha_letra','name','email','dni','inmueble_id','fecha_entrada_letra','importe','fianza','iva']))->output();
			$path_contrato= str_replace(" ", "_", $path_contrato);			
			Storage::disk('public')->put('/oferta/'.$oferta->id.'/'.$path_contrato, $content);			
			$num_oferta=$oferta->id;
			//TODO DESCOMENTAR!!!!
			//TODO CAMBIAR POR MAIL_PU --> $mail_to = explode(",",env('MAIL_PU'));
			$mail_to = explode(",",env('MAIL_PU'));
            $bcc = explode(",",env('MAIL_OCULTO'));
            
        
            $nif_image = null;
            $nif_image2 = null;
			$nif2_image = null;
            $nif2_image2 = null;
            $nif3_image = null;
			$nif3_image2 = null;
            $nif4_image = null;
            $nif4_image2 = null;
			$nif5_image = null;
            $nif5_image2 = null;

            if($oferta->nif_image!=''){
                $nif_image = url('/') . "/storage/" . $oferta->nif_image;
            }
            if($oferta->nif_image2!=''){
                $nif_image2 = url('/') . "/storage/" . $oferta->nif_image2;
            }
            if($oferta->nif2_image!=''){
                $nif2_image = url('/') . "/storage/" . $oferta->nif2_image;
            }
            if($oferta->nif2_image2!=''){
                $nif2_image2 = url('/') . "/storage/" . $oferta->nif2_image2;
            }			
            if($oferta->nif3_image!=''){
                $nif3_image = url('/') . "/storage/" . $oferta->nif3_image;
            }
            if($oferta->nif3_image2!=''){
                $nif3_image2 = url('/') . "/storage/" . $oferta->nif3_image2;
            }			
            if($oferta->nif4_image!=''){
                $nif4_image = url('/') . "/storage/" . $oferta->nif4_image;
            }
            if($oferta->nif4_image2!=''){
                $nif4_image2 = url('/') . "/storage/" . $oferta->nif4_image2;
            }			
            if($oferta->nif5_image!=''){
                $nif5_image = url('/') . "/storage/" . $oferta->nif5_image;
            }
            if($oferta->nif5_image2!=''){
                $nif5_image2 = url('/') . "/storage/" . $oferta->nif5_image2;
            }	

            $contrato_image = null;
            $contrato_image2 = null;
			$contrato2_image = null;
            $contrato2_image2 = null;
            $contrato3_image = null;
			$contrato3_image2 = null;
            $contrato4_image = null;
            $contrato4_image2 = null;
			$contrato5_image = null;
            $contrato5_image2 = null;

            if($oferta->contrato_image!=''){
                $contrato_image = url('/') . "/storage/" . $oferta->contrato_image;
            }
            if($oferta->contrato_image2!=''){
                $contrato_image2 = url('/') . "/storage/" . $oferta->contrato_image2;
            }
            if($oferta->contrato2_image!=''){
                $contrato2_image = url('/') . "/storage/" . $oferta->contrato2_image;
            }
            if($oferta->contrato2_image2!=''){
                $contrato2_image2 = url('/') . "/storage/" . $oferta->contrato2_image2;
            }			
            if($oferta->contrato3_image!=''){
                $contrato3_image = url('/') . "/storage/" . $oferta->contrato3_image;
            }
            if($oferta->contrato3_image2!=''){
                $contrato3_image2 = url('/') . "/storage/" . $oferta->contrato3_image2;
            }			
            if($oferta->contrato4_image!=''){
                $contrato4_image = url('/') . "/storage/" . $oferta->contrato4_image;
            }
            if($oferta->contrato4_image2!=''){
                $contrato4_image2 = url('/') . "/storage/" . $oferta->contrato4_image2;
            }			
            if($oferta->contrato5_image!=''){
                $contrato5_image = url('/') . "/storage/" . $oferta->contrato5_image;
            }
            if($oferta->contrato5_image2!=''){
                $contrato5_image2 = url('/') . "/storage/" . $oferta->contrato5_image2;
            }

            $nomina_image = null;
            $nomina_image2 = null;
			$nomina2_image = null;
            $nomina2_image2 = null;
            $nomina3_image = null;
			$nomina3_image2 = null;
            $nomina4_image = null;
            $nomina4_image2 = null;
			$nomina5_image = null;
            $nomina5_image2 = null;

            if($oferta->nomina_image!=''){
                $nomina_image = url('/') . "/storage/" . $oferta->nomina_image;
            }
            if($oferta->nomina_image2!=''){
                $nomina_image2 = url('/') . "/storage/" . $oferta->nomina_image2;
            }
            if($oferta->nomina2_image!=''){
                $nomina2_image = url('/') . "/storage/" . $oferta->nomina2_image;
            }
            if($oferta->nomina2_image2!=''){
                $nomina2_image2 = url('/') . "/storage/" . $oferta->nomina2_image2;
            }			
            if($oferta->nomina3_image!=''){
                $nomina3_image = url('/') . "/storage/" . $oferta->nomina3_image;
            }
            if($oferta->nomina3_image2!=''){
                $nomina3_image2 = url('/') . "/storage/" . $oferta->nomina3_image2;
            }			
            if($oferta->nomina4_image!=''){
                $nomina4_image = url('/') . "/storage/" . $oferta->nomina4_image;
            }
            if($oferta->nomina4_image2!=''){
                $nomina4_image2 = url('/') . "/storage/" . $oferta->nomina4_image2;
            }			
            if($oferta->nomina5_image!=''){
                $nomina5_image = url('/') . "/storage/" . $oferta->nomina5_image;
            }
            if($oferta->nomina5_image2!=''){
                $nomina5_image2 = url('/') . "/storage/" . $oferta->nomina5_image2;
            }	
			
            $nif_aval_image = null;
            $nif_aval_image2 = null;
			$nif2_aval_image = null;
            $nif2_aval_image2 = null;
            $nif3_aval_image = null;
			$nif3_aval_image2 = null;
            $nif4_aval_image = null;
            $nif4_aval_image2 = null;
			$nif5_aval_image = null;
            $nif5_aval_image2 = null;

            if($oferta->nif_aval_image!=''){
                $nif_aval_image = url('/') . "/storage/" . $oferta->nif_aval_image;
            }
            if($oferta->nif_aval_image2!=''){
                $nif_aval_image2 = url('/') . "/storage/" . $oferta->nif_aval_image2;
            }
            if($oferta->nif2_aval_image!=''){
                $nif2_aval_image = url('/') . "/storage/" . $oferta->nif2_aval_image;
            }
            if($oferta->nif2_aval_image2!=''){
                $nif2_aval_image2 = url('/') . "/storage/" . $oferta->nif2_aval_image2;
            }			
            if($oferta->nif3_aval_image!=''){
                $nif3_aval_image = url('/') . "/storage/" . $oferta->nif3_aval_image;
            }
            if($oferta->nif3_aval_image2!=''){
                $nif3_aval_image2 = url('/') . "/storage/" . $oferta->nif3_aval_image2;
            }			
            if($oferta->nif4_aval_image!=''){
                $nif4_aval_image = url('/') . "/storage/" . $oferta->nif4_aval_image;
            }
            if($oferta->nif4_aval_image2!=''){
                $nif4_aval_image2 = url('/') . "/storage/" . $oferta->nif4_aval_image2;
            }			
            if($oferta->nif5_aval_image!=''){
                $nif5_aval_image = url('/') . "/storage/" . $oferta->nif5_aval_image;
            }
            if($oferta->nif5_aval_image2!=''){
                $nif5_aval_image2 = url('/') . "/storage/" . $oferta->nif5_aval_image2;
            }				
			
            $contrato_aval_image = null;
            $contrato_aval_image2 = null;
			$contrato2_aval_image = null;
            $contrato2_aval_image2 = null;
            $contrato3_aval_image = null;
			$contrato3_aval_image2 = null;
            $contrato4_aval_image = null;
            $contrato4_aval_image2 = null;
			$contrato5_aval_image = null;
            $contrato5_aval_image2 = null;

            if($oferta->contrato_aval_image!=''){
                $contrato_aval_image = url('/') . "/storage/" . $oferta->contrato_aval_image;
            }
            if($oferta->contrato_aval_image2!=''){
                $contrato_aval_image2 = url('/') . "/storage/" . $oferta->contrato_aval_image2;
            }
            if($oferta->contrato2_aval_image!=''){
                $contrato2_aval_image = url('/') . "/storage/" . $oferta->contrato2_aval_image;
            }
            if($oferta->contrato2_aval_image2!=''){
                $contrato2_aval_image2 = url('/') . "/storage/" . $oferta->contrato2_aval_image2;
            }			
            if($oferta->contrato3_aval_image!=''){
                $contrato3_aval_image = url('/') . "/storage/" . $oferta->contrato3_aval_image;
            }
            if($oferta->contrato3_aval_image2!=''){
                $contrato3_aval_image2 = url('/') . "/storage/" . $oferta->contrato3_aval_image2;
            }			
            if($oferta->contrato4_aval_image!=''){
                $contrato4_aval_image = url('/') . "/storage/" . $oferta->contrato4_aval_image;
            }
            if($oferta->contrato4_aval_image2!=''){
                $contrato4_aval_image2 = url('/') . "/storage/" . $oferta->contrato4_aval_image2;
            }			
            if($oferta->contrato5_aval_image!=''){
                $contrato5_aval_image = url('/') . "/storage/" . $oferta->contrato5_aval_image;
            }
            if($oferta->contrato5_aval_image2!=''){
                $contrato5_aval_image2 = url('/') . "/storage/" . $oferta->contrato5_aval_image2;
            }				
			
            $nomina_aval_image = null;
            $nomina_aval_image2 = null;
			$nomina2_aval_image = null;
            $nomina2_aval_image2 = null;
            $nomina3_aval_image = null;
			$nomina3_aval_image2 = null;
            $nomina4_aval_image = null;
            $nomina4_aval_image2 = null;
			$nomina5_aval_image = null;
            $nomina5_aval_image2 = null;

            if($oferta->nomina_aval_image!=''){
                $nomina_aval_image = url('/') . "/storage/" . $oferta->nomina_aval_image;
            }
            if($oferta->nomina_aval_image2!=''){
                $nomina_aval_image2 = url('/') . "/storage/" . $oferta->nomina_aval_image2;
            }
            if($oferta->nomina2_aval_image!=''){
                $nomina2_aval_image = url('/') . "/storage/" . $oferta->nomina2_aval_image;
            }
            if($oferta->nomina2_aval_image2!=''){
                $nomina2_aval_image2 = url('/') . "/storage/" . $oferta->nomina2_aval_image2;
            }			
            if($oferta->nomina3_aval_image!=''){
                $nomina3_aval_image = url('/') . "/storage/" . $oferta->nomina3_aval_image;
            }
            if($oferta->nomina3_aval_image2!=''){
                $nomina3_aval_image2 = url('/') . "/storage/" . $oferta->nomina3_aval_image2;
            }			
            if($oferta->nomina4_aval_image!=''){
                $nomina4_aval_image = url('/') . "/storage/" . $oferta->nomina4_aval_image;
            }
            if($oferta->nomina4_aval_image2!=''){
                $nomina4_aval_image2 = url('/') . "/storage/" . $oferta->nomina4_aval_image2;
            }			
            if($oferta->nomina5_aval_image!=''){
                $nomina5_aval_image = url('/') . "/storage/" . $oferta->nomina5_aval_image;
            }
            if($oferta->nomina5_aval_image2!=''){
                $nomina5_aval_image2 = url('/') . "/storage/" . $oferta->nomina5_aval_image2;
            }				
            
            $subject = "Oferta sobre tu inmueble con IAMOVING";
			//Enviar a Roberto MAIL_PU<<-------- TODOOOO!!!
            \Mail::to($mail_to)->bcc($bcc)->send(new OfertaPropietarioMail($subject,$inmueble_id,$num_oferta,$email_propietario,$path_contrato,$numero_arrendatarios,$avalistas,$nif_image,$nif_image2,$nif2_image,$nif2_image2,$nif3_image,$nif3_image2,$nif4_image,$nif4_image2,$nif5_image,$nif5_image2,$contrato_image,$contrato_image2,$contrato2_image,$contrato2_image2,$contrato3_image,$contrato3_image2,$contrato4_image,$contrato4_image2,$contrato5_image,$contrato5_image2,$nomina_image,$nomina_image2,$nomina2_image,$nomina2_image2,$nomina3_image,$nomina3_image2,$nomina4_image,$nomina4_image2,$nomina5_image,$nomina5_image2,$nif_aval_image,$nif_aval_image2,$nif2_aval_image,$nif2_aval_image2,$nif3_aval_image,$nif3_aval_image2,$nif4_aval_image,$nif4_aval_image2,$nif5_aval_image,$nif5_aval_image2,$contrato_aval_image,$contrato_aval_image2,$contrato2_aval_image,$contrato2_aval_image2,$contrato3_aval_image,$contrato3_aval_image2,$contrato4_aval_image,$contrato4_aval_image2,$contrato5_aval_image,$contrato5_aval_image2,$nomina_aval_image,$nomina_aval_image2,$nomina2_aval_image,$nomina2_aval_image2,$nomina3_aval_image,$nomina3_aval_image2,$nomina4_aval_image,$nomina4_aval_image2,$nomina5_aval_image,$nomina5_aval_image2, $email));
			//$subject = "Oferta sobre tu inmueble con IAMOVING Ref. ".$inmueble_id;
			//\Mail::to($mail_to)->bcc($bcc)->send(new OfertaAdjuntosMail($subject,$num_oferta,$email_propietario,$path_contrato,$numero_arrendatarios,$avalistas,$nif_image,$nif_image2,$nif2_image,$nif2_image2,$nif3_image,$nif3_image2,$nif4_image,$nif4_image2,$nif5_image,$nif5_image2,$contrato_image,$contrato_image2,$contrato2_image,$contrato2_image2,$contrato3_image,$contrato3_image2,$contrato4_image,$contrato4_image2,$contrato5_image,$contrato5_image2,$nomina_image,$nomina_image2,$nomina2_image,$nomina2_image2,$nomina3_image,$nomina3_image2,$nomina4_image,$nomina4_image2,$nomina5_image,$nomina5_image2,$nif_aval_image,$nif_aval_image2,$nif2_aval_image,$nif2_aval_image2,$nif3_aval_image,$nif3_aval_image2,$nif4_aval_image,$nif4_aval_image2,$nif5_aval_image,$nif5_aval_image2,$contrato_aval_image,$contrato_aval_image2,$contrato2_aval_image,$contrato2_aval_image2,$contrato3_aval_image,$contrato3_aval_image2,$contrato4_aval_image,$contrato4_aval_image2,$contrato5_aval_image,$contrato5_aval_image2,$nomina_aval_image,$nomina_aval_image2,$nomina2_aval_image,$nomina2_aval_image2,$nomina3_aval_image,$nomina3_aval_image2,$nomina4_aval_image,$nomina4_aval_image2,$nomina5_aval_image,$nomina5_aval_image2));
			
			$subject = "Oferta sobre la referencia ".$inmueble_id. " con IAMOVING";
			\Mail::to($email)->bcc($mail_to)->send(new OfertaArrendatarioMail($subject,$inmueble_id,$num_oferta,$email,$importe,$path_contrato));
            
			
            if(count(\Mail::failures()) > 0 ) {
				
					if ($request->session()->has('comercial_url')) {
						 return redirect($request->session()->get('oferta_url'))->with('error','No se ha podido enviar su mensaje');
					}
                return redirect()->route('comercial')->with('error','No se ha podido enviar su mensaje');
            }else{
					if ($request->session()->has('oferta_url')) {
						 return redirect($request->session()->get('oferta_url'))->with('success','Acabamos de enviar a tu correo electrónico el documento de oferta para formalizar tu interés.');
					}				
                //return redirect()->route('oferta/'.$inmueble_id)->with('success','Su mensaje ha sido enviado');
            }
        

        return response()->json($data);
	}
}