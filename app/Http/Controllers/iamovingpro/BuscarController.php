<?php

namespace App\Http\Controllers\iamovingpro;

use App\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use App\Ciudad;

class BuscarController extends Controller
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
        

        return view('iamovingpro.buscar.index', compact('data','category','max','city','cityId'));
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
        $piesas = $request->piesas;
        $hasPlusFive = in_array('+5', $piesas) || in_array('5', $piesas); // soporta ambos formatos
        $otherNumbers = array_filter($piesas, function($v) {
            return $v !== '+5' && $v !== '5';
        });

        $informes->where(function($query) use ($otherNumbers, $hasPlusFive) {
            if (!empty($otherNumbers)) {
                $query->whereIn('bedrooms', $otherNumbers);
            }
            if ($hasPlusFive) {
                if (!empty($otherNumbers)) {
                    $query->orWhere('bedrooms', '>=', 5);
                } else {
                    $query->where('bedrooms', '>=', 5);
                }
            }
        });
    }
}

if($request->has('numerosBanos') && count($request->numerosBanos)> 0){
    if($request->tipoinmueble == 'Pisos y casas' || $request->tipoinmueble == 'Habitaciones') {
        $banos = $request->numerosBanos;
        $hasPlusFive = in_array('+5', $banos) || in_array('5', $banos);
        $otherNumbers = array_filter($banos, function($v) {
            return $v !== '+5' && $v !== '5';
        });

        $informes->where(function($query) use ($otherNumbers, $hasPlusFive) {
            if (!empty($otherNumbers)) {
                $query->whereIn('bathrooms', $otherNumbers);
            }
            if ($hasPlusFive) {
                if (!empty($otherNumbers)) {
                    $query->orWhere('bathrooms', '>=', 5);
                } else {
                    $query->where('bathrooms', '>=', 5);
                }
            }
        });
    }
}

// Busca el bloque donde se procesan los tipos de vivienda y reemplázalo con:

if($request->has('furnished_types') && count($request->furnished_types)> 0){
    if($request->tipoinmueble == 'Pisos y casas' || $request->tipoinmueble == 'Habitaciones') {
        $informes->where(function($query) use ($request) {
            $types = $request->furnished_types;
            
            // Mapear los valores del checkbox a los campos de la base de datos
            $fieldMap = [
                'estudio' => 'estudio',
                'loft' => 'loft',
                'apartamento' => 'apartamento',
                'piso' => 'piso',
                'chalet' => 'chalet',
                'casa' => 'casa', // <-- NUEVO
                'atico' => 'atico',
                'bajo' => 'bajo',
                'dúplex' => 'duplex',  // AÑADIR DÚPLEX
                'duplex' => 'duplex'   // También por si viene sin acento
            ];
            
            foreach($types as $type) {
                $key = strtolower(trim($type));
                if(isset($fieldMap[$key])) {
                    $query->orWhere($fieldMap[$key], 1);
                }
            }
        });
    }
}
		


		

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
            if($a == "Patio"){
                $informes->where('patio',1);   
            }
            if($a == "Tendedero"){
                $informes->where('tenderos',1);   
            }
            if($a == "Ventana climalit"){
                $informes->where('ventana_climalit',1);   
            }
            if($a == "Interior"){
                $informes->where('interior',1);   
            }
        }
        // TODOS
        if($a == "Aire acondicionado"){
            $informes->where('aire_acondicionado',1);   
        }
        if($a == "Ascensor"){
            $informes->where('lift',1);   
        }
        if($a == "Exterior"){
            $informes->where('exterior',1);   
        }
        if($request->tipoinmueble == 'Local/Oficina') {
            if($a == "Interior"){
                $informes->where('interior',1);   
            }
        }
        // Solo Local/Oficina
        if($request->tipoinmueble == 'Local/Oficina') {                
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

		//Esto sustituye lo de arriba. Lo de arriba si cogía más de uno descartaba los dos		
if($request->has('heating') && count($request->heating)> 0){
    $informes->whereIn('calefaccion',$request->heating);  
}

		//Esto sustituye lo de arriba. Lo de arriba si cogía más de uno descartaba los dos	
if($request->has('calderaAgua') && count($request->calderaAgua)> 0){
    $informes->whereIn('calentador_agua',$request->calderaAgua);  
}
        

        
        if($request->has('contract') && $request->contract!=''){
            $informes->where('contrato','<=',$request->contract); 
        }


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
            if($b == "Trastero incluido"){
                $informes->where('testero_incluido',1);   
            }
        }   
    }
}

// Aplicar orden según el parámetro recibido
// Aplicar orden según el parámetro recibido
$order = $request->input('order', 'relevance');
switch ($order) {
    case 'cheap':      $informes->orderBy('propiedad_precio', 'asc'); break;
    case 'expensive':  $informes->orderBy('propiedad_precio', 'desc'); break;
    case 'small':      $informes->orderBy('square_meters', 'asc'); break;
    case 'large':      $informes->orderBy('square_meters', 'desc'); break;
    default:           $informes->orderBy('created_at', 'desc'); break;
}

// Ahora ejecutamos la consulta
$informes = $informes->get();
return response()->json($informes);

    }
}