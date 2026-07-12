<?php

namespace App\Http\Controllers\iamovingpro;

use App\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use App\Ciudad;

class FindController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        $data = [];
        $category="";    
        $city = Ciudad::find(request()->city);
        if (request()->has('category')) {
            $data  = \App\InformeDetalladoCabecera::where('is_sale', '=', request()->category)
                ->where('published',true)
				// ->where('iamoving_pro','>',0)
		//TODO-->Se puede poner por defecto "Pisos y casas" `preguntar Roberto
		//->whereIn('estado_inmueble', ['Disponible', 'Reservado','Alquilado','Vendido'])
		->whereIn('estado_inmueble', ['Disponible', 'Reservado'])
		->where('ciudad_inmueble', $city->id)
		->where('tipo_inmueble','Pisos y casas')
		->whereNotNull('ciudad_inmueble')
		->orderBy('created_at', 'DESC')->get();
		//->orderBy('created_at', 'DESC')->get();
            foreach ($data as $i => $d) {
                $image = $d->path_image_primary;
                $fileWithoutExtension = explode('.',$image)[0];
                //$data[$i]->path_image_primary = $fileWithoutExtension . "_444x250.jpg";
				$data[$i]->path_image_primary = $fileWithoutExtension;
            }
            $max = \App\InformeDetalladoCabecera::where('is_sale', '=', request()->category)->where('published',true)->whereIn('estado_inmueble', ['Disponible', 'Reservado'])->max('propiedad_precio');           
			//$maxtamano = \App\InformeDetalladoCabecera::where('is_sale', '=', request()->category)->where('published',true)->whereIn('estado_inmueble', ['Disponible', 'Reservado'])->max('propiedad_precio');           
        }
        $category=request()->category;
        $cityId = request()->city;
        

        return view('iamovingpro.find.index', compact('data','category','max','city','cityId'));
    }
    
    public function searchFilters(Request $request, $category,$city) {
        //print_r($request);
        $informes = \App\InformeDetalladoCabecera::where('is_sale', '=', $category)->where('ciudad_inmueble', $city)
		->where('published',true)
		//TODO-->Se puede quitar el iampro>0 si se quiere probarlo!!!
		->where('iamoving_pro','>',0)
		//->whereIn('estado_inmueble', ['Disponible', 'Reservado','Alquilado','Vendido']);
		->whereIn('estado_inmueble', ['Disponible', 'Reservado']);
		
        if($request->has('tipoinmueble')){

                if($request->tipoinmueble == 'Pisos y casas'){
                    $informes->where('tipo_inmueble','Pisos y casas');       
                }
                if($request->tipoinmueble == 'Habitaciones'){
                    $informes->where('tipo_inmueble','Habitaciones');       
                }
                if($request->tipoinmueble == 'Local/Oficina'){
                    $informes->where('tipo_inmueble','Local/Oficina');       
                }				
        }		

        if($request->has('price') && trim($request->price)!=''){
            //$precio = floatval($request->price);
	        $precio = str_replace("€","",str_replace(".", "", $request->price));
            $informes->where('propiedad_precio','<=',$precio);
        }
        if($request->has('propiedad_price') && trim($request->propiedad_price)!=''){
            //$precio = floatval($request->price);
	        $propiedad_price = str_replace("€","",str_replace(".", "", $request->propiedad_price));
            $informes->where('propiedad_precio','>=',$propiedad_price);
        }
		
        if($request->has('tamano') && trim($request->tamano)!=''){
			 if($request->tipoinmueble != "Habitaciones") {
			   //$precio = floatval($request->tamano);
				$precio = str_replace(".", "", $request->tamano);
				$informes->where('square_meters','<=',$precio);
			 }
        }
		
        if($request->has('propiedad_tamano') && trim($request->propiedad_tamano)!=''){
			if($request->tipoinmueble != "Habitaciones") {
				//$precio = floatval($request->tamano);
				$propiedad_tamano = str_replace(".", "", $request->propiedad_tamano);
				$informes->where('square_meters','>=',$propiedad_tamano);
			}
        }		
		
        if($request->has('date') && $request->date!=''){
            $formatted_date = substr($request->date,0,10);
//            $informes->where('alquiler_casa','<=',$formatted_date);
            $informes->where(function($q) use ($formatted_date) {
                $q->where('alquiler_casa','<=',$formatted_date)
                  ->orWhereNull('alquiler_casa');
            });
        }
        
        if($request->has('piesas') && count($request->piesas)> 0){
			if($request->tipoinmueble == 'Pisos y casas' || $request->tipoinmueble == 'Habitaciones') {
				$informes->whereIn('bedrooms',$request->piesas);
			}
        }

        if($request->has('numerosBanos') && count($request->numerosBanos)> 0){
			if($request->tipoinmueble == 'Pisos y casas' || $request->tipoinmueble == 'Habitaciones') {
				$informes->whereIn('bathrooms',$request->numerosBanos);
			}
        }

        //qualities
        /*if($request->has('furnished_types') && count($request->furnished_types)> 0){
            foreach($request->furnished_types as $q){
                if(strtolower($q) == "estudio"){   
					$informes->where('estudio',1);
                }
                if(strtolower($q) == "loft"){
                    $informes->where('loft',1);        
                }
                if(strtolower($q) == "apartamento"){
                    $informes->where('apartamento',1);        
                }
                if(strtolower($q) == "piso"){
                    $informes->where('piso',1);        
                }
                if(strtolower($q) == "chalet"){
                    $informes->where('chalet',1);        
                }
                if(strtolower($q) == "atico"){
                    $informes->where('atico',1);        
                }
                if(strtolower($q) == "bajo"){
                    $informes->where('bajo',1);        
                }
			}
		}*/
		


		

        /*if($request->has('qualities') && count($request->qualities)> 0){
            foreach($request->qualities as $q){		
                if($q == "Totalmente sin muebles"){
                    $informes->where('amueblada',"Totalmente sin muebles");        
                }
                if($q == "Vacío c/ la cocina equipada"){
                    $informes->where('amueblada',"Sin muebles con cocina equipada");        
                }
                if($q == "Semi amueblado"){ 
                    $informes->where('amueblada',"Semi-Amueblado");        
                }
                if($q == "Amueblado"){
                    $informes->where('amueblada',"Amueblado");        
                }
            }
            
        }*/
		//Esto sustituye lo de arriba. Lo de arriba si cogía más de uno descartaba los dos
        if($request->has('qualities') && count($request->qualities)> 0){
			if($request->tipoinmueble == 'Pisos y casas') {			
                 $informes->whereIn('amueblada',$request->qualities);        				
			}
        }

//habitación vacia
        if($request->has('room') && count($request->room)> 0){
			if($request->tipoinmueble == 'Habitaciones') {			
                    $informes->whereIn('habitacion_vacia',$request->room);        				
			}
        }
		 /*if($request->has('estadoInmueble') && count($request->estadoInmueble)> 0){
            foreach($request->estadoInmueble as $e){
                if($e == "Obra nueva"){
                    $informes->where('propiedad_estado',"Obra nueva");        
                }
                if($e == "Reformado a estrenar"){ 
                    $informes->where('propiedad_estado',"Reformado a estrenar");        
                }
                if($e == "A reformar"){ 
                    $informes->where('propiedad_estado',"A reformar");        
                }	
                if($e == "En buen estado"){ 
                    $informes->where('propiedad_estado',"En buen estado");        
                }
                if($e == "Recién reformado"){ 
                    $informes->where('propiedad_estado',"Recién reformado");        
                }				
            }
        }*/
		//Esto sustituye lo de arriba. Lo de arriba si cogía más de uno descartaba los dos
        if($request->has('estadoInmueble') && count($request->estadoInmueble)> 0){
                    $informes->whereIn('propiedad_estado',$request->estadoInmueble);        				
        }
	

        if($request->has('access') && count($request->access)> 0){
            foreach($request->access as $a){
				if($request->tipoinmueble == 'Pisos y casas' || $request->tipoinmueble == 'Habitaciones') {
					if($a == "Rampas de minusválidos en el portal"){
						$informes->where('rampa',1);   
					}
					if($a == "Ascensor que entra un carrito de bebé"){
						$informes->where('bebe_rampa',1);   
					}
					if($a == "Terraza"){
						$informes->where('terraza',1);   
					}
					if($a == "Balcón"){
						$informes->where('balcon',1);   
					}
					if($a == "Tendedero"){
						$informes->where('tenderos',1);   
					}

					if($a == "Acepta mascotas"){
						$informes->where('mascotas',1);   
					}

					if($a == "Lavavajillas"){
						$informes->where('lavavajillas',1);   
					}
					if($a == "Horno"){
						$informes->where('horno',1);   
					}
				}
				//TODOS
				if($a == "Aire acondicionado"){
                    $informes->where('aire_acondicionado',1);   
                }
                if($a == "Ascensor"){
                    $informes->where('lift',1);   
                }
                if($a == "Exterior"){
                    $informes->where('exterior',1);   
                }	
				if( $request->tipoinmueble == 'Local/Oficina') {
					if($a == "Interior"){
						$informes->where('interior',1);   
					}
				}				
				//
				//Solo Local/Oficina
				//
				if( $request->tipoinmueble == 'Local/Oficina') {				
					if($a == "Diáfano"){
						$informes->where('diafano',1);   
					}

					if($a == "Dividido con mamparas"){
						$informes->where('divido_mamparas',1);   
					}

					if($a == "Dividido con tabiques"){
						$informes->where('divido_tabiques',1);   
					}
					if($a == "Salida de humos"){
						$informes->where('salida_humos',1);   
					}
					if($a == "A pie de calle"){
						$informes->where('pie_calle',1);   
					}		
					if($a == "Puerta de seguridad"){
						$informes->where('puerta_seguridad',1);   
					}

					if($a == "Sistemas de alarma"){
						$informes->where('sistema_alarma',1);   
					}

					if($a == "Circuito cerrado de seguridad"){
						$informes->where('circuito_seguridad',1);   
					}
					if($a == "Almacén"){
						$informes->where('almacen',1);   
					}
					if($a == "Hace esquina"){
						$informes->where('esquina',1);   
					}		
					if($a == "Montacargas"){
						$informes->where('montacargas',1);   
					}

					if($a == "En centro comercial"){
						$informes->where('centro_comercial',1);   
					}

					if($a == "Entreplanta"){
						$informes->where('entreplanta',1);   
					}
					if($a == "Subterráneo"){
						$informes->where('subterraneo',1);   
					}
				}
					
            }
        }

    /*    if($request->has('banosIncorporados') && count($request->banosIncorporados)> 0){
            $informes->whereIn('suite',$request->banosIncorporados);
        }
*/
        /*if($request->has('heating') && count($request->heating)> 0){
            foreach($request->heating as $h){
                if($h == "Gas natural"){
                    $informes->where('calefaccion',"Gas natural");   
                }
                if($h == "Eléctrica"){
                    $informes->where('calefaccion',"Eléctrica");   
                }
                if($h == "Central"){
                    $informes->where('calefaccion',"Central");   
                }
            }
        }*/
		//Esto sustituye lo de arriba. Lo de arriba si cogía más de uno descartaba los dos		
		if($request->has('heating') && count($request->heating)> 0){
			  $informes->whereIn('calefaccion',$request->heating);  
		}

        /*if($request->has('calderaAgua') && count($request->calderaAgua)> 0){
            foreach($request->calderaAgua as $c){
                if($c == "Gas natural"){
                    $informes->where('calentador_agua',"Gas natural");   
                }
                if($c == "Eléctrica"){
                    $informes->where('calentador_agua',"Eléctrica");   
                }
                if($c == "Central"){
                    $informes->where('calentador_agua',"Central");   
                }
            }
        }*/
		//Esto sustituye lo de arriba. Lo de arriba si cogía más de uno descartaba los dos	
		if($request->has('calderaAgua') && count($request->calderaAgua)> 0){
			  $informes->whereIn('calentador_agua',$request->calderaAgua);  
		}
        
      //  if($request->has('orientacion') && count($request->orientacion)> 0){
    //        $informes->whereIn('orientacion',$request->orientacion);
      //  }

        //if($request->has('banosIncorporadosHab') && count($request->banosIncorporadosHab)> 0){
        //    $informes->whereIn('suite',$request->banosIncorporadosHab);
        //}

        
        if($request->has('contract') && $request->contract!=''){
            $informes->where('contrato','<=',$request->contract); 
        }

      /*  if($request->has('contract') && $request->contract!=''){
            $informes->where('contrato',$request->contract); 
        }*/

        if($request->has('building') && count($request->building)> 0){
            foreach($request->building as $b){
			if($request->tipoinmueble == 'Pisos y casas' || $request->tipoinmueble == 'Habitaciones') {	
                if($b == "Jardín"){
                    $informes->where('jardin',1);   
                }
                if($b == "Piscina"){
                    $informes->where('piscina',1);   
                }
                if($b == "Gym"){
                    $informes->where('gym',1);   
                }
                if($b == "Sauna"){
                    $informes->where('sauna',1);   
                }
                if($b == "Zona deportiva"){
                    $informes->where('zona_deportiva',1);   
                }
                if($b == "Zona infantil"){
                    $informes->where('zona_infantil',1);   
                }
                if($b == "Garaje incluido en el precio"){
                    $informes->where('garaje_incluido_precio',1);   
                }
                if($b == "Opción de garaje en lo mismo edificio"){
                    $informes->where('garaje_opcion',1);   
                }
                if($b == "Trastero incluido"){
                    $informes->where('testero_incluido',1);   
                }
                if($b == "Opción de trastero en el mismo edificio"){
                    $informes->where('opcion_trastero_edificio',1);  
                }
			}   
            }
        }
//dd($informes);
		//dd($b);


//Log::info('Hello function executed!');

//echo $informes;

//Log::info('Hello function executed!');
//->where((function ($query) {$query->where('votes', '>', 100)->orWhere('title', '=', 'Admin');})->get();

        //$informes = $informes->where('piso',1)->orWhere('chalet',1)->orWhere('atico',1)->orWhere('bajo',1)->orderBy('created_at', 'DESC')->get();
		
		//$inf=;
		//$informes = $informes->orderBy('created_at', 'DESC')->get();
		
		/*$informes = $informes->where(function ($query) {  $query->where('piso',1)->orWhere('chalet',1)->orWhere('atico',1)->orWhere('bajo',1); })   ->orderBy('created_at', 'DESC')->get();*/
		
		
		
		
		
		
		
		
		
		
				$flag=0;
		$estudioinforme1=0;
		$loftinforme1=0;      
		$apartamentoinforme1=0;		
		$pisoinforme1=0;
		$chaletinforme1=0;
		$aticoinforme1=0;	
		$bajoinforme1=0;		
		if($request->has('furnished_types') && count($request->furnished_types)> 0){
            foreach($request->furnished_types as $q){
				if($request->tipoinmueble == 'Pisos y casas'){

					if(strtolower($q) == "estudio"){    
							$estudioinforme1=1;     
					}
					if(strtolower($q) == "loft"){
						//$informes->where('loft',1);           
							$loftinforme1=1;   					
					}
					if(strtolower($q) == "apartamento"){
							$apartamentoinforme1=1;     
					}
					if(strtolower($q) == "piso"){
							$pisoinforme1=1;     						
					}
					if(strtolower($q) == "chalet"){
						//$informes->where('chalet',1);        
						$chaletinforme1=1;
					}
					if(strtolower($q) == "atico"){
						//$informes->where('atico',1);        
						$aticoinforme1=1;		
					}
					if(strtolower($q) == "bajo"){
						//$informes->where('bajo',1);  
						$bajoinforme1=1;
					}
				}
				else{
					if(strtolower($q) == "piso"){
							$pisoinforme1=1;     						
					}
					if(strtolower($q) == "chalet"){
						//$informes->where('chalet',1);        
						$chaletinforme1=1;
					}
					if(strtolower($q) == "atico"){
						//$informes->where('atico',1);        
						$aticoinforme1=1;		
					}
					if(strtolower($q) == "bajo"){
						//$informes->where('bajo',1);  
						$bajoinforme1=1;
					}					
				}
			}

			
			
			
			if ($estudioinforme1){
					if ($loftinforme1){
							if ($apartamentoinforme1){
									if ($pisoinforme1){
											if ($chaletinforme1){
													if ($aticoinforme1){
															if ($bajoinforme1){
																		$informes = $informes->where(function ($query) {  $query->where('estudio',1)->orWhere('loft',1)->orWhere('apartamento',1)->orWhere('piso',1)->orWhere('chalet',1)->orWhere('atico',1)->orWhere('bajo',1); })   ->orderBy('created_at', 'DESC')->get();
															}
															else{									
																		$informes = $informes->where(function ($query) {  $query->where('estudio',1)->orWhere('loft',1)->orWhere('apartamento',1)->orWhere('piso',1)->orWhere('chalet',1)->orWhere('atico',1); })   ->orderBy('created_at', 'DESC')->get();
															}
													}
													else{
															if ($bajoinforme1){
																		$informes = $informes->where(function ($query) {  $query->where('estudio',1)->orWhere('loft',1)->orWhere('apartamento',1)->orWhere('piso',1)->orWhere('chalet',1)->orWhere('bajo',1); })   ->orderBy('created_at', 'DESC')->get();
															}
															else{									
																		$informes = $informes->where(function ($query) {  $query->where('estudio',1)->orWhere('loft',1)->orWhere('apartamento',1)->orWhere('piso',1)->orWhere('chalet',1); })   ->orderBy('created_at', 'DESC')->get();
															}
													}
											}
											else{
													if ($aticoinforme1){
															if ($bajoinforme1){
																		$informes = $informes->where(function ($query) {  $query->where('estudio',1)->orWhere('loft',1)->orWhere('apartamento',1)->orWhere('piso',1)->orWhere('atico',1)->orWhere('bajo',1); })   ->orderBy('created_at', 'DESC')->get();
															}
															else{									
																		$informes = $informes->where(function ($query) {  $query->where('estudio',1)->orWhere('loft',1)->orWhere('apartamento',1)->orWhere('piso',1)->orWhere('atico',1); })   ->orderBy('created_at', 'DESC')->get();
															}
													}
													else{
															if ($bajoinforme1){
																		$informes = $informes->where(function ($query) {  $query->where('estudio',1)->orWhere('loft',1)->orWhere('apartamento',1)->orWhere('piso',1)->orWhere('bajo',1); })   ->orderBy('created_at', 'DESC')->get();
															}
															else{									
																		$informes = $informes->where(function ($query) {  $query->where('estudio',1)->orWhere('loft',1)->orWhere('apartamento',1)->orWhere('piso',1); })   ->orderBy('created_at', 'DESC')->get();
															}
													}									
											}
									}
									else{
											if ($chaletinforme1){
													if ($aticoinforme1){
															if ($bajoinforme1){
																		$informes = $informes->where(function ($query) {  $query->where('estudio',1)->orWhere('loft',1)->orWhere('apartamento',1)->orWhere('chalet',1)->orWhere('atico',1)->orWhere('bajo',1); })   ->orderBy('created_at', 'DESC')->get();
															}
															else{									
																		$informes = $informes->where(function ($query) {  $query->where('estudio',1)->orWhere('loft',1)->orWhere('apartamento',1)->orWhere('chalet',1)->orWhere('atico',1); })   ->orderBy('created_at', 'DESC')->get();
															}
													}
													else{
															if ($bajoinforme1){
																		$informes = $informes->where(function ($query) {  $query->where('estudio',1)->orWhere('loft',1)->orWhere('apartamento',1)->orWhere('chalet',1)->orWhere('bajo',1); })   ->orderBy('created_at', 'DESC')->get();
															}
															else{									
																		$informes = $informes->where(function ($query) {  $query->where('estudio',1)->orWhere('loft',1)->orWhere('apartamento',1)->orWhere('chalet',1); })   ->orderBy('created_at', 'DESC')->get();
															}
													}
											}
											else{
													if ($aticoinforme1){
															if ($bajoinforme1){
																		$informes = $informes->where(function ($query) {  $query->where('estudio',1)->orWhere('loft',1)->orWhere('apartamento',1)->orWhere('atico',1)->orWhere('bajo',1); })   ->orderBy('created_at', 'DESC')->get();
															}
															else{									
																		$informes = $informes->where(function ($query) {  $query->where('estudio',1)->orWhere('loft',1)->orWhere('apartamento',1)->orWhere('atico',1); })   ->orderBy('created_at', 'DESC')->get();
															}
													}
													else{
															if ($bajoinforme1){
																		$informes = $informes->where(function ($query) {  $query->where('estudio',1)->orWhere('loft',1)->orWhere('apartamento',1)->orWhere('bajo',1); })   ->orderBy('created_at', 'DESC')->get();
															}
															else{									
																		$informes = $informes->where(function ($query) {  $query->where('estudio',1)->orWhere('loft',1)->orWhere('apartamento',1); })   ->orderBy('created_at', 'DESC')->get();
															}
													}									
											}							
									}									
							}
							else{
									if ($pisoinforme1){
											if ($chaletinforme1){
													if ($aticoinforme1){
															if ($bajoinforme1){
																		$informes = $informes->where(function ($query) {  $query->where('estudio',1)->orWhere('loft',1)->orWhere('piso',1)->orWhere('chalet',1)->orWhere('atico',1)->orWhere('bajo',1); })   ->orderBy('created_at', 'DESC')->get();
															}
															else{									
																		$informes = $informes->where(function ($query) {  $query->where('estudio',1)->orWhere('loft',1)->orWhere('piso',1)->orWhere('chalet',1)->orWhere('atico',1); })   ->orderBy('created_at', 'DESC')->get();
															}
													}
													else{
															if ($bajoinforme1){
																		$informes = $informes->where(function ($query) {  $query->where('estudio',1)->orWhere('loft',1)->orWhere('piso',1)->orWhere('chalet',1)->orWhere('bajo',1); })   ->orderBy('created_at', 'DESC')->get();
															}
															else{									
																		$informes = $informes->where(function ($query) {  $query->where('estudio',1)->orWhere('loft',1)->orWhere('piso',1)->orWhere('chalet',1); })   ->orderBy('created_at', 'DESC')->get();
															}
													}
											}
											else{
													if ($aticoinforme1){
															if ($bajoinforme1){
																		$informes = $informes->where(function ($query) {  $query->where('estudio',1)->orWhere('loft',1)->orWhere('piso',1)->orWhere('atico',1)->orWhere('bajo',1); })   ->orderBy('created_at', 'DESC')->get();
															}
															else{									
																		$informes = $informes->where(function ($query) {  $query->where('estudio',1)->orWhere('loft',1)->orWhere('piso',1)->orWhere('atico',1); })   ->orderBy('created_at', 'DESC')->get();
															}
													}
													else{
															if ($bajoinforme1){
																		$informes = $informes->where(function ($query) {  $query->where('estudio',1)->orWhere('loft',1)->orWhere('piso',1)->orWhere('bajo',1); })   ->orderBy('created_at', 'DESC')->get();
															}
															else{									
																		$informes = $informes->where(function ($query) {  $query->where('estudio',1)->orWhere('loft',1)->orWhere('piso',1); })   ->orderBy('created_at', 'DESC')->get();
															}
													}									
											}
									}
									else{
											if ($chaletinforme1){
													if ($aticoinforme1){
															if ($bajoinforme1){
																		$informes = $informes->where(function ($query) {  $query->where('estudio',1)->orWhere('loft',1)->orWhere('chalet',1)->orWhere('atico',1)->orWhere('bajo',1); })   ->orderBy('created_at', 'DESC')->get();
															}
															else{									
																		$informes = $informes->where(function ($query) {  $query->where('estudio',1)->orWhere('loft',1)->orWhere('chalet',1)->orWhere('atico',1); })   ->orderBy('created_at', 'DESC')->get();
															}
													}
													else{
															if ($bajoinforme1){
																		$informes = $informes->where(function ($query) {  $query->where('estudio',1)->orWhere('loft',1)->orWhere('chalet',1)->orWhere('bajo',1); })   ->orderBy('created_at', 'DESC')->get();
															}
															else{									
																		$informes = $informes->where(function ($query) {  $query->where('estudio',1)->orWhere('loft',1)->orWhere('chalet',1); })   ->orderBy('created_at', 'DESC')->get();
															}
													}
											}
											else{
													if ($aticoinforme1){
															if ($bajoinforme1){
																		$informes = $informes->where(function ($query) {  $query->where('estudio',1)->orWhere('loft',1)->orWhere('atico',1)->orWhere('bajo',1); })   ->orderBy('created_at', 'DESC')->get();
															}
															else{									
																		$informes = $informes->where(function ($query) {  $query->where('estudio',1)->orWhere('loft',1)->orWhere('atico',1); })   ->orderBy('created_at', 'DESC')->get();
															}
													}
													else{
															if ($bajoinforme1){
																		$informes = $informes->where(function ($query) {  $query->where('estudio',1)->orWhere('loft',1)->orWhere('bajo',1); })   ->orderBy('created_at', 'DESC')->get();
															}
															else{									
																		$informes = $informes->where(function ($query) {  $query->where('estudio',1)->orWhere('loft',1); })   ->orderBy('created_at', 'DESC')->get();
															}
													}									
											}							
									}						
							}	
					}
					else{
							if ($apartamentoinforme1){
									if ($pisoinforme1){
											if ($chaletinforme1){
													if ($aticoinforme1){
															if ($bajoinforme1){
																		$informes = $informes->where(function ($query) {  $query->where('estudio',1)->orWhere('apartamento',1)->orWhere('piso',1)->orWhere('chalet',1)->orWhere('atico',1)->orWhere('bajo',1); })   ->orderBy('created_at', 'DESC')->get();
															}
															else{									
																		$informes = $informes->where(function ($query) {  $query->where('estudio',1)->orWhere('apartamento',1)->orWhere('piso',1)->orWhere('chalet',1)->orWhere('atico',1); })   ->orderBy('created_at', 'DESC')->get();
															}
													}
													else{
															if ($bajoinforme1){
																		$informes = $informes->where(function ($query) {  $query->where('estudio',1)->orWhere('apartamento',1)->orWhere('piso',1)->orWhere('chalet',1)->orWhere('bajo',1); })   ->orderBy('created_at', 'DESC')->get();
															}
															else{									
																		$informes = $informes->where(function ($query) {  $query->where('estudio',1)->orWhere('apartamento',1)->orWhere('piso',1)->orWhere('chalet',1); })   ->orderBy('created_at', 'DESC')->get();
															}
													}
											}
											else{
													if ($aticoinforme1){
															if ($bajoinforme1){
																		$informes = $informes->where(function ($query) {  $query->where('estudio',1)->orWhere('apartamento',1)->orWhere('piso',1)->orWhere('atico',1)->orWhere('bajo',1); })   ->orderBy('created_at', 'DESC')->get();
															}
															else{									
																		$informes = $informes->where(function ($query) {  $query->where('estudio',1)->orWhere('apartamento',1)->orWhere('piso',1)->orWhere('atico',1); })   ->orderBy('created_at', 'DESC')->get();
															}
													}
													else{
															if ($bajoinforme1){
																		$informes = $informes->where(function ($query) {  $query->where('estudio',1)->orWhere('apartamento',1)->orWhere('piso',1)->orWhere('bajo',1); })   ->orderBy('created_at', 'DESC')->get();
															}
															else{									
																		$informes = $informes->where(function ($query) {  $query->where('estudio',1)->orWhere('apartamento',1)->orWhere('piso',1); })   ->orderBy('created_at', 'DESC')->get();
															}
													}									
											}
									}
									else{
											if ($chaletinforme1){
													if ($aticoinforme1){
															if ($bajoinforme1){
																		$informes = $informes->where(function ($query) {  $query->where('estudio',1)->orWhere('apartamento',1)->orWhere('chalet',1)->orWhere('atico',1)->orWhere('bajo',1); })   ->orderBy('created_at', 'DESC')->get();
															}
															else{									
																		$informes = $informes->where(function ($query) {  $query->where('estudio',1)->orWhere('apartamento',1)->orWhere('chalet',1)->orWhere('atico',1); })   ->orderBy('created_at', 'DESC')->get();
															}
													}
													else{
															if ($bajoinforme1){
																		$informes = $informes->where(function ($query) {  $query->where('estudio',1)->orWhere('apartamento',1)->orWhere('chalet',1)->orWhere('bajo',1); })   ->orderBy('created_at', 'DESC')->get();
															}
															else{									
																		$informes = $informes->where(function ($query) {  $query->where('estudio',1)->orWhere('apartamento',1)->orWhere('chalet',1); })   ->orderBy('created_at', 'DESC')->get();
															}
													}
											}
											else{
													if ($aticoinforme1){
															if ($bajoinforme1){
																		$informes = $informes->where(function ($query) {  $query->where('estudio',1)->orWhere('apartamento',1)->orWhere('atico',1)->orWhere('bajo',1); })   ->orderBy('created_at', 'DESC')->get();
															}
															else{									
																		$informes = $informes->where(function ($query) {  $query->where('estudio',1)->orWhere('apartamento',1)->orWhere('atico',1); })   ->orderBy('created_at', 'DESC')->get();
															}
													}
													else{
															if ($bajoinforme1){
																		$informes = $informes->where(function ($query) {  $query->where('estudio',1)->orWhere('apartamento',1)->orWhere('bajo',1); })   ->orderBy('created_at', 'DESC')->get();
															}
															else{									
																		$informes = $informes->where(function ($query) {  $query->where('estudio',1)->orWhere('apartamento',1); })   ->orderBy('created_at', 'DESC')->get();
															}
													}									
											}							
									}									
							}
							else{
									if ($pisoinforme1){
											if ($chaletinforme1){
													if ($aticoinforme1){
															if ($bajoinforme1){
																		$informes = $informes->where(function ($query) {  $query->where('estudio',1)->orWhere('piso',1)->orWhere('chalet',1)->orWhere('atico',1)->orWhere('bajo',1); })   ->orderBy('created_at', 'DESC')->get();
															}
															else{									
																		$informes = $informes->where(function ($query) {  $query->where('estudio',1)->orWhere('piso',1)->orWhere('chalet',1)->orWhere('atico',1); })   ->orderBy('created_at', 'DESC')->get();
															}
													}
													else{
															if ($bajoinforme1){
																		$informes = $informes->where(function ($query) {  $query->where('estudio',1)->orWhere('piso',1)->orWhere('chalet',1)->orWhere('bajo',1); })   ->orderBy('created_at', 'DESC')->get();
															}
															else{									
																		$informes = $informes->where(function ($query) {  $query->where('estudio',1)->orWhere('piso',1)->orWhere('chalet',1); })   ->orderBy('created_at', 'DESC')->get();
															}
													}
											}
											else{
													if ($aticoinforme1){
															if ($bajoinforme1){
																		$informes = $informes->where(function ($query) {  $query->where('estudio',1)->orWhere('piso',1)->orWhere('atico',1)->orWhere('bajo',1); })   ->orderBy('created_at', 'DESC')->get();
															}
															else{									
																		$informes = $informes->where(function ($query) {  $query->where('estudio',1)->orWhere('piso',1)->orWhere('atico',1); })   ->orderBy('created_at', 'DESC')->get();
															}
													}
													else{
															if ($bajoinforme1){
																		$informes = $informes->where(function ($query) {  $query->where('estudio',1)->orWhere('piso',1)->orWhere('bajo',1); })   ->orderBy('created_at', 'DESC')->get();
															}
															else{									
																		$informes = $informes->where(function ($query) {  $query->where('estudio',1)->orWhere('piso',1); })   ->orderBy('created_at', 'DESC')->get();
															}
													}									
											}
									}
									else{
											if ($chaletinforme1){
													if ($aticoinforme1){
															if ($bajoinforme1){
																		$informes = $informes->where(function ($query) {  $query->where('estudio',1)->orWhere('chalet',1)->orWhere('atico',1)->orWhere('bajo',1); })   ->orderBy('created_at', 'DESC')->get();
															}
															else{									
																		$informes = $informes->where(function ($query) {  $query->where('estudio',1)->orWhere('chalet',1)->orWhere('atico',1); })   ->orderBy('created_at', 'DESC')->get();
															}
													}
													else{
															if ($bajoinforme1){
																		$informes = $informes->where(function ($query) {  $query->where('estudio',1)->orWhere('chalet',1)->orWhere('bajo',1); })   ->orderBy('created_at', 'DESC')->get();
															}
															else{									
																		$informes = $informes->where(function ($query) {  $query->where('estudio',1)->orWhere('chalet',1); })   ->orderBy('created_at', 'DESC')->get();
															}
													}
											}
											else{
													if ($aticoinforme1){
															if ($bajoinforme1){
																		$informes = $informes->where(function ($query) {  $query->where('estudio',1)->orWhere('atico',1)->orWhere('bajo',1); })   ->orderBy('created_at', 'DESC')->get();
															}
															else{									
																		$informes = $informes->where(function ($query) {  $query->where('estudio',1)->orWhere('atico',1); })   ->orderBy('created_at', 'DESC')->get();
															}
													}
													else{
															if ($bajoinforme1){
																		$informes = $informes->where(function ($query) {  $query->where('estudio',1)->orWhere('bajo',1); })   ->orderBy('created_at', 'DESC')->get();
															}
															else{									
																		$informes = $informes->where(function ($query) {  $query->where('estudio',1); })   ->orderBy('created_at', 'DESC')->get();
															}
													}									
											}							
									}						
							}				
					}					
			}
			else{
					if ($loftinforme1){
							if ($apartamentoinforme1){
									if ($pisoinforme1){
											if ($chaletinforme1){
													if ($aticoinforme1){
															if ($bajoinforme1){
																		$informes = $informes->where(function ($query) {  $query->where('loft',1)->orWhere('apartamento',1)->orWhere('piso',1)->orWhere('chalet',1)->orWhere('atico',1)->orWhere('bajo',1); })   ->orderBy('created_at', 'DESC')->get();
															}
															else{									
																		$informes = $informes->where(function ($query) {  $query->where('loft',1)->orWhere('apartamento',1)->orWhere('piso',1)->orWhere('chalet',1)->orWhere('atico',1); })   ->orderBy('created_at', 'DESC')->get();
															}
													}
													else{
															if ($bajoinforme1){
																		$informes = $informes->where(function ($query) {  $query->where('loft',1)->orWhere('apartamento',1)->orWhere('piso',1)->orWhere('chalet',1)->orWhere('bajo',1); })   ->orderBy('created_at', 'DESC')->get();
															}
															else{									
																		$informes = $informes->where(function ($query) {  $query->where('loft',1)->orWhere('apartamento',1)->orWhere('piso',1)->orWhere('chalet',1); })   ->orderBy('created_at', 'DESC')->get();
															}
													}
											}
											else{
													if ($aticoinforme1){
															if ($bajoinforme1){
																		$informes = $informes->where(function ($query) {  $query->where('loft',1)->orWhere('apartamento',1)->orWhere('piso',1)->orWhere('atico',1)->orWhere('bajo',1); })   ->orderBy('created_at', 'DESC')->get();
															}
															else{									
																		$informes = $informes->where(function ($query) {  $query->where('loft',1)->orWhere('apartamento',1)->orWhere('piso',1)->orWhere('atico',1); })   ->orderBy('created_at', 'DESC')->get();
															}
													}
													else{
															if ($bajoinforme1){
																		$informes = $informes->where(function ($query) {  $query->where('loft',1)->orWhere('apartamento',1)->orWhere('piso',1)->orWhere('bajo',1); })   ->orderBy('created_at', 'DESC')->get();
															}
															else{									
																		$informes = $informes->where(function ($query) {  $query->where('loft',1)->orWhere('apartamento',1)->orWhere('piso',1); })   ->orderBy('created_at', 'DESC')->get();
															}
													}									
											}
									}
									else{
											if ($chaletinforme1){
													if ($aticoinforme1){
															if ($bajoinforme1){
																		$informes = $informes->where(function ($query) {  $query->where('loft',1)->orWhere('apartamento',1)->orWhere('chalet',1)->orWhere('atico',1)->orWhere('bajo',1); })   ->orderBy('created_at', 'DESC')->get();
															}
															else{									
																		$informes = $informes->where(function ($query) {  $query->where('loft',1)->orWhere('apartamento',1)->orWhere('chalet',1)->orWhere('atico',1); })   ->orderBy('created_at', 'DESC')->get();
															}
													}
													else{
															if ($bajoinforme1){
																		$informes = $informes->where(function ($query) {  $query->where('loft',1)->orWhere('apartamento',1)->orWhere('chalet',1)->orWhere('bajo',1); })   ->orderBy('created_at', 'DESC')->get();
															}
															else{									
																		$informes = $informes->where(function ($query) {  $query->where('loft',1)->orWhere('apartamento',1)->orWhere('chalet',1); })   ->orderBy('created_at', 'DESC')->get();
															}
													}
											}
											else{
													if ($aticoinforme1){
															if ($bajoinforme1){
																		$informes = $informes->where(function ($query) {  $query->where('loft',1)->orWhere('apartamento',1)->orWhere('atico',1)->orWhere('bajo',1); })   ->orderBy('created_at', 'DESC')->get();
															}
															else{									
																		$informes = $informes->where(function ($query) {  $query->where('loft',1)->orWhere('apartamento',1)->orWhere('atico',1); })   ->orderBy('created_at', 'DESC')->get();
															}
													}
													else{
															if ($bajoinforme1){
																		$informes = $informes->where(function ($query) {  $query->where('loft',1)->orWhere('apartamento',1)->orWhere('bajo',1); })   ->orderBy('created_at', 'DESC')->get();
															}
															else{									
																		$informes = $informes->where(function ($query) {  $query->where('loft',1)->orWhere('apartamento',1); })   ->orderBy('created_at', 'DESC')->get();
															}
													}									
											}							
									}									
							}
							else{
									if ($pisoinforme1){
											if ($chaletinforme1){
													if ($aticoinforme1){
															if ($bajoinforme1){
																		$informes = $informes->where(function ($query) {  $query->where('loft',1)->orWhere('piso',1)->orWhere('chalet',1)->orWhere('atico',1)->orWhere('bajo',1); })   ->orderBy('created_at', 'DESC')->get();
															}
															else{									
																		$informes = $informes->where(function ($query) {  $query->where('loft',1)->orWhere('piso',1)->orWhere('chalet',1)->orWhere('atico',1); })   ->orderBy('created_at', 'DESC')->get();
															}
													}
													else{
															if ($bajoinforme1){
																		$informes = $informes->where(function ($query) {  $query->where('loft',1)->orWhere('piso',1)->orWhere('chalet',1)->orWhere('bajo',1); })   ->orderBy('created_at', 'DESC')->get();
															}
															else{									
																		$informes = $informes->where(function ($query) {  $query->where('loft',1)->orWhere('piso',1)->orWhere('chalet',1); })   ->orderBy('created_at', 'DESC')->get();
															}
													}
											}
											else{
													if ($aticoinforme1){
															if ($bajoinforme1){
																		$informes = $informes->where(function ($query) {  $query->where('loft',1)->orWhere('piso',1)->orWhere('atico',1)->orWhere('bajo',1); })   ->orderBy('created_at', 'DESC')->get();
															}
															else{									
																		$informes = $informes->where(function ($query) {  $query->where('loft',1)->orWhere('piso',1)->orWhere('atico',1); })   ->orderBy('created_at', 'DESC')->get();
															}
													}
													else{
															if ($bajoinforme1){
																		$informes = $informes->where(function ($query) {  $query->where('loft',1)->orWhere('piso',1)->orWhere('bajo',1); })   ->orderBy('created_at', 'DESC')->get();
															}
															else{									
																		$informes = $informes->where(function ($query) {  $query->where('loft',1)->orWhere('piso',1); })   ->orderBy('created_at', 'DESC')->get();
															}
													}									
											}
									}
									else{
											if ($chaletinforme1){
													if ($aticoinforme1){
															if ($bajoinforme1){
																		$informes = $informes->where(function ($query) {  $query->where('loft',1)->orWhere('chalet',1)->orWhere('atico',1)->orWhere('bajo',1); })   ->orderBy('created_at', 'DESC')->get();
															}
															else{									
																		$informes = $informes->where(function ($query) {  $query->where('loft',1)->orWhere('chalet',1)->orWhere('atico',1); })   ->orderBy('created_at', 'DESC')->get();
															}
													}
													else{
															if ($bajoinforme1){
																		$informes = $informes->where(function ($query) {  $query->where('loft',1)->orWhere('chalet',1)->orWhere('bajo',1); })   ->orderBy('created_at', 'DESC')->get();
															}
															else{									
																		$informes = $informes->where(function ($query) {  $query->where('loft',1)->orWhere('chalet',1); })   ->orderBy('created_at', 'DESC')->get();
															}
													}
											}
											else{
													if ($aticoinforme1){
															if ($bajoinforme1){
																		$informes = $informes->where(function ($query) {  $query->where('loft',1)->orWhere('atico',1)->orWhere('bajo',1); })   ->orderBy('created_at', 'DESC')->get();
															}
															else{									
																		$informes = $informes->where(function ($query) {  $query->where('loft',1)->orWhere('atico',1); })   ->orderBy('created_at', 'DESC')->get();
															}
													}
													else{
															if ($bajoinforme1){
																		$informes = $informes->where(function ($query) {  $query->where('loft',1)->orWhere('bajo',1); })   ->orderBy('created_at', 'DESC')->get();
															}
															else{									
																		$informes = $informes->where(function ($query) {  $query->where('loft',1); })   ->orderBy('created_at', 'DESC')->get();
															}
													}									
											}							
									}						
							}	
					}
					else{
							if ($apartamentoinforme1){
									if ($pisoinforme1){
											if ($chaletinforme1){
													if ($aticoinforme1){
															if ($bajoinforme1){
																		$informes = $informes->where(function ($query) {  $query->where('apartamento',1)->orWhere('piso',1)->orWhere('chalet',1)->orWhere('atico',1)->orWhere('bajo',1); })   ->orderBy('created_at', 'DESC')->get();
															}
															else{									
																		$informes = $informes->where(function ($query) {  $query->where('apartamento',1)->orWhere('piso',1)->orWhere('chalet',1)->orWhere('atico',1); })   ->orderBy('created_at', 'DESC')->get();
															}
													}
													else{
															if ($bajoinforme1){
																		$informes = $informes->where(function ($query) {  $query->where('apartamento',1)->orWhere('piso',1)->orWhere('chalet',1)->orWhere('bajo',1); })   ->orderBy('created_at', 'DESC')->get();
															}
															else{									
																		$informes = $informes->where(function ($query) {  $query->where('apartamento',1)->orWhere('piso',1)->orWhere('chalet',1); })   ->orderBy('created_at', 'DESC')->get();
															}
													}
											}
											else{
													if ($aticoinforme1){
															if ($bajoinforme1){
																		$informes = $informes->where(function ($query) {  $query->where('apartamento',1)->orWhere('piso',1)->orWhere('atico',1)->orWhere('bajo',1); })   ->orderBy('created_at', 'DESC')->get();
															}
															else{									
																		$informes = $informes->where(function ($query) {  $query->where('apartamento',1)->orWhere('piso',1)->orWhere('atico',1); })   ->orderBy('created_at', 'DESC')->get();
															}
													}
													else{
															if ($bajoinforme1){
																		$informes = $informes->where(function ($query) {  $query->where('apartamento',1)->orWhere('piso',1)->orWhere('bajo',1); })   ->orderBy('created_at', 'DESC')->get();
															}
															else{									
																		$informes = $informes->where(function ($query) {  $query->where('apartamento',1)->orWhere('piso',1); })   ->orderBy('created_at', 'DESC')->get();
															}
													}									
											}
									}
									else{
											if ($chaletinforme1){
													if ($aticoinforme1){
															if ($bajoinforme1){
																		$informes = $informes->where(function ($query) {  $query->where('apartamento',1)->orWhere('chalet',1)->orWhere('atico',1)->orWhere('bajo',1); })   ->orderBy('created_at', 'DESC')->get();
															}
															else{									
																		$informes = $informes->where(function ($query) {  $query->where('apartamento',1)->orWhere('chalet',1)->orWhere('atico',1); })   ->orderBy('created_at', 'DESC')->get();
															}
													}
													else{
															if ($bajoinforme1){
																		$informes = $informes->where(function ($query) {  $query->where('apartamento',1)->orWhere('chalet',1)->orWhere('bajo',1); })   ->orderBy('created_at', 'DESC')->get();
															}
															else{									
																		$informes = $informes->where(function ($query) {  $query->where('apartamento',1)->orWhere('chalet',1); })   ->orderBy('created_at', 'DESC')->get();
															}
													}
											}
											else{
													if ($aticoinforme1){
															if ($bajoinforme1){
																		$informes = $informes->where(function ($query) {  $query->where('apartamento',1)->orWhere('atico',1)->orWhere('bajo',1); })   ->orderBy('created_at', 'DESC')->get();
															}
															else{									
																		$informes = $informes->where(function ($query) {  $query->where('apartamento',1)->orWhere('atico',1); })   ->orderBy('created_at', 'DESC')->get();
															}
													}
													else{
															if ($bajoinforme1){
																		$informes = $informes->where(function ($query) {  $query->where('apartamento',1)->orWhere('bajo',1); })   ->orderBy('created_at', 'DESC')->get();
															}
															else{									
																		$informes = $informes->where(function ($query) {  $query->where('apartamento',1); })   ->orderBy('created_at', 'DESC')->get();
															}
													}									
											}							
									}									
							}
							else{
									if ($pisoinforme1){
											if ($chaletinforme1){
													if ($aticoinforme1){
															if ($bajoinforme1){
																		$informes = $informes->where(function ($query) {  $query->where('piso',1)->orWhere('chalet',1)->orWhere('atico',1)->orWhere('bajo',1); })   ->orderBy('created_at', 'DESC')->get();
															}
															else{									
																		$informes = $informes->where(function ($query) {  $query->where('piso',1)->orWhere('chalet',1)->orWhere('atico',1); })   ->orderBy('created_at', 'DESC')->get();
															}
													}
													else{
															if ($bajoinforme1){
																		$informes = $informes->where(function ($query) {  $query->where('piso',1)->orWhere('chalet',1)->orWhere('bajo',1); })   ->orderBy('created_at', 'DESC')->get();
															}
															else{									
																		$informes = $informes->where(function ($query) {  $query->where('piso',1)->orWhere('chalet',1); })   ->orderBy('created_at', 'DESC')->get();
															}
													}
											}
											else{
													if ($aticoinforme1){
															if ($bajoinforme1){
																		$informes = $informes->where(function ($query) {  $query->where('piso',1)->orWhere('atico',1)->orWhere('bajo',1); })   ->orderBy('created_at', 'DESC')->get();
															}
															else{									
																		$informes = $informes->where(function ($query) {  $query->where('piso',1)->orWhere('atico',1); })   ->orderBy('created_at', 'DESC')->get();
															}
													}
													else{
															if ($bajoinforme1){
																		$informes = $informes->where(function ($query) {  $query->where('piso',1)->orWhere('bajo',1); })   ->orderBy('created_at', 'DESC')->get();
															}
															else{									
																		$informes = $informes->where(function ($query) {  $query->where('piso',1); })   ->orderBy('created_at', 'DESC')->get();
															}
													}									
											}
									}
									else{
											if ($chaletinforme1){
													if ($aticoinforme1){
															if ($bajoinforme1){
																		$informes = $informes->where(function ($query) {  $query->where('chalet',1)->orWhere('atico',1)->orWhere('bajo',1); })   ->orderBy('created_at', 'DESC')->get();
															}
															else{									
																		$informes = $informes->where(function ($query) {  $query->where('chalet',1)->orWhere('atico',1); })   ->orderBy('created_at', 'DESC')->get();
															}
													}
													else{
															if ($bajoinforme1){
																		$informes = $informes->where(function ($query) {  $query->where('chalet',1)->orWhere('bajo',1); })   ->orderBy('created_at', 'DESC')->get();
															}
															else{									
																		$informes = $informes->where(function ($query) {  $query->where('chalet',1); })   ->orderBy('created_at', 'DESC')->get();
															}
													}
											}
											else{
													if ($aticoinforme1){
															if ($bajoinforme1){
																		$informes = $informes->where(function ($query) {  $query->where('atico',1)->orWhere('bajo',1); })   ->orderBy('created_at', 'DESC')->get();
															}
															else{									
																		$informes = $informes->where(function ($query) {  $query->where('atico',1); })   ->orderBy('created_at', 'DESC')->get();
															}
													}
													else{
															if ($bajoinforme1){
																//esto $informes = $informes = $informes->where(function ($query) {  $query->where(function ($query) {  $query-> sustituye a $infotmes->
																		$informes = $informes->where(function ($query) {  $query->where('bajo',1); })   ->orderBy('created_at', 'DESC')->get();
																		// })   ->orderBy('created_at', 'DESC')->get();
															}
															else{									
																
															}
													}									
											}							
									}						
							}
					}	
			}
		}							
		else{
		
		//PONER ESTO
			$informes = $informes->orderBy('created_at', 'DESC')->get();
		}
		
		
		
		
		
        return response()->json($informes);

    }
}
	
