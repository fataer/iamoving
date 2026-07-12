<?php

namespace App\Http\Controllers\Web;

use App\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
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
        if (request()->has('category')) {
            $data  = \App\InformeDetalladoCabecera::where('is_sale', '=', request()->category)
                ->where('published',true)
		->whereIn('estado_inmueble', ['Disponible', 'Reservado','Alquilado','Vendido'])
		->orderBy('id', 'DESC')->get();
            foreach ($data as $i => $d) {
                $image = $d->path_image_primary;
                $fileWithoutExtension = explode('.',$image)[0];
                //$data[$i]->path_image_primary = $fileWithoutExtension . "_444x250.jpg";
				$data[$i]->path_image_primary = $fileWithoutExtension;
            }
            $max = \App\InformeDetalladoCabecera::where('is_sale', '=', request()->category)->max('propiedad_precio');           
        }
        $category=request()->category;


        return view('web.search.index', compact('data','category','max'));
    }
    
    public function searchFilters(Request $request, $category) {
        $informes = \App\InformeDetalladoCabecera::where('is_sale', '=', $category)
		->where('published',true)
		->whereIn('estado_inmueble', ['Disponible', 'Reservado','Alquilado','Vendido']);

        if($request->has('price') && trim($request->price)!=''){
            //$precio = floatval($request->price);
	        $precio = str_replace(".", "", $request->price);
            $informes->where('propiedad_precio','<=',$precio);
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
            $informes->whereIn('bedrooms',$request->piesas);
        }

        if($request->has('numerosBanos') && count($request->numerosBanos)> 0){
            $informes->whereIn('bathrooms',$request->numerosBanos);
        }

        //qualities
        if($request->has('qualities') && count($request->qualities)> 0){
            foreach($request->qualities as $q){
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
            
        }

        if($request->has('estadoInmueble') && count($request->estadoInmueble)> 0){
            foreach($request->estadoInmueble as $e){
                if($e == "Obra nueva"){
                    $informes->where('propiedad_estado',"Obra nueva");        
                }
                //if($e == "Antigüedad hasta 10 años"){
                if($e == "Obra con menos de 10 años"){
                    $informes->where('propiedad_estado',"Antigüedad hasta 10 años");        
                }
                if($e == "Reformado a estrenar"){ 
                    $informes->where('propiedad_estado',"Reformado a estrenar");        
                }
                if($e == "Reformado hace menos de 10 años"){
                    //$informes->where('propiedad_estado',"Ha sido reformado a menos de 10 años");        
                    $informes->where('propiedad_estado','LIKE', "%Ha sido reformado%");
                }
                if($e == "Obra o reformado hace más de 10 años"){
                    $informes->where('propiedad_estado','LIKE', "%Reformado o antig%");        
                }
            }
        }

        if($request->has('access') && count($request->access)> 0){
            foreach($request->access as $a){
                if($a == "Ascensor"){
                    $informes->where('lift',1);   
                }
                if($a == "Rampas de minusválidos en el portal"){
                    $informes->where('rampa',1);   
                }
                if($a == "Ascensor que entra un carrito de bebé"){
                    $informes->where('bebe_rampa',1);   
                }
                if($a == "Exterior"){
                    $informes->where('exterior',1);   
                }
                if($a == "Interior"){
                    $informes->where('interior',1);   
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

                if($a == "Aire acondicionado"){
                    $informes->where('aire_acondicionado',1);   
                }
            }
        }

        if($request->has('banosIncorporados') && count($request->banosIncorporados)> 0){
            $informes->whereIn('suite',$request->banosIncorporados);
        }

        if($request->has('heating') && count($request->heating)> 0){
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
        }

        if($request->has('calderaAgua') && count($request->calderaAgua)> 0){
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
        }
        
      //  if($request->has('orientacion') && count($request->orientacion)> 0){
    //        $informes->whereIn('orientacion',$request->orientacion);
      //  }

        //if($request->has('banosIncorporadosHab') && count($request->banosIncorporadosHab)> 0){
        //    $informes->whereIn('suite',$request->banosIncorporadosHab);
        //}

        
        if($request->has('contract') && $request->contract!=''){
            $informes->where('contrato',$request->contract); 
        }

        if($request->has('contract') && $request->contract!=''){
            $informes->where('contrato',$request->contract); 
        }

        if($request->has('building') && count($request->building)> 0){
            foreach($request->building as $b){
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

        $informes = $informes->orderBy('id', 'DESC')->get();
        return response()->json($informes);

    }
}
	
