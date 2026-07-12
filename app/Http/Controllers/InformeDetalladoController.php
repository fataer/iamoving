<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{
    InformeDetalladoCabecera,
    InformeDetalladoDetalle,
    Multimedia,
	Transporte
};
use Carbon\Carbon;
use SplFileInfo, File, DB;
use \App\Http\Traits\FileTrait;

class InformeDetalladoController extends Controller
{
    use FileTrait;

    private $folder = "/inmueble";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
         return view('informes.index');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request) 
    {
        
    }

    /**
     * Sums all bedrooms upload to informe_detallado
     *
     * @return \Illuminate\Http\Response
     */
    private function getBedrooms(Request $request) 
    {
        $contadorRooms = 0;
        foreach ($request->bedrooms as $bedroom) {
            if ( $bedroom['size'] > 0 ) {
                 $contadorRooms++;
            }
        }

        foreach ($request->serviceRooms as $serviceRoom) {
            if ( $serviceRoom['size'] > 0 ) {
                $contadorRooms++;
            }
        }
 
        foreach ($request->livingRoomBedrooms as $livingRoomBedrooms) {
            if ( $livingRoomBedrooms['size'] > 0 ) {
                $contadorRooms++;
            }
        }
        
        return $contadorRooms;
    }


    private function getBathrooms(Request $request)
    {
        $contadorServicios=0;
        foreach ($request->bathrooms as $bathroom) {
            if (  $bathroom['size'] > 0 ) {
                $contadorServicios++;
            }
        }
        foreach ($request->bathServices as $bathService) {
            if (  $bathService['size'] > 0 ) {
                $contadorServicios++;
            }
        }
        
        return $contadorServicios;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) 
    {
        DB::beginTransaction();
        
        try {
            $request->merge([
                'livingRoomBedrooms' => json_decode($request->livingRoomBedrooms, true),
                'bathServices' => json_decode($request->bathServices, true),
                'serviceRooms' => json_decode($request->serviceRooms, true),
                'doorFiles' => json_decode($request->doorFiles, true),
                'bathrooms' => json_decode($request->bathrooms, true),
                'restrooms' => json_decode($request->restrooms, true),
                'receiver' => json_decode($request->receiver, true),
                'kitchens' => json_decode($request->kitchens, true),
                'bedrooms' => json_decode($request->bedrooms, true),
                'hallways' => json_decode($request->hallways, true),
                'dealers' => json_decode($request->dealers, true),
                'salons' => json_decode($request->salons, true),
                'isSale' => json_decode($request->isSale, true),
				'tipo_inmueble' => json_decode($request->tipo_inmueble, true),
                'door' => json_decode($request->door, true),
				'garage' => json_decode($request->garage, true),
				'boxroom' => json_decode($request->boxroom, true),
				'facade' => json_decode($request->facade, true),
				'portal' => json_decode($request->portal, true),
				'lift' => json_decode($request->lift, true), //16
				'swimming' => json_decode($request->swimming, true), //17
				'garden' => json_decode($request->garden, true),  //18
				'gym' => json_decode($request->gym, true),    //19
				'sauna' => json_decode($request->sauna, true),  //20
				'sports' => json_decode($request->sports, true),  //21
				'childarea' => json_decode($request->childarea, true),  //22
				'transportes' => json_decode($request->transportes, true), //23
				'place' => json_decode($request->place, true)
            ]);
			$hay_garaje=null;
			$hay_trastero=null;
			$hay_datosedificio=null;
			$hay_barrio=null;
			 $hay_jardin=0;
			 $hay_piscina=0;
			 $hay_gym=0;
			 $hay_sauna=0;
			 $hay_zona_deportiva=0;
			 $hay_zona_infantil=0;
			$file_garaje_insert=$request->garage['files'];
			$file_trastero_insert=$request->boxroom['files'];
			$file_fachada_insert=$request->facade['files'];
			$file_portal_insert=$request->portal['files'];
			$file_ascensor_insert=$request->lift['files'];
			$file_piscina_insert=$request->swimming['files'];
			$file_jardin_insert=$request->garden['files'];
			$file_gimnasio_insert=$request->gym['files'];
			$file_saunas_insert=$request->sauna['files'];
			$file_zona_deportiva_insert=$request->sports['files'];
			$file_zona_infantil_insert=$request->childarea['files'];
			$file_lugar_insert=$request->place['files'];
			
			if ($file_garaje_insert != null){
				$hay_garaje= 1;
			}
			else
			{
					if (empty($request->garage['description']) && empty($request->garage['size']) && empty($request->garage['type']) && empty($request->garage['number']))
					{
					}
					else
					{	
						$hay_garaje= 1;
					}				
			}
			if ($file_trastero_insert  != null){
				$hay_trastero= 1;
			}
			else
			{
					if (empty($request->boxroom['description']) && empty($request->boxroom['size']))
					{
					}
					else
					{	
						$hay_trastero= 1;
					}
			}
			if ($file_garaje_insert != null || $file_trastero_insert  != null || $file_fachada_insert  != null || $file_portal_insert != null || $file_ascensor_insert != null || $file_piscina_insert!=null ||
			$file_jardin_insert!=null || $file_gimnasio_insert!=null || $file_saunas_insert!=null || $file_zona_deportiva_insert!=null || $file_zona_infantil_insert!=null){
				$hay_datosedificio= 1;
			}
			 if ($file_jardin_insert!=null)
			 {
					 $hay_jardin=1;
			 }
			 if ($file_piscina_insert!=null)
			 {
					 $hay_piscina=1;
			 }
			 if ($file_gimnasio_insert!=null)
			 {
					 $hay_gym=1;
			 } 
			 if ($file_saunas_insert!=null)
			 {
					 $hay_sauna=1;
			 } 
			 if ($file_zona_deportiva_insert!=null)
			 {
					 $hay_zona_deportiva=1;
			 } 
			 if ($file_zona_infantil_insert!=null)
			 {
					 $hay_zona_infantil=1;
			 } 			
			$flag_hay_transporte=0;
		   foreach ($request->transportes as $transporte) {
				if ($transporte['type']!=null){
					$flag_hay_transporte=1;
				}
			}
			if ($file_lugar_insert  != null){
				$hay_barrio= 1;
			}			
			else
			{
					if (empty($request->place['barrio']) && empty($request->place['description']) && empty($request->place['description_1']))
					{
					}
					else
					{
						$hay_barrio= 1;
					}
			}
            $informeDetalladoCabecera = InformeDetalladoCabecera::create([

                'is_sale' => !$request->isSale,
				'tipo_inmueble' => $request->tipo_inmueble,
                //'bedrooms' =>$this->getBathrooms($request),
                //'bathrooms' =>$this->getBedrooms($request),
				'hay_garaje' => $hay_garaje,
				'hay_trastero' => $hay_trastero,
				'hay_datosedificio' => $hay_datosedificio,
				'hay_transporte' => $flag_hay_transporte,
				'hay_barrio' => $hay_barrio,
				'user_id' => auth()->user()->id,
				'user_email'=> auth()->user()->email,
				'plazas_garaje'=> empty($request->garage['number'])?0:$request->garage['number'],
				'lavavajillas'=> empty($kitchen['luggage']['dishwasher'])?0:$kitchen['luggage']['dishwasher'],
				'horno'=> empty($kitchen['luggage']['oven'])?0:$kitchen['luggage']['oven'],
				'jardin' => $hay_jardin,
				'piscina' => $hay_piscina,
				'gym' => $hay_gym,
				'sauna' => $hay_sauna,
				'zona_deportiva' => $hay_zona_deportiva,
				'zona_infantil' => $hay_zona_infantil				
				//'plazas_garaje'=> empty($request->garage['number'])?null:$request->garage['number']
            ]);

			//recibidor
			$recibidos=  InformeDetalladoDetalle::create([
				'type'=>10,
				'created_at' => Carbon::now()->format('Y-m-d'),
				'tamano_prox_recibidor' =>  empty($request->receiver['size'])?null:$request->receiver['size'],
				'aparador' => $request->receiver['sideboard'],
				'armario' => $request->receiver['type'],
				'armario_num_puertas'=>$request->receiver['closet'],
				'almacenamiento' => $request->receiver['storage'],
				'sepuede_sacar_algo_mueble_recibidor' => $request->receiver['take'],
				'fk_id_informe_detallado_cabecera' => $informeDetalladoCabecera->id,
				'user_id' => auth()->user()->id
			]); 
            foreach ($request->receiver['files'] as $file) {
                Multimedia::create([
                    'fk_id_informe_detallado_cabecera' => $informeDetalladoCabecera->id,
                    'fk_id_informe_detallado_detalle' => $recibidos->id,
					'foto_session'=>'recibidor_foto',
                    'fotos_detalle' => $this->uploadFile($file, $informeDetalladoCabecera->id),
                    'created_at' => Carbon::now()->format('Y-m-d')
                ]);
            }
			
			//puerta
            $puerta = InformeDetalladoDetalle::create([
                'type'=>11,
				'created_at' => Carbon::now()->format('Y-m-d'),
                'puerta' => $request->door,
				'fk_id_informe_detallado_cabecera' => $informeDetalladoCabecera->id,
				'user_id' => auth()->user()->id
            ]);

            foreach ($request->doorFiles as $file) {
                Multimedia::create([
                    'fk_id_informe_detallado_cabecera' => $informeDetalladoCabecera->id,
                    'fk_id_informe_detallado_detalle' => $puerta->id,
					'foto_session'=>'puerta_foto',
                    'fotos_detalle' => $this->uploadFile($file, $informeDetalladoCabecera->id),
                    'created_at' => Carbon::now()->format('Y-m-d')
                ]);
            }
            			
			//garage
			//$file_garaje_insert=$request->garage['files'];
			if ($file_garaje_insert != null){			
				$garaje=  InformeDetalladoDetalle::create([
					'type'=>12,
					'created_at' => Carbon::now()->format('Y-m-d'),
					'descripcion' => $request->garage['description'],
					'tamano' => empty($request->garage['size'])?null:$request->garage['size'],
					'tipo' => $request->garage['type'],
					'numero'=>empty($request->garage['number'])?null:$request->garage['number'],
					'situacion' => $request->garage['situation'],
					'fk_id_informe_detallado_cabecera' => $informeDetalladoCabecera->id
				]); 

				foreach ($request->garage['files'] as $file) {
					Multimedia::create([
						'fk_id_informe_detallado_cabecera' => $informeDetalladoCabecera->id,
						'fk_id_informe_detallado_detalle' => $garaje->id,
						'foto_session'=>'garaje_foto',
						'fotos_detalle' => $this->uploadFile($file, $informeDetalladoCabecera->id),
						'created_at' => Carbon::now()->format('Y-m-d')
					]);
				}
					
				foreach ($request->garage['videos'] as $file) {
					Multimedia::create([
						'fk_id_informe_detallado_cabecera' => $informeDetalladoCabecera->id,
						'fk_id_informe_detallado_detalle' => $garaje->id,
						'video_session'=>'garaje_video',
						'nota_detalle' => $this->uploadFile($file, $informeDetalladoCabecera->id),
						'created_at' => Carbon::now()->format('Y-m-d')
					]);
				}
			}
			else
			{
					if (empty($request->garage['description']) && empty($request->garage['size']) && empty($request->garage['type']) && empty($request->garage['number']))
					{
					}
					else
					{				
						$garaje=  InformeDetalladoDetalle::create([
							'type'=>12,
							'created_at' => Carbon::now()->format('Y-m-d'),
							'descripcion' => $request->garage['description'],
							'tamano' => empty($request->garage['size'])?null:$request->garage['size'],
							'tipo' => $request->garage['type'],
							'numero'=>empty($request->garage['number'])?null:$request->garage['number'],
							'situacion' => $request->garage['situation'],
							'fk_id_informe_detallado_cabecera' => $informeDetalladoCabecera->id
						]); 			
					}
			}			
			//trastero
			//$file_trastero_insert=$request->boxroom['files'];
			if ($file_trastero_insert != null){				
				$trastero=  InformeDetalladoDetalle::create([
					'type'=>13,
					'created_at' => Carbon::now()->format('Y-m-d'),				
					'descripcion' => $request->boxroom['description'],
					'tamano' => empty($request->boxroom['size'])?null:$request->boxroom['size'],
					'fk_id_informe_detallado_cabecera' => $informeDetalladoCabecera->id
				]); 

				foreach ($request->boxroom['files'] as $file) {
					Multimedia::create([
						'fk_id_informe_detallado_cabecera' => $informeDetalladoCabecera->id,
						'fk_id_informe_detallado_detalle' => $trastero->id,
						'foto_session'=>'trastero_foto',
						'fotos_detalle' => $this->uploadFile($file, $informeDetalladoCabecera->id),
						'created_at' => Carbon::now()->format('Y-m-d')
					]);
				}
					
				foreach ($request->boxroom['videos'] as $file) {
					Multimedia::create([
						'fk_id_informe_detallado_cabecera' => $informeDetalladoCabecera->id,
						'fk_id_informe_detallado_detalle' => $trastero->id,
						'video_session'=>'trastero_video',
						'nota_detalle' => $this->uploadFile($file, $informeDetalladoCabecera->id),
						'created_at' => Carbon::now()->format('Y-m-d')
					]);
				}	
			}
			else
			{
					if (empty($request->boxroom['description']) && empty($request->boxroom['size']))
					{
					}
					else
					{				
						$trastero=  InformeDetalladoDetalle::create([
							'type'=>13,
							'created_at' => Carbon::now()->format('Y-m-d'),				
							'descripcion' => $request->boxroom['description'],
							'tamano' => empty($request->boxroom['size'])?null:$request->boxroom['size'],
							'fk_id_informe_detallado_cabecera' => $informeDetalladoCabecera->id
						]);				
					}					
			}
			//fachada
			//$file_fachada_insert=$request->facade['files'];
			if ($file_fachada_insert != null){				
				$fachada=  InformeDetalladoDetalle::create([
					'type'=>14,
					'created_at' => Carbon::now()->format('Y-m-d'),				
					'descripcion' => $request->facade['description'],
					'fk_id_informe_detallado_cabecera' => $informeDetalladoCabecera->id
				]); 

				foreach ($request->facade['files'] as $file) {
					Multimedia::create([
						'fk_id_informe_detallado_cabecera' => $informeDetalladoCabecera->id,
						'fk_id_informe_detallado_detalle' => $fachada->id,
						'foto_session'=>'fachada_foto',
						'fotos_detalle' => $this->uploadFile($file, $informeDetalladoCabecera->id),
						'created_at' => Carbon::now()->format('Y-m-d')
					]);
				}
					
				foreach ($request->facade['videos'] as $file) {
					Multimedia::create([
						'fk_id_informe_detallado_cabecera' => $informeDetalladoCabecera->id,
						'fk_id_informe_detallado_detalle' => $fachada->id,
						'video_session'=>'fachada_video',
						'nota_detalle' => $this->uploadFile($file, $informeDetalladoCabecera->id),
						'created_at' => Carbon::now()->format('Y-m-d')
					]);
				}	
			}
				
			//portal
			//$file_portal_insert=$request->portal['files'];
			if ($file_portal_insert != null){				
				$portal=  InformeDetalladoDetalle::create([
					'type'=>15,
					'created_at' => Carbon::now()->format('Y-m-d'),				
					'descripcion' => $request->portal['description'],
					'fk_id_informe_detallado_cabecera' => $informeDetalladoCabecera->id
				]); 

				foreach ($request->portal['files'] as $file) {
					Multimedia::create([
						'fk_id_informe_detallado_cabecera' => $informeDetalladoCabecera->id,
						'fk_id_informe_detallado_detalle' => $portal->id,
						'foto_session'=>'portal_foto',
						'fotos_detalle' => $this->uploadFile($file, $informeDetalladoCabecera->id),
						'created_at' => Carbon::now()->format('Y-m-d')
					]);
				}
					
				foreach ($request->portal['videos'] as $file) {
					Multimedia::create([
						'fk_id_informe_detallado_cabecera' => $informeDetalladoCabecera->id,
						'fk_id_informe_detallado_detalle' => $portal->id,
						'video_session'=>'portal_video',
						'nota_detalle' => $this->uploadFile($file, $informeDetalladoCabecera->id),
						'created_at' => Carbon::now()->format('Y-m-d')
					]);
				}	
			}
			//ascensor
			//$file_ascensor_insert=$request->lift['files'];
			if ($file_ascensor_insert != null){				
				$ascensor=  InformeDetalladoDetalle::create([
					'type'=>16,
					'created_at' => Carbon::now()->format('Y-m-d'),				
					'descripcion' => $request->lift['description'],
					'numero'=>empty($request->lift['number'])?null:$request->lift['number'],
					'fk_id_informe_detallado_cabecera' => $informeDetalladoCabecera->id
				]); 

				foreach ($request->lift['files'] as $file) {
					Multimedia::create([
						'fk_id_informe_detallado_cabecera' => $informeDetalladoCabecera->id,
						'fk_id_informe_detallado_detalle' => $ascensor->id,
						'foto_session'=>'ascensor_foto',
						'fotos_detalle' => $this->uploadFile($file, $informeDetalladoCabecera->id),
						'created_at' => Carbon::now()->format('Y-m-d')
					]);
				}
					
				foreach ($request->lift['videos'] as $file) {
					Multimedia::create([
						'fk_id_informe_detallado_cabecera' => $informeDetalladoCabecera->id,
						'fk_id_informe_detallado_detalle' => $ascensor->id,
						'video_session'=>'ascensor_video',
						'nota_detalle' => $this->uploadFile($file, $informeDetalladoCabecera->id),
						'created_at' => Carbon::now()->format('Y-m-d')
					]);
				}	
			}
			//piscina
			//$file_piscina_insert=$request->swimming['files'];
			if ($file_piscina_insert != null){				
				$piscina=  InformeDetalladoDetalle::create([
					'type'=>17,
					'created_at' => Carbon::now()->format('Y-m-d'),				
					'descripcion' => $request->swimming['description'],
					'fk_id_informe_detallado_cabecera' => $informeDetalladoCabecera->id
				]); 

				foreach ($request->swimming['files'] as $file) {
					Multimedia::create([
						'fk_id_informe_detallado_cabecera' => $informeDetalladoCabecera->id,
						'fk_id_informe_detallado_detalle' => $piscina->id,
						'foto_session'=>'piscina_foto',
						'fotos_detalle' => $this->uploadFile($file, $informeDetalladoCabecera->id),
						'created_at' => Carbon::now()->format('Y-m-d')
					]);
				}
					
				foreach ($request->swimming['videos'] as $file) {
					Multimedia::create([
						'fk_id_informe_detallado_cabecera' => $informeDetalladoCabecera->id,
						'fk_id_informe_detallado_detalle' => $piscina->id,
						'video_session'=>'piscina_video',
						'nota_detalle' => $this->uploadFile($file, $informeDetalladoCabecera->id),
						'created_at' => Carbon::now()->format('Y-m-d')
					]);
				}	
			}
			//jardin
			//$file_jardin_insert=$request->garden['files'];
			if ($file_jardin_insert != null){				
				$jardin=  InformeDetalladoDetalle::create([
					'type'=>18,
					'created_at' => Carbon::now()->format('Y-m-d'),				
					'descripcion' => $request->garden['description'],
					'fk_id_informe_detallado_cabecera' => $informeDetalladoCabecera->id
				]); 

				foreach ($request->garden['files'] as $file) {
					Multimedia::create([
						'fk_id_informe_detallado_cabecera' => $informeDetalladoCabecera->id,
						'fk_id_informe_detallado_detalle' => $jardin->id,
						'foto_session'=>'jardin_foto',
						'fotos_detalle' => $this->uploadFile($file, $informeDetalladoCabecera->id),
						'created_at' => Carbon::now()->format('Y-m-d')
					]);
				}
					
				foreach ($request->garden['videos'] as $file) {
					Multimedia::create([
						'fk_id_informe_detallado_cabecera' => $informeDetalladoCabecera->id,
						'fk_id_informe_detallado_detalle' => $jardin->id,
						'video_session'=>'jardin_video',
						'nota_detalle' => $this->uploadFile($file, $informeDetalladoCabecera->id),
						'created_at' => Carbon::now()->format('Y-m-d')
					]);
				}	
			}
			//gimnasio
			//$file_gimnasio_insert=$request->gym['files'];
			if ($file_gimnasio_insert != null){				
				$gimnasio=  InformeDetalladoDetalle::create([
					'type'=>19,
					'created_at' => Carbon::now()->format('Y-m-d'),				
					'descripcion' => $request->gym['description'],
					'fk_id_informe_detallado_cabecera' => $informeDetalladoCabecera->id
				]); 

				foreach ($request->gym['files'] as $file) {
					Multimedia::create([
						'fk_id_informe_detallado_cabecera' => $informeDetalladoCabecera->id,
						'fk_id_informe_detallado_detalle' => $gimnasio->id,
						'foto_session'=>'gimnasio_foto',
						'fotos_detalle' => $this->uploadFile($file, $informeDetalladoCabecera->id),
						'created_at' => Carbon::now()->format('Y-m-d')
					]);
				}
					
				foreach ($request->gym['videos'] as $file) {
					Multimedia::create([
						'fk_id_informe_detallado_cabecera' => $informeDetalladoCabecera->id,
						'fk_id_informe_detallado_detalle' => $gimnasio->id,
						'video_session'=>'gimnasio_video',
						'nota_detalle' => $this->uploadFile($file, $informeDetalladoCabecera->id),
						'created_at' => Carbon::now()->format('Y-m-d')
					]);
				}	
			}
			//saunas
			//$file_saunas_insert=$request->sauna['files'];
			if ($file_saunas_insert != null){				
				$saunas=  InformeDetalladoDetalle::create([
					'type'=>20,
					'created_at' => Carbon::now()->format('Y-m-d'),				
					'descripcion' => $request->sauna['description'],
					'fk_id_informe_detallado_cabecera' => $informeDetalladoCabecera->id
				]); 

				foreach ($request->sauna['files'] as $file) {
					Multimedia::create([
						'fk_id_informe_detallado_cabecera' => $informeDetalladoCabecera->id,
						'fk_id_informe_detallado_detalle' => $saunas->id,
						'foto_session'=>'saunas_foto',
						'fotos_detalle' => $this->uploadFile($file, $informeDetalladoCabecera->id),
						'created_at' => Carbon::now()->format('Y-m-d')
					]);
				}
					
				foreach ($request->sauna['videos'] as $file) {
					Multimedia::create([
						'fk_id_informe_detallado_cabecera' => $informeDetalladoCabecera->id,
						'fk_id_informe_detallado_detalle' => $saunas->id,
						'video_session'=>'saunas_video',
						'nota_detalle' => $this->uploadFile($file, $informeDetalladoCabecera->id),
						'created_at' => Carbon::now()->format('Y-m-d')
					]);
				}	
			}
			//zona_deportiva
			//$file_zona_deportiva_insert=$request->sports['files'];
			if ($file_zona_deportiva_insert != null){				
				$zona_deportiva=  InformeDetalladoDetalle::create([
					'type'=>21,
					'created_at' => Carbon::now()->format('Y-m-d'),				
					'descripcion' => $request->sports['description'],
					'fk_id_informe_detallado_cabecera' => $informeDetalladoCabecera->id
				]); 

				foreach ($request->sports['files'] as $file) {
					Multimedia::create([
						'fk_id_informe_detallado_cabecera' => $informeDetalladoCabecera->id,
						'fk_id_informe_detallado_detalle' => $zona_deportiva->id,
						'foto_session'=>'zona_deportiva_foto',
						'fotos_detalle' => $this->uploadFile($file, $informeDetalladoCabecera->id),
						'created_at' => Carbon::now()->format('Y-m-d')
					]);
				}
					
				foreach ($request->sports['videos'] as $file) {
					Multimedia::create([
						'fk_id_informe_detallado_cabecera' => $informeDetalladoCabecera->id,
						'fk_id_informe_detallado_detalle' => $zona_deportiva->id,
						'video_session'=>'zona_deportiva_video',
						'nota_detalle' => $this->uploadFile($file, $informeDetalladoCabecera->id),
						'created_at' => Carbon::now()->format('Y-m-d')
					]);
				}	
			}
			//zona_infantil
			//$file_zona_infantil_insert=$request->childarea['files'];
			if ($file_zona_infantil_insert != null){				
				$zona_infantil=  InformeDetalladoDetalle::create([
					'type'=>22,
					'created_at' => Carbon::now()->format('Y-m-d'),				
					'descripcion' => $request->childarea['description'],
					'fk_id_informe_detallado_cabecera' => $informeDetalladoCabecera->id
				]); 

				foreach ($request->childarea['files'] as $file) {
					Multimedia::create([
						'fk_id_informe_detallado_cabecera' => $informeDetalladoCabecera->id,
						'fk_id_informe_detallado_detalle' => $zona_infantil->id,
						'foto_session'=>'zona_infantil_foto',
						'fotos_detalle' => $this->uploadFile($file, $informeDetalladoCabecera->id),
						'created_at' => Carbon::now()->format('Y-m-d')
					]);
				}
					
				foreach ($request->childarea['videos'] as $file) {
					Multimedia::create([
						'fk_id_informe_detallado_cabecera' => $informeDetalladoCabecera->id,
						'fk_id_informe_detallado_detalle' => $zona_infantil->id,
						'video_session'=>'zona_infantil_video',
						'nota_detalle' => $this->uploadFile($file, $informeDetalladoCabecera->id),
						'created_at' => Carbon::now()->format('Y-m-d')
					]);
				}	
			}
		
			   $flag_hay_transporte=0;
			   foreach ($request->transportes as $transporte) {
						if ($transporte['type']!=null){
								InformeDetalladoDetalle::create([
								'type' => 23,
								'tipo_transporte' => $transporte['type'],
								'parada' => $transporte['name'],
								'lineas' => $transporte['lines'],
								'medida' => empty($transporte['measure'])?null:$transporte['measure'],
								'unidad_medida' => $transporte['units'],
								'medio' => $transporte['medio'],
								'fk_id_informe_detallado_cabecera' => $informeDetalladoCabecera->id,
								'user_id' => auth()->user()->id
							]);
							$flag_hay_transporte=1;
						}
			  
				}	
				//}
			//}
			//lugar
			//$file_lugar_insert=$request->place['files'];
			if ($file_lugar_insert != null){				
				$lugar=  InformeDetalladoDetalle::create([
					'type'=>24,
					'created_at' => Carbon::now()->format('Y-m-d'),				
					'lineas' => $request->place['description'],
					'medida' => empty($request->place['measure'])?null:$request->place['measure'],
					'unidad_medida'=>$request->place['units'],
					'medio' => $request->place['medio'],
					'lineas_1' => $request->place['description_1'],
					'medida_1' => empty($request->place['measure_1'])?null:$request->place['measure_1'],
					'unidad_medida_1'=>$request->place['units_1'],
					'medio_1' => $request->place['medio_1'],
					'lineas_2' => $request->place['description_2'],
					'medida_2' => empty($request->place['measure_2'])?null:$request->place['measure_2'],
					'unidad_medida_2'=>$request->place['units_2'],
					'medio_2' => $request->place['medio_2'],
					'lineas_3' => $request->place['description_3'],
					'medida_3' => empty($request->place['measure_3'])?null:$request->place['measure_3'],
					'unidad_medida_3'=>$request->place['units_3'],
					'medio_3' => $request->place['medio_3'],
					'lineas_4' => $request->place['description_4'],
					'medida_4' => empty($request->place['measure_4'])?null:$request->place['measure_4'],
					'unidad_medida_4'=>$request->place['units_4'],
					'medio_4' => $request->place['medio_4'],
					'lineas_5' => $request->place['description_5'],
					'medida_5' => empty($request->place['measure_5'])?null:$request->place['measure_5'],
					'unidad_medida_5'=>$request->place['units_5'],
					'medio_5' => $request->place['medio_5'],
					'lineas_6' => $request->place['description_6'],
					'medida_6' => empty($request->place['measure_6'])?null:$request->place['measure_6'],
					'unidad_medida_6'=>$request->place['units_6'],
					'medio_6' => $request->place['medio_6'],
					'lineas_7' => $request->place['description_7'],
					'medida_7' => empty($request->place['measure_7'])?null:$request->place['measure_7'],
					'unidad_medida_7'=>$request->place['units_7'],
					'medio_7' => $request->place['medio_7'],
					'lineas_8' => $request->place['description_8'],
					'medida_8' => empty($request->place['measure_8'])?null:$request->place['measure_8'],
					'unidad_medida_8'=>$request->place['units_8'],
					'medio_8' => $request->place['medio_8'],
					'lineas_9' => $request->place['description_9'],
					'medida_9' => empty($request->place['measure_9'])?null:$request->place['measure_9'],
					'unidad_medida_9'=>$request->place['units_9'],
					'medio_9' => $request->place['medio_9'],		
					'barrio' => $request->place['barrio'],
					'fk_id_informe_detallado_cabecera' => $informeDetalladoCabecera->id
				]); 

				foreach ($request->place['files'] as $file) {
					Multimedia::create([
						'fk_id_informe_detallado_cabecera' => $informeDetalladoCabecera->id,
						'fk_id_informe_detallado_detalle' => $lugar->id,
						'foto_session'=>'lugar_foto',
						'fotos_detalle' => $this->uploadFile($file, $informeDetalladoCabecera->id),
						'created_at' => Carbon::now()->format('Y-m-d')
					]);
				}
					
				foreach ($request->place['videos'] as $file) {
					Multimedia::create([
						'fk_id_informe_detallado_cabecera' => $informeDetalladoCabecera->id,
						'fk_id_informe_detallado_detalle' => $lugar->id,
						'video_session'=>'lugar_video',
						'nota_detalle' => $this->uploadFile($file, $informeDetalladoCabecera->id),
						'created_at' => Carbon::now()->format('Y-m-d')
					]);
				}	
			}
			else
			{
					if (empty($request->place['barrio']) && empty($request->place['description']) && empty($request->place['description_1']))
					{
					}
					else
					{
						$lugar=  InformeDetalladoDetalle::create([
							'type'=>24,
							'created_at' => Carbon::now()->format('Y-m-d'),				
							'lineas' => $request->place['description'],
							'medida' => empty($request->place['measure'])?null:$request->place['measure'],
							'unidad_medida'=>$request->place['units'],
							'medio' => $request->place['medio'],
							'lineas_1' => $request->place['description_1'],
							'medida_1' => empty($request->place['measure_1'])?null:$request->place['measure_1'],
							'unidad_medida_1'=>$request->place['units_1'],
							'medio_1' => $request->place['medio_1'],
							'lineas_2' => $request->place['description_2'],
							'medida_2' => empty($request->place['measure_2'])?null:$request->place['measure_2'],
							'unidad_medida_2'=>$request->place['units_2'],
							'medio_2' => $request->place['medio_2'],
							'lineas_3' => $request->place['description_3'],
							'medida_3' => empty($request->place['measure_3'])?null:$request->place['measure_3'],
							'unidad_medida_3'=>$request->place['units_3'],
							'medio_3' => $request->place['medio_3'],
							'lineas_4' => $request->place['description_4'],
							'medida_4' => empty($request->place['measure_4'])?null:$request->place['measure_4'],
							'unidad_medida_4'=>$request->place['units_4'],
							'medio_4' => $request->place['medio_4'],
							'lineas_5' => $request->place['description_5'],
							'medida_5' => empty($request->place['measure_5'])?null:$request->place['measure_5'],
							'unidad_medida_5'=>$request->place['units_5'],
							'medio_5' => $request->place['medio_5'],
							'lineas_6' => $request->place['description_6'],
							'medida_6' => empty($request->place['measure_6'])?null:$request->place['measure_6'],
							'unidad_medida_6'=>$request->place['units_6'],
							'medio_6' => $request->place['medio_6'],
							'lineas_7' => $request->place['description_7'],
							'medida_7' => empty($request->place['measure_7'])?null:$request->place['measure_7'],
							'unidad_medida_7'=>$request->place['units_7'],
							'medio_7' => $request->place['medio_7'],
							'lineas_8' => $request->place['description_8'],
							'medida_8' => empty($request->place['measure_8'])?null:$request->place['measure_8'],
							'unidad_medida_8'=>$request->place['units_8'],
							'medio_8' => $request->place['medio_8'],
							'lineas_9' => $request->place['description_9'],
							'medida_9' => empty($request->place['measure_9'])?null:$request->place['measure_9'],
							'unidad_medida_9'=>$request->place['units_9'],
							'medio_9' => $request->place['medio_9'],		
							'barrio' => $request->place['barrio'],
							'fk_id_informe_detallado_cabecera' => $informeDetalladoCabecera->id
						]); 
					}				
			}
			
            // salon
            foreach ($request->salons as $salon) {
                $informeDetalladoDetalle = InformeDetalladoDetalle::create([
                    'type' => 0,
                    'created_at' => Carbon::now()->format('Y-m-d'),
                    'tamano_aproximado_salon' => empty($salon['size'])?null:$salon['size'],
                    'muebles_salon' => json_encode($salon['furniture']['pieceOfFurniture']),
                    'salon_para' => $salon['furniture']['for'],
                    'venta_salon' => $salon['windoww'],
                    'orientacion_salon' => $salon['orientation'],
                    'tipo_ventana_salon' => $salon['typeOfWindow']['windoww'],
                    'pintura_salon' => $salon['painting'],
                    'salon_pared' => $salon['wall'],
                    'tipo_suelo_salon' => $salon['typeOfSoil']['type'],
                    'salon_estrenar_tipo_ventana' => $salon['typeOfWindow']['brandNew'],
                    'salon_cambiado_hace_tipo_ventana' => $salon['typeOfWindow']['changed']['year'].'-'.$salon['typeOfWindow']['changed']['month'],
                    'salon_puesta_hace_tipo_ventana'=> $salon['typeOfWindow']['putting']['year'].'-'.$salon['typeOfWindow']['putting']['month'],
                    'salon_pintuta_cambiada_hace' => $salon['paints']['justPainted']['year'].'-'.$salon['paints']['justPainted']['month'],
                    'salon_tipo_suelo_estrenar' => $salon['typeOfSoil']['brandNew'],
                    'salon_tipo_suelo_cambiado' => $salon['typeOfSoil']['changed']['year'].'-'.$salon['typeOfSoil']['changed']['month'],
                    'salon_tipo_suelo_puesto' => $salon['typeOfSoil']['putting']['year'].'-'.$salon['typeOfSoil']['putting']['month'],
                    // TODO: salon_dormitorios es incorrecto
                    'salon_dormitorio_balcon_m' => $salon['balcony'],
                    'salon_dormitorio_tereza_m' => $salon['terrace'],
							'salon_muebles_sofa' => $salon['muebles']['sofa'],
							'salon_muebles_sofa_cama' => $salon['muebles']['sofa_cama'],
							'salon_muebles_tv' => $salon['muebles']['tv'],
							'salon_muebles_mesa_comedor' => $salon['muebles']['mesa_comedor'],					
                    'aire_condicionado_salon' => $salon['airConditioner'],
                    'sepuede_sacar_algo_mueble_salon' => $salon['take'],
                    'salon_dclimati' => $salon['dclimalit'],
                    'fk_id_informe_detallado_cabecera' => $informeDetalladoCabecera->id,
                    'user_id' => auth()->user()->id
                ]);
                
                foreach ($salon['files'] as $file) {
                    Multimedia::create([
                        'fk_id_informe_detallado_cabecera' => $informeDetalladoCabecera->id,
                        'fk_id_informe_detallado_detalle' => $informeDetalladoDetalle->id,
                        'foto_session'=>'salon_foto',
                        'fotos_detalle' => $this->uploadFile($file, $informeDetalladoCabecera->id),
                        'created_at' => Carbon::now()->format('Y-m-d')
                    ]);
                }
                
                foreach ($salon['videos'] as $file) {
                    Multimedia::create([
                        'fk_id_informe_detallado_cabecera' => $informeDetalladoCabecera->id,
                        'fk_id_informe_detallado_detalle' => $informeDetalladoDetalle->id,
                        'nota_detalle' => $this->uploadFile($file, $informeDetalladoCabecera->id),
                        'video_session'=>'salon_video',
                        'created_at' => Carbon::now()->format('Y-m-d')
                    ]);
                }
            }
            
            foreach ($request->kitchens as $kitchen) {
                $informeDetalladoDetalle = InformeDetalladoDetalle::create([
                    'type' => 1,
                    'created_at' => Carbon::now()->format('Y-m-d'),
                    'tanano_aproximado_cocina' =>  empty($kitchen['size'])?null:$kitchen['size'],
                    'estado_cocina' => $kitchen['state']['state'],
                    'cocina_estado_estrenar' => $kitchen['state']['brandNew'],
                    'cocina_estado_reformada' => $kitchen['state']['reformedAgo']['year'].'-'.$kitchen['state']['reformedAgo']['month'],
                    'tipo_cocina' => $kitchen['typeOfKitchen'],
                    'ventana_cocina' => $kitchen['windoww'],
                    'tipo_ventana_cocina' => $kitchen['typeOfWindow']['windoww'],
                    'cocina_tipo_ventana_estrenar' => $kitchen['typeOfWindow']['brandNew'],
                    'cocina_tipo_ventana_cambiado' => $kitchen['typeOfWindow']['changed']['year'].'-'.$kitchen['typeOfWindow']['changed']['month'],
                    'cocina_tipo_ventana_puesta' => $kitchen['typeOfWindow']['putting']['year'].'-'.$kitchen['typeOfWindow']['putting']['month'],
                    'cocina_balcon_m' => $kitchen['balcony'],
                    'cocina_terreza_m' => $kitchen['terrace'],
                    'cocina_equipaje_extractor' => $kitchen['luggage']['extractor'],
                    'cocina_equipaje_microondas' => $kitchen['luggage']['microwaveOven'],
                    'cocina_equipaje_horno' => $kitchen['luggage']['oven'],
                    'cocina_equipaje_nevera' => $kitchen['luggage']['fridge'],
                    'cocina_equipaje_lavadora' => $kitchen['luggage']['washingMachine'],
                    'cocina_equipaje_secadora' => $kitchen['luggage']['dryer'],
					'cocina_equipaje_lavaseca' => $kitchen['luggage']['washingDryer'],
                    'cocina_equipaje_lavavajillas' => $kitchen['luggage']['dishwasher'],
					'cocina_equipaje_menaje' => $kitchen['luggage']['menaje'],
					'cocina_equipaje_lavadero' => $kitchen['luggage']['lavadero'],
                    'cocina_fuego_vitroceramica' => $kitchen['typeOfFire']['vitroceramica'],
					'cocina_fuego_induccion' => $kitchen['typeOfFire']['induccion'],
                    'cocina_fuego_gas_nuevo' => $kitchen['typeOfFire']['naturalGas'],
                    'cocina_fuego_placa_electronica' => $kitchen['typeOfFire']['electricPlate'],
                    'cocina_fuego_bombonra_gas' => $kitchen['typeOfFire']['dasCylinder'],
                    'tipo_suelo_cocina' => $kitchen['typeOfSoil']['type'],
                    'cocina_tipo_suelo_estrenar' => $kitchen['typeOfSoil']['brandNew'],
                    'cocina_tipo_suelo_cambiado' => $kitchen['typeOfSoil']['changed']['year'].'-'.$kitchen['typeOfSoil']['changed']['month'],
                    'cocina_tipo_suelo_puesto' => $kitchen['typeOfSoil']['putting']['year'].'-'.$kitchen['typeOfSoil']['putting']['month'],
                    'cocina_dclimati' => $kitchen['dclimalit'],
                    'sepuede_sacar_algo_mueble_cocina' => $kitchen['take'],
                    'fk_id_informe_detallado_cabecera' => $informeDetalladoCabecera->id,
                    'user_id' => auth()->user()->id
                ]);
                
                foreach ($kitchen['files'] as $file) {
                    Multimedia::create([
                        'fk_id_informe_detallado_cabecera' => $informeDetalladoCabecera->id,
                        'fk_id_informe_detallado_detalle' => $informeDetalladoDetalle->id,
                        'fotos_detalle' => $this->uploadFile($file, $informeDetalladoCabecera->id),
                        'foto_session'=>'cocina_foto',
                        'created_at' => Carbon::now()->format('Y-m-d')
                    ]);
                }
                
                foreach ($kitchen['videos'] as $file) {
                    Multimedia::create([
                        'fk_id_informe_detallado_cabecera' => $informeDetalladoCabecera->id,
                        'fk_id_informe_detallado_detalle' => $informeDetalladoDetalle->id,
                        'nota_detalle' => $this->uploadFile($file, $informeDetalladoCabecera->id),
                        'video_session'=>'cocina_video',
                        'created_at' => Carbon::now()->format('Y-m-d')
                    ]);
                }
            }
            
            foreach ($request->bedrooms as $bedroom) {
                $informeDetalladoDetalle = InformeDetalladoDetalle::create([
                    'type' => 2,
                    'created_at' => Carbon::now()->format('Y-m-d'),
                    'tamano_aproximado_dormitorio' => empty($bedroom['size'])?null:$bedroom['size'],
                    'tamano_dormitorio' => $bedroom['sizeBedroom'],
                    'tipo_cama_dormitorio' => $bedroom['typeBed'],
					'canape_dormitorio' => $bedroom['canape'],
                    'armarios_dormitorio'=> $bedroom['closet']['closet'],
                    'dormitorio_armarios_dormitorio_puertas' => $bedroom['closet']['doors'],
                    'ventana_dormitorio' => $bedroom['windoww'],
                    'orientacion_dormitorio' => $bedroom['orientation'],
                    'tipo_ventana_dormitorio' => $bedroom['typeOfWindow']['windoww'],
                    'dormitorio_tipo_ventana_estrenar' => $bedroom['typeOfWindow']['brandNew'],
                    'dormitorio_tipo_ventana_cambiado' => $bedroom['typeOfWindow']['changed']['year'].'-'.$bedroom['typeOfWindow']['changed']['month'],
                    'dormitorio_tipo_ventana_puesto' => $bedroom['typeOfWindow']['putting']['year'].'-'.$bedroom['typeOfWindow']['putting']['month'],
                    'dormitorio_balcon_m' => $bedroom['balcony'],
                    'dormitorio_terreza_m' => $bedroom['terrace'],
                    'dormirotio_pared' => $bedroom['wall'],
                    'sepuede_sacar_algo_mueble_dormirorio' => $bedroom['take'],
                    'dormitorio_dclimati' => $bedroom['dclimalit'],
							'dormitorio_muebles_sofa' => $bedroom['muebles']['sofa'],
							'dormitorio_muebles_sofa_cama' => $bedroom['muebles']['sofa_cama'],
							'dormitorio_muebles_tv' => $bedroom['muebles']['tv'],
							'dormitorio_muebles_mesa_comedor' => $bedroom['muebles']['mesa_comedor'],
							'dormitorio_muebles_escritorio' => $bedroom['muebles']['escritorio'],
							'dormitorio_muebles_comoda' => $bedroom['muebles']['comoda'],					
                    'aire_condicionado_dormitorio' => $bedroom['airConditioner'],
                    'pintura_dormitorio' => $bedroom['painting'],
                    'dormitorio_pintura_recien' => $bedroom['paints']['paintedMakes']['year'].'-'.$bedroom['paints']['paintedMakes']['month'],
                    'dormitorio_pintura_recien_pintada' => $bedroom['paints']['justPainted']['year'].'-'.$bedroom['paints']['justPainted']['month'],
                    'dormitorio_pared' => $bedroom['wall'],
                    'tipo_suelo_dormitorio' => $bedroom['typeOfSoil']['type'],
                    'dormitorio_tipo_suelo_estrenar' => $bedroom['typeOfSoil']['brandNew'],
                    'dormitorio_tipo_suelo_cambiado' => $bedroom['typeOfSoil']['changed']['year'].'-'.$bedroom['typeOfSoil']['changed']['month'],
                    'dormitorio_tipo_suelo_puesto' => $bedroom['typeOfSoil']['putting']['year'].'-'.$bedroom['typeOfSoil']['putting']['month'],
                    'en_suite' => $bedroom['suite'],
                    'fk_id_informe_detallado_cabecera' => $informeDetalladoCabecera->id,
                    'user_id' => auth()->user()->id,
                    'precio' => array_key_exists('precio', $bedroom) ?  $bedroom['precio'] : 0,
                ]);
                
                foreach ($bedroom['files'] as $file) {
                    Multimedia::create([
                        'fk_id_informe_detallado_cabecera' => $informeDetalladoCabecera->id,
                        'fk_id_informe_detallado_detalle' => $informeDetalladoDetalle->id,
                        'fotos_detalle' => $this->uploadFile($file, $informeDetalladoCabecera->id),
                        'foto_session'=> 'dormirotio_foto',
                        'created_at' => Carbon::now()->format('Y-m-d')
                    ]);
                }
                
                foreach ($bedroom['videos'] as $file) {
                    Multimedia::create([
                        'fk_id_informe_detallado_cabecera' => $informeDetalladoCabecera->id,
                        'fk_id_informe_detallado_detalle' => $informeDetalladoDetalle->id,
                        'nota_detalle' => $this->uploadFile($file, $informeDetalladoCabecera->id),
                        'video_session'=>'dormirotio_video',
                        'created_at' => Carbon::now()->format('Y-m-d')
                    ]);
                }
            }
            
            foreach ($request->livingRoomBedrooms as $livingRoomBedrooms) {
                $informeDetalladoDetalle = InformeDetalladoDetalle::create([
                    'type' => 3,
                    'created_at' => Carbon::now()->format('Y-m-d'),
                    'tamano_aprox_salon' => empty($livingRoomBedrooms['size'])?null:$livingRoomBedrooms['size'],
                    'muebles_dormitorio_salon' => json_encode($livingRoomBedrooms['furniture']['pieceOfFurniture']),
                    'salon_dormitorio_cuantas_personas' => $livingRoomBedrooms['furniture']['for'],
                    'salon_dormitorio_pared' => $livingRoomBedrooms['wall'],
                    'salon_dormitorio_balcon_m' => $livingRoomBedrooms['balcony'],
                    'salon_dormitorio_tereza_m' => $livingRoomBedrooms['terrace'],
                    'salon_dormitorio_dclimati' => $livingRoomBedrooms['dclimalit'],
                    'sepuede_sacar_algo_mueble_salon_dormitorio' => $livingRoomBedrooms['take'],
                    'ventana_dormitorio_salon' => $livingRoomBedrooms['windoww'],
                    'salon_tipo_ventana_estrenar' => $livingRoomBedrooms['typeOfWindow']['brandNew'],
                    'salon_tipo_ventana_cambiado' => $livingRoomBedrooms['typeOfWindow']['changed']['year'].'-'.$livingRoomBedrooms['typeOfWindow']['changed']['month'],
                    'salon_tipo_ventana_puesto' => $livingRoomBedrooms['typeOfWindow']['putting']['year'].'-'.$livingRoomBedrooms['typeOfWindow']['putting']['month'],
                    'orientacion_dormitorio_salon' => $livingRoomBedrooms['orientation'],
                    'tipo_ventana_dormitorio_salon' => $livingRoomBedrooms['typeOfWindow']['windoww'],
                    'pintura_dormitorio_salon' => $livingRoomBedrooms['painting'],
                    'salon_pintura_recien' => $livingRoomBedrooms['paints']['paintedMakes']['year'].'-'.$livingRoomBedrooms['paints']['paintedMakes']['month'],
                    'salon_pintura_recien_pintada' => $livingRoomBedrooms['paints']['justPainted']['year'].'-'.$livingRoomBedrooms['paints']['justPainted']['month'],
                    'tipo_suelo_dormitorio_salon' => $livingRoomBedrooms['typeOfSoil']['type'],
                    'salon_dormitorio_tipo_suelo_estrenar' => $livingRoomBedrooms['typeOfSoil']['brandNew'],
                    'salon_dormitorio_tipo_suelo_cambiado' => $livingRoomBedrooms['typeOfSoil']['changed']['year'].'-'.$livingRoomBedrooms['typeOfSoil']['changed']['month'],
                    'salon_dormitorio_tipo_suelo_puesto' => $livingRoomBedrooms['typeOfSoil']['putting']['year'].'-'.$livingRoomBedrooms['typeOfSoil']['putting']['month'],  
							'salon_dormitorio_muebles_sofa' => $livingRoomBedrooms['muebles']['sofa'],
							'salon_dormitorio_muebles_sofa_cama' => $livingRoomBedrooms['muebles']['sofa_cama'],
							'salon_dormitorio_muebles_tv' => $livingRoomBedrooms['muebles']['tv'],
							'salon_dormitorio_muebles_mesa_comedor' => $livingRoomBedrooms['muebles']['mesa_comedor'],
							'salon_dormitorio_muebles_escritorio' => $livingRoomBedrooms['muebles']['escritorio'],
							'salon_dormitorio_muebles_comoda' => $livingRoomBedrooms['muebles']['comoda'],					
                    'aire_condicionado_dormitorio_salon' => $livingRoomBedrooms['airConditioner'],
                    'tipo_cama_dormitorio_salon' => $livingRoomBedrooms['typeBed'],
					'canape_dormitorio_salon' => $livingRoomBedrooms['canape'],
                    'armarios_dormitorio_saldon' => $livingRoomBedrooms['closet']['closet'],
                    'salon_dorimitorio_puertas' => $livingRoomBedrooms['closet']['doors'],
                    'fk_id_informe_detallado_cabecera' => $informeDetalladoCabecera->id,
                    'user_id' => auth()->user()->id
                ]);
                
                foreach ($livingRoomBedrooms['files'] as $file) {
                    Multimedia::create([
                        'fk_id_informe_detallado_cabecera' => $informeDetalladoCabecera->id,
                        'fk_id_informe_detallado_detalle' => $informeDetalladoDetalle->id,
                        'fotos_detalle' => $this->uploadFile($file, $informeDetalladoCabecera->id),
                        'foto_session'=>'salon_dormitorio_foto',
                        'created_at' => Carbon::now()->format('Y-m-d')
                    ]);
                }
                
                foreach ($livingRoomBedrooms['videos'] as $file) {
                    Multimedia::create([
                        'fk_id_informe_detallado_cabecera' => $informeDetalladoCabecera->id,
                        'fk_id_informe_detallado_detalle' => $informeDetalladoDetalle->id,
                        'nota_detalle' => $this->uploadFile($file, $informeDetalladoCabecera->id),
                        'video_session'=>'salon_dormitorio_video',
                        'created_at' => Carbon::now()->format('Y-m-d')
                    ]);
                }
            }
            
            foreach ($request->bathrooms as $bathroom) {
                $informeDetalladoDetalle = InformeDetalladoDetalle::create([
                    'type' => 4,
                    'created_at' => Carbon::now()->format('Y-m-d'),
                    'tamano_aprox_banos' => empty($bathroom['size'])?null:$bathroom['size'],
                    'bano_dentro_dormitorio' => $bathroom['bathroomInBedroom'],
                    'banos_suite' => $bathroom['bathroomInBedroom'],
                    'estado_reforma_banos' => $bathroom['reformStatus']['state'],
                    'banos_estado_estrenar' => $bathroom['reformStatus']['brandNew'],
                    'banos_estado_reformada' => $bathroom['reformStatus']['reformedAgo']['year'].'-'.$bathroom['reformStatus']['reformedAgo']['month'],
                    'banos_banera' => $bathroom['bath'],
                    'banos_ducha' => $bathroom['shower'],
                    'banos_bide' => $bathroom['bidet'],
                    'banos_jacuzzi' => $bathroom['jacuzzi'],
                    'bano_dclimati' => $bathroom['dclimalit'],
                    'sepuede_sacar_algo_mueble_bano' => $bathroom['take'],
                    'venta_banos' => $bathroom['windoww'],
                    'tipo_ventana' => $bathroom['typeOfWindow']['windoww'],
                    'bano_tipo_ventana_estrenar' => $bathroom['typeOfWindow']['brandNew'],
                    'bano_tipo_ventana_cambiado' => $bathroom['typeOfWindow']['changed']['year'].'-'.$bathroom['typeOfWindow']['changed']['month'],
                    'bano_tipo_ventana_puesto' => $bathroom['typeOfWindow']['putting']['year'].'-'.$bathroom['typeOfWindow']['putting']['month'],
                    'tipo_suelo_banos' => $bathroom['typeOfSoil']['type'],
                    'bano_tipo_suelo_estrenar' => $bathroom['typeOfSoil']['brandNew'],
                    'bano_tipo_suelo_cambiado' => $bathroom['typeOfSoil']['changed']['year'].'-'.$bathroom['typeOfSoil']['changed']['month'],
                    'bano_tipo_suelo_puesto' => $bathroom['typeOfSoil']['putting']['year'].'-'.$bathroom['typeOfSoil']['putting']['month'],
                    'fk_id_informe_detallado_cabecera' => $informeDetalladoCabecera->id,
                    'user_id' => auth()->user()->id
                ]);
                
                foreach ($bathroom['files'] as $file) {
                    Multimedia::create([
                        'fk_id_informe_detallado_cabecera' => $informeDetalladoCabecera->id,
                        'fk_id_informe_detallado_detalle' => $informeDetalladoDetalle->id,
                        'fotos_detalle' => $this->uploadFile($file, $informeDetalladoCabecera->id),
                        'foto_session'=>'banos_foto',
                        'created_at' => Carbon::now()->format('Y-m-d')
                    ]);
                }
                
                foreach ($bathroom['videos'] as $file) {
                    Multimedia::create([
                        'fk_id_informe_detallado_cabecera' => $informeDetalladoCabecera->id,
                        'fk_id_informe_detallado_detalle' => $informeDetalladoDetalle->id,
                        'nota_detalle' => $this->uploadFile($file, $informeDetalladoCabecera->id),
                        'video_session'=>'banos_video',
                        'created_at' => Carbon::now()->format('Y-m-d')
                    ]);
                }
            }
            
            foreach ($request->restrooms as $restroom) {
                $informeDetalladoDetalle = InformeDetalladoDetalle::create([
                    'type' => 5,
                    'created_at' => Carbon::now()->format('Y-m-d'),
                    'aseo_aprox_pasillo' => empty($restroom['size'])?null:$restroom['size'],
					'sepuede_sacar_algo_mueble_restrooms' => $restroom['take'],
                    'fk_id_informe_detallado_cabecera' => $informeDetalladoCabecera->id,
                    'user_id' => auth()->user()->id
                ]);
                
                foreach ($restroom['files'] as $file) {
                    Multimedia::create([
                        'fk_id_informe_detallado_cabecera' => $informeDetalladoCabecera->id,
                        'fk_id_informe_detallado_detalle' => $informeDetalladoDetalle->id,
                        'fotos_detalle' => $this->uploadFile($file, $informeDetalladoCabecera->id),
                        'foto_session'=>'aseo_foto',
                        'created_at' => Carbon::now()->format('Y-m-d')
                    ]);
                }
                
                foreach ($restroom['videos'] as $file) {
                    Multimedia::create([
                        'fk_id_informe_detallado_cabecera' => $informeDetalladoCabecera->id,
                        'fk_id_informe_detallado_detalle' => $informeDetalladoDetalle->id,
                        'nota_detalle' => $this->uploadFile($file, $informeDetalladoCabecera->id),
                        'video_session'=>'aseo_video',
                        'created_at' => Carbon::now()->format('Y-m-d')
                    ]);
                }
            }
            
            foreach ($request->hallways as $hallway) {
                $informeDetalladoDetalle = InformeDetalladoDetalle::create([
                    'type' => 6,
                    'created_at' => Carbon::now()->format('Y-m-d'),
                    'tamano_aprox_pasillo' => empty($hallway['size'])?null:$hallway['size'],
                    'almacenamiento_pasillo' => $hallway['storage'],
                    'armario_pasillo' => $hallway['closet']['closet'],
                    'pasillo_puertas' => $hallway['closet']['doors'],
                    'sepuede_sacar_algo_mueble_pasillo' => $hallway['take'],
                    'fk_id_informe_detallado_cabecera' => $informeDetalladoCabecera->id,
                    'user_id' => auth()->user()->id
                ]);
                
                foreach ($hallway['files'] as $file) {
                    Multimedia::create([
                        'fk_id_informe_detallado_cabecera' => $informeDetalladoCabecera->id,
                        'fk_id_informe_detallado_detalle' => $informeDetalladoDetalle->id,
                        'fotos_detalle' => $this->uploadFile($file, $informeDetalladoCabecera->id),
                        'foto_session'=>'pasillo_foto',
                        'created_at' => Carbon::now()->format('Y-m-d')
                    ]);
                }
                
                foreach ($hallway['videos'] as $file) {
                    Multimedia::create([
                        'fk_id_informe_detallado_cabecera' => $informeDetalladoCabecera->id,
                        'fk_id_informe_detallado_detalle' => $informeDetalladoDetalle->id,
                        'nota_detalle' => $this->uploadFile($file, $informeDetalladoCabecera->id),
                        'video_session'=>'pasillo_video',
                        'created_at' => Carbon::now()->format('Y-m-d')
                    ]);
                }
            }
            
            foreach ($request->dealers as $dealer) {
                $informeDetalladoDetalle = InformeDetalladoDetalle::create([
                    'type' => 7,
                    'created_at' => Carbon::now()->format('Y-m-d'),
                    'tanano_aprox_distribuidor' => empty($dealer['size'])?null:$dealer['size'],
                    'armarios_distribuidor'=> $dealer['closet']['closet'],
                    'distribuidor_armarios_puertas' => $dealer['closet']['doors'],
                    'sepuede_sacar_algo_mueble_distribuidor' => $dealer['take'],
                    'fk_id_informe_detallado_cabecera' => $informeDetalladoCabecera->id,
                    'user_id' => auth()->user()->id
                ]);
                
                foreach ($dealer['files'] as $file) {
                    Multimedia::create([
                        'fk_id_informe_detallado_cabecera' => $informeDetalladoCabecera->id,
                        'fk_id_informe_detallado_detalle' => $informeDetalladoDetalle->id,
                        'fotos_detalle' => $this->uploadFile($file, $informeDetalladoCabecera->id),
                        'foto_session'=>'distribuidor_foto',
                        'created_at' => Carbon::now()->format('Y-m-d')
                    ]);
                }
        
                foreach ($dealer['videos'] as $file) {
                    Multimedia::create([
                        'fk_id_informe_detallado_cabecera' => $informeDetalladoCabecera->id,
                        'fk_id_informe_detallado_detalle' => $informeDetalladoDetalle->id,
                        'nota_detalle' => $this->uploadFile($file, $informeDetalladoCabecera->id),
                        'video_session'=>'distribuidor_video',
                        'created_at' => Carbon::now()->format('Y-m-d')
                    ]);
                }
            }
            
            foreach ($request->serviceRooms as $serviceRoom) {
                $informeDetalladoDetalle = InformeDetalladoDetalle::create([
                    'type' => 8,
                    'created_at' => Carbon::now()->format('Y-m-d'),
                    'tanano_aprox_habitacion_servicio' => empty($serviceRoom['size'])?null:$serviceRoom['size'],
					'sepuede_sacar_algo_mueble_serviceRooms' => $serviceRoom['take'],
                    'fk_id_informe_detallado_cabecera' => $informeDetalladoCabecera->id,
                    'user_id' => auth()->user()->id
                ]);
                
                foreach ($serviceRoom['files'] as $file) {
                    Multimedia::create([
                        'fk_id_informe_detallado_cabecera' => $informeDetalladoCabecera->id,
                        'fk_id_informe_detallado_detalle' => $informeDetalladoDetalle->id,
                        'fotos_detalle' => $this->uploadFile($file, $informeDetalladoCabecera->id),
                        'foto_session'=>'habitacion_servicio_foto',
                        'created_at' => Carbon::now()->format('Y-m-d')
                    ]);
                }
                
                foreach ($serviceRoom['videos'] as $file) {
                    Multimedia::create([
                        'fk_id_informe_detallado_cabecera' => $informeDetalladoCabecera->id,
                        'fk_id_informe_detallado_detalle' => $informeDetalladoDetalle->id,
                        'nota_detalle' => $this->uploadFile($file, $informeDetalladoCabecera->id),
                        'video_session'=>'habitacion_servicio_video',
                        'created_at' => Carbon::now()->format('Y-m-d')
                    ]);
                }
            }
            
            foreach ($request->bathServices as $bathService) {
                $informeDetalladoDetalle = InformeDetalladoDetalle::create([
                    'type' => 9,
                    'created_at' => Carbon::now()->format('Y-m-d'),
                    'tamano_aprox_bano_servicios' => empty($bathService['size'])?null:$bathService['size'],
					 'sepuede_sacar_algo_mueble_bathServices' => $bathService['take'],
                    'fk_id_informe_detallado_cabecera' => $informeDetalladoCabecera->id,
                    'user_id' => auth()->user()->id
                ]);
                
                foreach ($bathService['files'] as $file) {
                    Multimedia::create([
                        'fk_id_informe_detallado_cabecera' => $informeDetalladoCabecera->id,
                        'fk_id_informe_detallado_detalle' => $informeDetalladoDetalle->id,
                        'fotos_detalle' => $this->uploadFile($file, $informeDetalladoCabecera->id),
                        'foto_session'=>'banos_servicio_foto',
                        'created_at' => Carbon::now()->format('Y-m-d')
                    ]);
                }
                
                foreach ($bathService['videos'] as $file) {
                    Multimedia::create([
                        'fk_id_informe_detallado_cabecera' => $informeDetalladoCabecera->id,
                        'fk_id_informe_detallado_detalle' => $informeDetalladoDetalle->id,
                        'nota_detalle' => $this->uploadFile($file, $informeDetalladoCabecera->id),
                        'video_session'=>'banos_servicio_video',
                        'created_at' => Carbon::now()->format('Y-m-d')
                    ]);
                }
            }
			$informeDetalladoCabecera->user_id = auth()->user()->id;
			$informeDetalladoCabecera->user_email = auth()->user()->email;

            DB::commit();
        } catch (\Exception $e) {
             return $e; 
            DB::rollBack();
            
            return response([
                $e->getMessage()
            ], 422);
        }
        
        return response([
            $informeDetalladoCabecera->id
        ], 200);
    }

    public function edit()
    {
        return view('informes.edit');
    }

    // public function updateOld(Request $request, $id)
    // {
    //     foreach ($request->all() as $value) 
    //     {
    //         $detail = json_decode($value, true);
            
    //         if ($detail['files'] || $detail['videos']) 
    //         {
    //             foreach ($detail['files'] as $file) {
    //                 Multimedia::create([
    //                     'fk_id_informe_detallado_cabecera' => $id,
    //                     'fk_id_informe_detallado_detalle' => $detail['id'],
    //                     'foto_session'=> $detail['label'],
    //                     'fotos_detalle' => $this->uploadFile($file, $id),
    //                     'created_at' => Carbon::now()
    //                 ]);
    //             }
    //             foreach ($detail['videos'] as $file) {
    //                 Multimedia::create([
    //                     'fk_id_informe_detallado_cabecera' => $id,
    //                     'fk_id_informe_detallado_detalle' => $detail['id'],
    //                     'video_session'=> $detail['label'],
    //                     'nota_detalle' => $this->uploadFile($file, $id),
    //                     'created_at' => Carbon::now()
    //                 ]);
    //             }    
    //         }
    //     }
        
    //     return response([]);
    // }
    
    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        try {
			
            $request->merge([
                'livingRoomBedrooms' => json_decode($request->livingRoomBedrooms, true),
                'bathServices' => json_decode($request->bathServices, true),
                'serviceRooms' => json_decode($request->serviceRooms, true),
                'doorFiles' => json_decode($request->doorFiles, true),
                'bathrooms' => json_decode($request->bathrooms, true),
                'restrooms' => json_decode($request->restrooms, true),
                'receiver' => json_decode($request->receiver, true),
                'kitchens' => json_decode($request->kitchens, true),
                'bedrooms' => json_decode($request->bedrooms, true),
                'hallways' => json_decode($request->hallways, true),
                'dealers' => json_decode($request->dealers, true),
                'salons' => json_decode($request->salons, true),
                'isSale' => json_decode($request->isSale, true),
				'tipo_inmueble' => json_decode($request->tipo_inmueble, true),
                'door' => json_decode($request->door, true),
				'garage' => json_decode($request->garage, true),
				'boxroom' => json_decode($request->boxroom, true),
				'facade' => json_decode($request->facade, true),
				'portal' => json_decode($request->portal, true),
				'lift' => json_decode($request->lift, true), //16
				'swimming' => json_decode($request->swimming, true), //17
				'garden' => json_decode($request->garden, true),
				'gym' => json_decode($request->gym, true),  //19
				'sauna' => json_decode($request->sauna, true),
				'sports' => json_decode($request->sports, true), //21
				'childarea' => json_decode($request->childarea, true), //22
				'transportes' => json_decode($request->transportes, true), //23
				'place' => json_decode($request->place, true),
                'trash' => json_decode($request->trash, true),
            ]);
            // Puerta
                InformeDetalladoDetalle::find($request->door['id'])->update([
                    'puerta' => $request->door['type']
                ]);

                foreach ($request->door['files'] as $file) {
                    Multimedia::create([
                        'fk_id_informe_detallado_cabecera' => $id,
                        'fk_id_informe_detallado_detalle' => $request->door['id'],
                        'fotos_detalle' => $this->uploadFile($file, $id),
                    ]);
                }
            // garaje
			$file_garaje_update=$request->garage['files'];
			if ($file_garaje_update != null){
				$garaje_update=InformeDetalladoDetalle::find($request->garage['id']);
				if  ($garaje_update  == null) {
					//garage
					//$descripcion_garaje_update= $request->garage['description'];
					//$tamano_garaje_update= $request->garage['size'];
					//$file_garaje_update=$request->garage['files'];
					//$video_garaje_update=$request->garage['videos'];
					$garaje=  InformeDetalladoDetalle::create([
						'type'=>12,
						'created_at' => Carbon::now()->format('Y-m-d'),				
						'descripcion' => $request->garage['description'],
						'tamano' => empty($request->garage['size'])?null:$request->garage['size'],
						'tipo' => $request->garage['type'],
						'numero'=>empty($request->garage['number'])?null:$request->garage['number'],
						'situacion' => $request->garage['situation'],						
						'fk_id_informe_detallado_cabecera' =>  $id
					]); 
					foreach ($request->garage['files'] as $file) {
						Multimedia::create([
							'fk_id_informe_detallado_cabecera' => $id,
							'fk_id_informe_detallado_detalle' => $garaje->id,
							'fotos_detalle' => $this->uploadFile($file, $id),
							'created_at' => Carbon::now()->format('Y-m-d')
						]);
					}
						
					foreach ($request->garage['videos'] as $file) {
						Multimedia::create([
							'fk_id_informe_detallado_cabecera' => $id,
							'fk_id_informe_detallado_detalle' => $garaje->id,
							'nota_detalle' => $this->uploadFile($file, $id),
							'created_at' => Carbon::now()->format('Y-m-d')
						]);
					}					

				}
				else
				{
					InformeDetalladoDetalle::find($request->garage['id'])->update([
					'descripcion' => $request->garage['description'],
					'tamano' => empty($request->garage['size'])?null:$request->garage['size'],
					'tipo' => $request->garage['type'],
					'numero'=>empty($request->garage['number'])?null:$request->garage['number'],
					'situacion' => $request->garage['situation'],
					]);
					foreach ($request->garage['files'] as $file) {
						Multimedia::create([
							'fk_id_informe_detallado_cabecera' => $id,
							'fk_id_informe_detallado_detalle' => $request->garage['id'],
							'fotos_detalle' => $this->uploadFile($file, $id),
						]);
					}
					foreach ($request->garage['videos'] as $file) {
						Multimedia::create([
							'fk_id_informe_detallado_cabecera' => $id,
							'fk_id_informe_detallado_detalle' => $request->garage['id'],
							'nota_detalle' => $this->uploadFile($file, $id),
						]);
					}					
				}
			}
			else			
			{
				$garaje_update_2=InformeDetalladoDetalle::find($request->garage['id']);
				if  ($garaje_update_2  == null) {
					//No hago nada
					//hago esto
					if (empty($request->garage['description']) && empty($request->garage['size']) && empty($request->garage['type']) && empty($request->garage['number']))
					{
					}
					else
					{
						$garaje=  InformeDetalladoDetalle::create([
							'type'=>12,
							'created_at' => Carbon::now()->format('Y-m-d'),				
							'descripcion' => $request->garage['description'],
							'tamano' => empty($request->garage['size'])?null:$request->garage['size'],
							'tipo' => $request->garage['type'],
							'numero'=>empty($request->garage['number'])?null:$request->garage['number'],
							'situacion' => $request->garage['situation'],						
							'fk_id_informe_detallado_cabecera' =>  $id
						]); 					
					}					
				}
				else
				{
					InformeDetalladoDetalle::find($request->garage['id'])->update([
					'descripcion' => $request->garage['description'],
					'tamano' => empty($request->garage['size'])?null:$request->garage['size'],
					'tipo' => $request->garage['type'],
					'numero'=>empty($request->garage['number'])?null:$request->garage['number'],
					'situacion' => $request->garage['situation'],
					]);
					foreach ($request->garage['files'] as $file) {
						Multimedia::create([
							'fk_id_informe_detallado_cabecera' => $id,
							'fk_id_informe_detallado_detalle' => $request->garage['id'],
							'fotos_detalle' => $this->uploadFile($file, $id),
						]);
					}
					foreach ($request->garage['videos'] as $file) {
						Multimedia::create([
							'fk_id_informe_detallado_cabecera' => $id,
							'fk_id_informe_detallado_detalle' => $request->garage['id'],
							'nota_detalle' => $this->uploadFile($file, $id),
						]);
					}					
				}				
				
			}
            // trastero
			$file_trastero_update=$request->boxroom['files'];
			if ($file_trastero_update != null){
				$trastero_update=InformeDetalladoDetalle::find($request->boxroom['id']);
				if  ($trastero_update  == null) {
					//boxroom
					//$descripcion_trastero_update= $request->boxroom['description'];
					//$tamano_trastero_update= $request->boxroom['size'];
					//$file_trastero_update=$request->boxroom['files'];
					//$video_trastero_update=$request->boxroom['videos'];
					$trastero=  InformeDetalladoDetalle::create([
						'type'=>13,
						'created_at' => Carbon::now()->format('Y-m-d'),				
						'descripcion' => $request->boxroom['description'],
						'tamano' => empty($request->boxroom['size'])?null:$request->boxroom['size'],
						'fk_id_informe_detallado_cabecera' =>  $id
					]); 
					foreach ($request->boxroom['files'] as $file) {
						Multimedia::create([
							'fk_id_informe_detallado_cabecera' => $id,
							'fk_id_informe_detallado_detalle' => $trastero->id,
							'fotos_detalle' => $this->uploadFile($file, $id),
							'created_at' => Carbon::now()->format('Y-m-d')
						]);
					}
						
					foreach ($request->boxroom['videos'] as $file) {
						Multimedia::create([
							'fk_id_informe_detallado_cabecera' => $id,
							'fk_id_informe_detallado_detalle' => $trastero->id,
							'nota_detalle' => $this->uploadFile($file, $id),
							'created_at' => Carbon::now()->format('Y-m-d')
						]);
					}					

				}
				else
				{
					InformeDetalladoDetalle::find($request->boxroom['id'])->update([
					'descripcion' => $request->boxroom['description'],
					'tamano' => empty($request->boxroom['size'])?null:$request->boxroom['size'],
					//'tipo' => $request->boxroom['type'],
					//'numero'=>$request->boxroom['number'],
					//'situacion' => $request->boxroom['situation'],
					]);
					foreach ($request->boxroom['files'] as $file) {
						Multimedia::create([
							'fk_id_informe_detallado_cabecera' => $id,
							'fk_id_informe_detallado_detalle' => $request->boxroom['id'],
							'fotos_detalle' => $this->uploadFile($file, $id),
						]);
					}
					foreach ($request->boxroom['videos'] as $file) {
						Multimedia::create([
							'fk_id_informe_detallado_cabecera' => $id,
							'fk_id_informe_detallado_detalle' => $request->boxroom['id'],
							'nota_detalle' => $this->uploadFile($file, $id),
						]);
					}					
				}
			}
			else
			{
				$trastero_update_2=InformeDetalladoDetalle::find($request->boxroom['id']);
				if  ($trastero_update_2  == null) {
					//no hago nada	
					//hago esto
					if (empty($request->boxroom['description']) && empty($request->boxroom['size']))
					{
					}
					else
					{
						$trastero=  InformeDetalladoDetalle::create([
							'type'=>13,
							'created_at' => Carbon::now()->format('Y-m-d'),				
							'descripcion' => $request->boxroom['description'],
							'tamano' => empty($request->boxroom['size'])?null:$request->boxroom['size'],
							'fk_id_informe_detallado_cabecera' =>  $id
						]);						
					}
				}
				else
				{
					InformeDetalladoDetalle::find($request->boxroom['id'])->update([
					'descripcion' => $request->boxroom['description'],
					'tamano' => empty($request->boxroom['size'])?null:$request->boxroom['size'],
					//'tipo' => $request->boxroom['type'],
					//'numero'=>$request->boxroom['number'],
					//'situacion' => $request->boxroom['situation'],
					]);
					foreach ($request->boxroom['files'] as $file) {
						Multimedia::create([
							'fk_id_informe_detallado_cabecera' => $id,
							'fk_id_informe_detallado_detalle' => $request->boxroom['id'],
							'fotos_detalle' => $this->uploadFile($file, $id),
						]);
					}
					foreach ($request->boxroom['videos'] as $file) {
						Multimedia::create([
							'fk_id_informe_detallado_cabecera' => $id,
							'fk_id_informe_detallado_detalle' => $request->boxroom['id'],
							'nota_detalle' => $this->uploadFile($file, $id),
						]);
					}					
				}				
			}
            // fachada
			$file_fachada_update=$request->facade['files'];
			if ($file_fachada_update != null){
				$fachada_update=InformeDetalladoDetalle::find($request->facade['id']);
				if  ($fachada_update  == null) {
					//facade
					//$descripcion_fachada_update= $request->facade['description'];
					//$tamano_fachada_update= $request->facade['size'];
					//$file_fachada_update=$request->facade['files'];
					//$video_fachada_update=$request->facade['videos'];
					$fachada=  InformeDetalladoDetalle::create([
						'type'=>14,
						'created_at' => Carbon::now()->format('Y-m-d'),				
						'descripcion' => $request->facade['description'],
						'fk_id_informe_detallado_cabecera' =>  $id
					]); 
					foreach ($request->facade['files'] as $file) {
						Multimedia::create([
							'fk_id_informe_detallado_cabecera' => $id,
							'fk_id_informe_detallado_detalle' => $fachada->id,
							'fotos_detalle' => $this->uploadFile($file, $id),
							'created_at' => Carbon::now()->format('Y-m-d')
						]);
					}
						
					foreach ($request->facade['videos'] as $file) {
						Multimedia::create([
							'fk_id_informe_detallado_cabecera' => $id,
							'fk_id_informe_detallado_detalle' => $fachada->id,
							'nota_detalle' => $this->uploadFile($file, $id),
							'created_at' => Carbon::now()->format('Y-m-d')
						]);
					}					

				}
				else
				{
					InformeDetalladoDetalle::find($request->facade['id'])->update([
					'descripcion' => $request->facade['description'],
					//'tipo' => $request->facade['type'],
					//'numero'=>$request->facade['number'],
					//'situacion' => $request->facade['situation'],
					]);
					foreach ($request->facade['files'] as $file) {
						Multimedia::create([
							'fk_id_informe_detallado_cabecera' => $id,
							'fk_id_informe_detallado_detalle' => $request->facade['id'],
							'fotos_detalle' => $this->uploadFile($file, $id),
						]);
					}
					foreach ($request->facade['videos'] as $file) {
						Multimedia::create([
							'fk_id_informe_detallado_cabecera' => $id,
							'fk_id_informe_detallado_detalle' => $request->facade['id'],
							'nota_detalle' => $this->uploadFile($file, $id),
						]);
					}					
				}
			}	
			else
			{
				$fachada_update_2=InformeDetalladoDetalle::find($request->facade['id']);
				if  ($fachada_update_2  == null) {
					//no hacemos nada			
				}
				else
				{
					InformeDetalladoDetalle::find($request->facade['id'])->update([
					'descripcion' => $request->facade['description'],
					//'tipo' => $request->facade['type'],
					//'numero'=>$request->facade['number'],
					//'situacion' => $request->facade['situation'],
					]);
					foreach ($request->facade['files'] as $file) {
						Multimedia::create([
							'fk_id_informe_detallado_cabecera' => $id,
							'fk_id_informe_detallado_detalle' => $request->facade['id'],
							'fotos_detalle' => $this->uploadFile($file, $id),
						]);
					}
					foreach ($request->facade['videos'] as $file) {
						Multimedia::create([
							'fk_id_informe_detallado_cabecera' => $id,
							'fk_id_informe_detallado_detalle' => $request->facade['id'],
							'nota_detalle' => $this->uploadFile($file, $id),
						]);
					}					
				}
							
			}
            // portal
			$file_portal_update=$request->portal['files'];
			if ($file_portal_update != null){
				$portal_update=InformeDetalladoDetalle::find($request->portal['id']);
				if  ($portal_update  == null) {
					//portal
					//$descripcion_portal_update= $request->portal['description'];
					//$tamano_portal_update= $request->portal['size'];
					//$file_portal_update=$request->portal['files'];
					//$video_portal_update=$request->portal['videos'];
					$portal=  InformeDetalladoDetalle::create([
						'type'=>15,
						'created_at' => Carbon::now()->format('Y-m-d'),				
						'descripcion' => $request->portal['description'],
						'fk_id_informe_detallado_cabecera' =>  $id
					]); 
					foreach ($request->portal['files'] as $file) {
						Multimedia::create([
							'fk_id_informe_detallado_cabecera' => $id,
							'fk_id_informe_detallado_detalle' => $portal->id,
							'fotos_detalle' => $this->uploadFile($file, $id),
							'created_at' => Carbon::now()->format('Y-m-d')
						]);
					}
						
					foreach ($request->portal['videos'] as $file) {
						Multimedia::create([
							'fk_id_informe_detallado_cabecera' => $id,
							'fk_id_informe_detallado_detalle' => $portal->id,
							'nota_detalle' => $this->uploadFile($file, $id),
							'created_at' => Carbon::now()->format('Y-m-d')
						]);
					}					

				}
				else
				{
					InformeDetalladoDetalle::find($request->portal['id'])->update([
					'descripcion' => $request->portal['description'],
					//'tipo' => $request->portal['type'],
					//'numero'=>$request->portal['number'],
					//'situacion' => $request->portal['situation'],
					]);
					foreach ($request->portal['files'] as $file) {
						Multimedia::create([
							'fk_id_informe_detallado_cabecera' => $id,
							'fk_id_informe_detallado_detalle' => $request->portal['id'],
							'fotos_detalle' => $this->uploadFile($file, $id),
						]);
					}
					foreach ($request->portal['videos'] as $file) {
						Multimedia::create([
							'fk_id_informe_detallado_cabecera' => $id,
							'fk_id_informe_detallado_detalle' => $request->portal['id'],
							'nota_detalle' => $this->uploadFile($file, $id),
						]);
					}					
				}
			}
			else
			{
				$portal_update_2=InformeDetalladoDetalle::find($request->portal['id']);
				if  ($portal_update_2  == null) {
					//No hacemos nada
				}
				else
				{
					InformeDetalladoDetalle::find($request->portal['id'])->update([
					'descripcion' => $request->portal['description'],
					//'tipo' => $request->portal['type'],
					//'numero'=>$request->portal['number'],
					//'situacion' => $request->portal['situation'],
					]);
					foreach ($request->portal['files'] as $file) {
						Multimedia::create([
							'fk_id_informe_detallado_cabecera' => $id,
							'fk_id_informe_detallado_detalle' => $request->portal['id'],
							'fotos_detalle' => $this->uploadFile($file, $id),
						]);
					}
					foreach ($request->portal['videos'] as $file) {
						Multimedia::create([
							'fk_id_informe_detallado_cabecera' => $id,
							'fk_id_informe_detallado_detalle' => $request->portal['id'],
							'nota_detalle' => $this->uploadFile($file, $id),
						]);
					}					
				}				
			}
            // ascensor
			$file_ascensor_update=$request->lift['files'];
			if ($file_ascensor_update != null){
				$ascensor_update=InformeDetalladoDetalle::find($request->lift['id']);
				if  ($ascensor_update  == null) {
					//lift
					//$descripcion_ascensor_update= $request->lift['description'];
					//$tamano_ascensor_update= $request->lift['size'];
					//$file_ascensor_update=$request->lift['files'];
					//$video_ascensor_update=$request->lift['videos'];
					$ascensor=  InformeDetalladoDetalle::create([
						'type'=>16,
						'created_at' => Carbon::now()->format('Y-m-d'),				
						'descripcion' => $request->lift['description'],
						'numero'=>empty($request->lift['number'])?null:$request->lift['number'],
						'fk_id_informe_detallado_cabecera' =>  $id
					]); 
					foreach ($request->lift['files'] as $file) {
						Multimedia::create([
							'fk_id_informe_detallado_cabecera' => $id,
							'fk_id_informe_detallado_detalle' => $ascensor->id,
							'fotos_detalle' => $this->uploadFile($file, $id),
							'created_at' => Carbon::now()->format('Y-m-d')
						]);
					}
						
					foreach ($request->lift['videos'] as $file) {
						Multimedia::create([
							'fk_id_informe_detallado_cabecera' => $id,
							'fk_id_informe_detallado_detalle' => $ascensor->id,
							'nota_detalle' => $this->uploadFile($file, $id),
							'created_at' => Carbon::now()->format('Y-m-d')
						]);
					}					

				}
				else
				{
					InformeDetalladoDetalle::find($request->lift['id'])->update([
					'descripcion' => $request->lift['description'],
					'numero'=>empty($request->lift['number'])?null:$request->lift['number'],
					//'tipo' => $request->lift['type'],
					//'numero'=>$request->lift['number'],
					//'situacion' => $request->lift['situation'],
					]);
					foreach ($request->lift['files'] as $file) {
						Multimedia::create([
							'fk_id_informe_detallado_cabecera' => $id,
							'fk_id_informe_detallado_detalle' => $request->lift['id'],
							'fotos_detalle' => $this->uploadFile($file, $id),
						]);
					}
					foreach ($request->lift['videos'] as $file) {
						Multimedia::create([
							'fk_id_informe_detallado_cabecera' => $id,
							'fk_id_informe_detallado_detalle' => $request->lift['id'],
							'nota_detalle' => $this->uploadFile($file, $id),
						]);
					}					
				}
			}
			else
			{
				$ascensor_update_2=InformeDetalladoDetalle::find($request->lift['id']);
				if  ($ascensor_update_2  == null) {
					//no hacemos nada			
				}
				else
				{
					InformeDetalladoDetalle::find($request->lift['id'])->update([
					'descripcion' => $request->lift['description'],
					'numero'=>empty($request->lift['number'])?null:$request->lift['number'],
					//'tipo' => $request->lift['type'],
					//'numero'=>$request->lift['number'],
					//'situacion' => $request->lift['situation'],
					]);
					foreach ($request->lift['files'] as $file) {
						Multimedia::create([
							'fk_id_informe_detallado_cabecera' => $id,
							'fk_id_informe_detallado_detalle' => $request->lift['id'],
							'fotos_detalle' => $this->uploadFile($file, $id),
						]);
					}
					foreach ($request->lift['videos'] as $file) {
						Multimedia::create([
							'fk_id_informe_detallado_cabecera' => $id,
							'fk_id_informe_detallado_detalle' => $request->lift['id'],
							'nota_detalle' => $this->uploadFile($file, $id),
						]);
					}					
				}				
			}
            // piscina
			$file_piscina_update=$request->swimming['files'];
			if ($file_piscina_update != null){
				$piscina_update=InformeDetalladoDetalle::find($request->swimming['id']);
				if  ($piscina_update  == null) {
					//swimming
					//$descripcion_piscina_update= $request->swimming['description'];
					//$tamano_piscina_update= $request->swimming['size'];
					//$file_piscina_update=$request->swimming['files'];
					//$video_piscina_update=$request->swimming['videos'];
					$piscina=  InformeDetalladoDetalle::create([
						'type'=>17,
						'created_at' => Carbon::now()->format('Y-m-d'),				
						'descripcion' => $request->swimming['description'],
						'fk_id_informe_detallado_cabecera' =>  $id
					]); 
					foreach ($request->swimming['files'] as $file) {
						Multimedia::create([
							'fk_id_informe_detallado_cabecera' => $id,
							'fk_id_informe_detallado_detalle' => $piscina->id,
							'fotos_detalle' => $this->uploadFile($file, $id),
							'created_at' => Carbon::now()->format('Y-m-d')
						]);
					}
						
					foreach ($request->swimming['videos'] as $file) {
						Multimedia::create([
							'fk_id_informe_detallado_cabecera' => $id,
							'fk_id_informe_detallado_detalle' => $piscina->id,
							'nota_detalle' => $this->uploadFile($file, $id),
							'created_at' => Carbon::now()->format('Y-m-d')
						]);
					}					

				}
				else
				{
					InformeDetalladoDetalle::find($request->swimming['id'])->update([
					'descripcion' => $request->swimming['description'],
					//'tipo' => $request->swimming['type'],
					//'numero'=>$request->swimming['number'],
					//'situacion' => $request->swimming['situation'],
					]);
					foreach ($request->swimming['files'] as $file) {
						Multimedia::create([
							'fk_id_informe_detallado_cabecera' => $id,
							'fk_id_informe_detallado_detalle' => $request->swimming['id'],
							'fotos_detalle' => $this->uploadFile($file, $id),
						]);
					}
					foreach ($request->swimming['videos'] as $file) {
						Multimedia::create([
							'fk_id_informe_detallado_cabecera' => $id,
							'fk_id_informe_detallado_detalle' => $request->swimming['id'],
							'nota_detalle' => $this->uploadFile($file, $id),
						]);
					}					
				}
			}
			else
			{
				$piscina_update_2=InformeDetalladoDetalle::find($request->swimming['id']);
				if  ($piscina_update_2  == null) {
					//No hacemos nada
				}
				else
				{
					InformeDetalladoDetalle::find($request->swimming['id'])->update([
					'descripcion' => $request->swimming['description'],
					//'tipo' => $request->swimming['type'],
					//'numero'=>$request->swimming['number'],
					//'situacion' => $request->swimming['situation'],
					]);
					foreach ($request->swimming['files'] as $file) {
						Multimedia::create([
							'fk_id_informe_detallado_cabecera' => $id,
							'fk_id_informe_detallado_detalle' => $request->swimming['id'],
							'fotos_detalle' => $this->uploadFile($file, $id),
						]);
					}
					foreach ($request->swimming['videos'] as $file) {
						Multimedia::create([
							'fk_id_informe_detallado_cabecera' => $id,
							'fk_id_informe_detallado_detalle' => $request->swimming['id'],
							'nota_detalle' => $this->uploadFile($file, $id),
						]);
					}					
				}				
			}
            // jardin
			$file_jardin_update=$request->garden['files'];
			if ($file_jardin_update != null){
				$jardin_update=InformeDetalladoDetalle::find($request->garden['id']);
				if  ($jardin_update  == null) {
					//garden
					//$descripcion_jardin_update= $request->garden['description'];
					//$tamano_jardin_update= $request->garden['size'];
					//$file_jardin_update=$request->garden['files'];
					//$video_jardin_update=$request->garden['videos'];
					$jardin=  InformeDetalladoDetalle::create([
						'type'=>18,
						'created_at' => Carbon::now()->format('Y-m-d'),				
						'descripcion' => $request->garden['description'],
						'fk_id_informe_detallado_cabecera' =>  $id
					]); 
					foreach ($request->garden['files'] as $file) {
						Multimedia::create([
							'fk_id_informe_detallado_cabecera' => $id,
							'fk_id_informe_detallado_detalle' => $jardin->id,
							'fotos_detalle' => $this->uploadFile($file, $id),
							'created_at' => Carbon::now()->format('Y-m-d')
						]);
					}
						
					foreach ($request->garden['videos'] as $file) {
						Multimedia::create([
							'fk_id_informe_detallado_cabecera' => $id,
							'fk_id_informe_detallado_detalle' => $jardin->id,
							'nota_detalle' => $this->uploadFile($file, $id),
							'created_at' => Carbon::now()->format('Y-m-d')
						]);
					}					

				}
				else
				{
					InformeDetalladoDetalle::find($request->garden['id'])->update([
					'descripcion' => $request->garden['description'],
					//'tipo' => $request->garden['type'],
					//'numero'=>$request->garden['number'],
					//'situacion' => $request->garden['situation'],
					]);
					foreach ($request->garden['files'] as $file) {
						Multimedia::create([
							'fk_id_informe_detallado_cabecera' => $id,
							'fk_id_informe_detallado_detalle' => $request->garden['id'],
							'fotos_detalle' => $this->uploadFile($file, $id),
						]);
					}
					foreach ($request->garden['videos'] as $file) {
						Multimedia::create([
							'fk_id_informe_detallado_cabecera' => $id,
							'fk_id_informe_detallado_detalle' => $request->garden['id'],
							'nota_detalle' => $this->uploadFile($file, $id),
						]);
					}					
				}
			}
			else
			{
				$jardin_update_2=InformeDetalladoDetalle::find($request->garden['id']);
				if  ($jardin_update_2  == null) {
					//no hacemos nada
				}
				else
				{
					InformeDetalladoDetalle::find($request->garden['id'])->update([
					'descripcion' => $request->garden['description'],
					//'tipo' => $request->garden['type'],
					//'numero'=>$request->garden['number'],
					//'situacion' => $request->garden['situation'],
					]);
					foreach ($request->garden['files'] as $file) {
						Multimedia::create([
							'fk_id_informe_detallado_cabecera' => $id,
							'fk_id_informe_detallado_detalle' => $request->garden['id'],
							'fotos_detalle' => $this->uploadFile($file, $id),
						]);
					}
					foreach ($request->garden['videos'] as $file) {
						Multimedia::create([
							'fk_id_informe_detallado_cabecera' => $id,
							'fk_id_informe_detallado_detalle' => $request->garden['id'],
							'nota_detalle' => $this->uploadFile($file, $id),
						]);
					}					
				}				
			}
            // gimnasio
			$file_gimnasio_update=$request->gym['files'];
			if ($file_gimnasio_update != null){
				$gimnasio_update=InformeDetalladoDetalle::find($request->gym['id']);
				if  ($gimnasio_update  == null) {
					//gym
					//$descripcion_gimnasio_update= $request->gym['description'];
					//$tamano_gimnasio_update= $request->gym['size'];
					//$file_gimnasio_update=$request->gym['files'];
					//$video_gimnasio_update=$request->gym['videos'];
					$gimnasio=  InformeDetalladoDetalle::create([
						'type'=>19,
						'created_at' => Carbon::now()->format('Y-m-d'),				
						'descripcion' => $request->gym['description'],
						'fk_id_informe_detallado_cabecera' =>  $id
					]); 
					foreach ($request->gym['files'] as $file) {
						Multimedia::create([
							'fk_id_informe_detallado_cabecera' => $id,
							'fk_id_informe_detallado_detalle' => $gimnasio->id,
							'fotos_detalle' => $this->uploadFile($file, $id),
							'created_at' => Carbon::now()->format('Y-m-d')
						]);
					}
						
					foreach ($request->gym['videos'] as $file) {
						Multimedia::create([
							'fk_id_informe_detallado_cabecera' => $id,
							'fk_id_informe_detallado_detalle' => $gimnasio->id,
							'nota_detalle' => $this->uploadFile($file, $id),
							'created_at' => Carbon::now()->format('Y-m-d')
						]);
					}					

				}
				else
				{
					InformeDetalladoDetalle::find($request->gym['id'])->update([
					'descripcion' => $request->gym['description'],
					//'tipo' => $request->gym['type'],
					//'numero'=>$request->gym['number'],
					//'situacion' => $request->gym['situation'],
					]);
					foreach ($request->gym['files'] as $file) {
						Multimedia::create([
							'fk_id_informe_detallado_cabecera' => $id,
							'fk_id_informe_detallado_detalle' => $request->gym['id'],
							'fotos_detalle' => $this->uploadFile($file, $id),
						]);
					}
					foreach ($request->gym['videos'] as $file) {
						Multimedia::create([
							'fk_id_informe_detallado_cabecera' => $id,
							'fk_id_informe_detallado_detalle' => $request->gym['id'],
							'nota_detalle' => $this->uploadFile($file, $id),
						]);
					}					
				}
			}
			else
			{
				$gimnasio_update_2=InformeDetalladoDetalle::find($request->gym['id']);
				if  ($gimnasio_update_2  == null) {
					//No hacemos nada
				}
				else
				{
					InformeDetalladoDetalle::find($request->gym['id'])->update([
					'descripcion' => $request->gym['description'],
					//'tipo' => $request->gym['type'],
					//'numero'=>$request->gym['number'],
					//'situacion' => $request->gym['situation'],
					]);
					foreach ($request->gym['files'] as $file) {
						Multimedia::create([
							'fk_id_informe_detallado_cabecera' => $id,
							'fk_id_informe_detallado_detalle' => $request->gym['id'],
							'fotos_detalle' => $this->uploadFile($file, $id),
						]);
					}
					foreach ($request->gym['videos'] as $file) {
						Multimedia::create([
							'fk_id_informe_detallado_cabecera' => $id,
							'fk_id_informe_detallado_detalle' => $request->gym['id'],
							'nota_detalle' => $this->uploadFile($file, $id),
						]);
					}					
				}				
			}
            // saunas
			$file_saunas_update=$request->sauna['files'];
			if ($file_saunas_update != null){
				$saunas_update=InformeDetalladoDetalle::find($request->sauna['id']);
				if  ($saunas_update  == null) {
					//sauna
					//$descripcion_saunas_update= $request->sauna['description'];
					//$tamano_saunas_update= $request->sauna['size'];
					//$file_saunas_update=$request->sauna['files'];
					//$video_saunas_update=$request->sauna['videos'];
					$saunas=  InformeDetalladoDetalle::create([
						'type'=>20,
						'created_at' => Carbon::now()->format('Y-m-d'),				
						'descripcion' => $request->sauna['description'],
						'fk_id_informe_detallado_cabecera' =>  $id
					]); 
					foreach ($request->sauna['files'] as $file) {
						Multimedia::create([
							'fk_id_informe_detallado_cabecera' => $id,
							'fk_id_informe_detallado_detalle' => $saunas->id,
							'fotos_detalle' => $this->uploadFile($file, $id),
							'created_at' => Carbon::now()->format('Y-m-d')
						]);
					}
						
					foreach ($request->sauna['videos'] as $file) {
						Multimedia::create([
							'fk_id_informe_detallado_cabecera' => $id,
							'fk_id_informe_detallado_detalle' => $saunas->id,
							'nota_detalle' => $this->uploadFile($file, $id),
							'created_at' => Carbon::now()->format('Y-m-d')
						]);
					}					

				}
				else
				{
					InformeDetalladoDetalle::find($request->sauna['id'])->update([
					'descripcion' => $request->sauna['description'],
					//'tipo' => $request->sauna['type'],
					//'numero'=>$request->sauna['number'],
					//'situacion' => $request->sauna['situation'],
					]);
					foreach ($request->sauna['files'] as $file) {
						Multimedia::create([
							'fk_id_informe_detallado_cabecera' => $id,
							'fk_id_informe_detallado_detalle' => $request->sauna['id'],
							'fotos_detalle' => $this->uploadFile($file, $id),
						]);
					}
					foreach ($request->sauna['videos'] as $file) {
						Multimedia::create([
							'fk_id_informe_detallado_cabecera' => $id,
							'fk_id_informe_detallado_detalle' => $request->sauna['id'],
							'nota_detalle' => $this->uploadFile($file, $id),
						]);
					}					
				}
			}
			else
			{
				$saunas_update_2=InformeDetalladoDetalle::find($request->sauna['id']);
				if  ($saunas_update_2  == null) {
					//no hacemos nada
				}
				else
				{
					InformeDetalladoDetalle::find($request->sauna['id'])->update([
					'descripcion' => $request->sauna['description'],
					//'tipo' => $request->sauna['type'],
					//'numero'=>$request->sauna['number'],
					//'situacion' => $request->sauna['situation'],
					]);
					foreach ($request->sauna['files'] as $file) {
						Multimedia::create([
							'fk_id_informe_detallado_cabecera' => $id,
							'fk_id_informe_detallado_detalle' => $request->sauna['id'],
							'fotos_detalle' => $this->uploadFile($file, $id),
						]);
					}
					foreach ($request->sauna['videos'] as $file) {
						Multimedia::create([
							'fk_id_informe_detallado_cabecera' => $id,
							'fk_id_informe_detallado_detalle' => $request->sauna['id'],
							'nota_detalle' => $this->uploadFile($file, $id),
						]);
					}					
				}				
			}
            // zona_deportiva
			$file_zona_deportiva_update=$request->sports['files'];
			if ($file_zona_deportiva_update != null){
				$zona_deportiva_update=InformeDetalladoDetalle::find($request->sports['id']);
				if  ($zona_deportiva_update  == null) {
					//sports
					//$descripcion_zona_deportiva_update= $request->sports['description'];
					//$tamano_zona_deportiva_update= $request->sports['size'];
					//$file_zona_deportiva_update=$request->sports['files'];
					//$video_zona_deportiva_update=$request->sports['videos'];
					$zona_deportiva=  InformeDetalladoDetalle::create([
						'type'=>21,
						'created_at' => Carbon::now()->format('Y-m-d'),				
						'descripcion' => $request->sports['description'],
						'fk_id_informe_detallado_cabecera' =>  $id
					]); 
					foreach ($request->sports['files'] as $file) {
						Multimedia::create([
							'fk_id_informe_detallado_cabecera' => $id,
							'fk_id_informe_detallado_detalle' => $zona_deportiva->id,
							'fotos_detalle' => $this->uploadFile($file, $id),
							'created_at' => Carbon::now()->format('Y-m-d')
						]);
					}
						
					foreach ($request->sports['videos'] as $file) {
						Multimedia::create([
							'fk_id_informe_detallado_cabecera' => $id,
							'fk_id_informe_detallado_detalle' => $zona_deportiva->id,
							'nota_detalle' => $this->uploadFile($file, $id),
							'created_at' => Carbon::now()->format('Y-m-d')
						]);
					}					

				}
				else
				{
					InformeDetalladoDetalle::find($request->sports['id'])->update([
					'descripcion' => $request->sports['description'],
					//'tipo' => $request->sports['type'],
					//'numero'=>$request->sports['number'],
					//'situacion' => $request->sports['situation'],
					]);
					foreach ($request->sports['files'] as $file) {
						Multimedia::create([
							'fk_id_informe_detallado_cabecera' => $id,
							'fk_id_informe_detallado_detalle' => $request->sports['id'],
							'fotos_detalle' => $this->uploadFile($file, $id),
						]);
					}
					foreach ($request->sports['videos'] as $file) {
						Multimedia::create([
							'fk_id_informe_detallado_cabecera' => $id,
							'fk_id_informe_detallado_detalle' => $request->sports['id'],
							'nota_detalle' => $this->uploadFile($file, $id),
						]);
					}					
				}
			}
			else
			{
				$zona_deportiva_update_2=InformeDetalladoDetalle::find($request->sports['id']);
				if  ($zona_deportiva_update_2  == null) {
					//no pasa nada
				}
				else
				{
					InformeDetalladoDetalle::find($request->sports['id'])->update([
					'descripcion' => $request->sports['description'],
					//'tipo' => $request->sports['type'],
					//'numero'=>$request->sports['number'],
					//'situacion' => $request->sports['situation'],
					]);
					foreach ($request->sports['files'] as $file) {
						Multimedia::create([
							'fk_id_informe_detallado_cabecera' => $id,
							'fk_id_informe_detallado_detalle' => $request->sports['id'],
							'fotos_detalle' => $this->uploadFile($file, $id),
						]);
					}
					foreach ($request->sports['videos'] as $file) {
						Multimedia::create([
							'fk_id_informe_detallado_cabecera' => $id,
							'fk_id_informe_detallado_detalle' => $request->sports['id'],
							'nota_detalle' => $this->uploadFile($file, $id),
						]);
					}					
				}				
			}
            // zona_infantil
			$file_zona_infantil_update=$request->childarea['files'];
			if ($file_zona_infantil_update != null){
				$zona_infantil_update=InformeDetalladoDetalle::find($request->childarea['id']);
				if  ($zona_infantil_update  == null) {
					//childarea
					//$descripcion_zona_infantil_update= $request->childarea['description'];
					//$tamano_zona_infantil_update= $request->childarea['size'];
					//$file_zona_infantil_update=$request->childarea['files'];
					//$video_zona_infantil_update=$request->childarea['videos'];
					$zona_infantil=  InformeDetalladoDetalle::create([
						'type'=>22,
						'created_at' => Carbon::now()->format('Y-m-d'),				
						'descripcion' => $request->childarea['description'],
						'fk_id_informe_detallado_cabecera' =>  $id
					]); 
					foreach ($request->childarea['files'] as $file) {
						Multimedia::create([
							'fk_id_informe_detallado_cabecera' => $id,
							'fk_id_informe_detallado_detalle' => $zona_infantil->id,
							'fotos_detalle' => $this->uploadFile($file, $id),
							'created_at' => Carbon::now()->format('Y-m-d')
						]);
					}
						
					foreach ($request->childarea['videos'] as $file) {
						Multimedia::create([
							'fk_id_informe_detallado_cabecera' => $id,
							'fk_id_informe_detallado_detalle' => $zona_infantil->id,
							'nota_detalle' => $this->uploadFile($file, $id),
							'created_at' => Carbon::now()->format('Y-m-d')
						]);
					}					

				}
				else
				{
					InformeDetalladoDetalle::find($request->childarea['id'])->update([
					'descripcion' => $request->childarea['description'],
					//'tipo' => $request->childarea['type'],
					//'numero'=>$request->childarea['number'],
					//'situacion' => $request->childarea['situation'],
					]);
					foreach ($request->childarea['files'] as $file) {
						Multimedia::create([
							'fk_id_informe_detallado_cabecera' => $id,
							'fk_id_informe_detallado_detalle' => $request->childarea['id'],
							'fotos_detalle' => $this->uploadFile($file, $id),
						]);
					}
					foreach ($request->childarea['videos'] as $file) {
						Multimedia::create([
							'fk_id_informe_detallado_cabecera' => $id,
							'fk_id_informe_detallado_detalle' => $request->childarea['id'],
							'nota_detalle' => $this->uploadFile($file, $id),
						]);
					}					
				}
			}
			else
			{
				$zona_infantil_update_2=InformeDetalladoDetalle::find($request->childarea['id']);
				if  ($zona_infantil_update_2  == null) {
					//No pasa nada
				}
				else
				{
					InformeDetalladoDetalle::find($request->childarea['id'])->update([
					'descripcion' => $request->childarea['description'],
					//'tipo' => $request->childarea['type'],
					//'numero'=>$request->childarea['number'],
					//'situacion' => $request->childarea['situation'],
					]);
					foreach ($request->childarea['files'] as $file) {
						Multimedia::create([
							'fk_id_informe_detallado_cabecera' => $id,
							'fk_id_informe_detallado_detalle' => $request->childarea['id'],
							'fotos_detalle' => $this->uploadFile($file, $id),
						]);
					}
					foreach ($request->childarea['videos'] as $file) {
						Multimedia::create([
							'fk_id_informe_detallado_cabecera' => $id,
							'fk_id_informe_detallado_detalle' => $request->childarea['id'],
							'nota_detalle' => $this->uploadFile($file, $id),
						]);
					}					
				}				
			}
			
            // transportes
				$flag_insert_hay_transporte=0;
                foreach ($request->transportes as $transporte) {
                    if ($transporte['id'] == null) {
						if ($transporte['type']!=null){
							$new = InformeDetalladoDetalle::create([
							 'type' => 23,
							'tipo_transporte' => $transporte['type'],
							'parada' => $transporte['name'],
							'lineas' => $transporte['lines'],
							'medida' => empty($transporte['measure'])?null:$transporte['measure'],
							'unidad_medida' => $transporte['units'],
							'medio' => $transporte['medio'],
							'fk_id_informe_detallado_cabecera' => $id,
							 'user_id' => auth()->user()->id
							]);
							$flag_insert_hay_transporte=1;
							$transporte['id'] = $new->id;
						}
                    } else {
                        InformeDetalladoDetalle::find($transporte['id'])->update([
						'tipo_transporte' => $transporte['type'],
						'parada' => $transporte['name'],
						'lineas' => $transporte['lines'],
						'medida' => empty($transporte['measure'])?null:$transporte['measure'],
						'unidad_medida' => $transporte['units'],
						'medio' => $transporte['medio']
                        ]);
                    }
                }			
            // lugar
			$file_lugar_update=$request->place['files'];
			if ($file_lugar_update != null){
				$lugar_update=InformeDetalladoDetalle::find($request->place['id']);
				if  ($lugar_update  == null) {
					//place
					//$descripcion_lugar_update= $request->place['description'];
					//$tamano_lugar_update= $request->place['size'];
					//$file_lugar_update=$request->place['files'];
					//$video_lugar_update=$request->place['videos'];
					$lugar=  InformeDetalladoDetalle::create([
						'type'=>24,
						'created_at' => Carbon::now()->format('Y-m-d'),				
						'lineas' => $request->place['description'],
						'medida' => empty($request->place['measure'])?null:$request->place['measure'],
						'unidad_medida'=>$request->place['units'],
						'medio' => $request->place['medio'],
					'lineas_1' => $request->place['description_1'],
					'medida_1' => empty($request->place['measure_1'])?null:$request->place['measure_1'],
					'unidad_medida_1'=>$request->place['units_1'],
					'medio_1' => $request->place['medio_1'],
					'lineas_2' => $request->place['description_2'],
					'medida_2' => empty($request->place['measure_2'])?null:$request->place['measure_2'],
					'unidad_medida_2'=>$request->place['units_2'],
					'medio_2' => $request->place['medio_2'],
					'lineas_3' => $request->place['description_3'],
					'medida_3' => empty($request->place['measure_3'])?null:$request->place['measure_3'],
					'unidad_medida_3'=>$request->place['units_3'],
					'medio_3' => $request->place['medio_3'],	
					'lineas_4' => $request->place['description_4'],
					'medida_4' => empty($request->place['measure_4'])?null:$request->place['measure_4'],
					'unidad_medida_4'=>$request->place['units_4'],
					'medio_4' => $request->place['medio_4'],	
					'lineas_5' => $request->place['description_5'],
					'medida_5' => empty($request->place['measure_5'])?null:$request->place['measure_5'],
					'unidad_medida_5'=>$request->place['units_5'],
					'medio_5' => $request->place['medio_5'],	
					'lineas_6' => $request->place['description_6'],
					'medida_6' => empty($request->place['measure_6'])?null:$request->place['measure_6'],
					'unidad_medida_6'=>$request->place['units_6'],
					'medio_6' => $request->place['medio_6'],
					'lineas_7' => $request->place['description_7'],
					'medida_7' => empty($request->place['measure_7'])?null:$request->place['measure_7'],
					'unidad_medida_7'=>$request->place['units_7'],
					'medio_7' => $request->place['medio_7'],
					'lineas_8' => $request->place['description_8'],
					'medida_8' => empty($request->place['measure_8'])?null:$request->place['measure_8'],
					'unidad_medida_8'=>$request->place['units_8'],
					'medio_8' => $request->place['medio_8'],
					'lineas_9' => $request->place['description_9'],
					'medida_9' => empty($request->place['measure_9'])?null:$request->place['measure_9'],
					'unidad_medida_9'=>$request->place['units_9'],
					'medio_9' => $request->place['medio_9'],					
						'fk_id_informe_detallado_cabecera' =>  $id,
						'barrio' => $request->place['barrio']
					]); 
					foreach ($request->place['files'] as $file) {
						Multimedia::create([
							'fk_id_informe_detallado_cabecera' => $id,
							'fk_id_informe_detallado_detalle' => $lugar->id,
							'fotos_detalle' => $this->uploadFile($file, $id),
							'created_at' => Carbon::now()->format('Y-m-d')
						]);
					}
						
					foreach ($request->place['videos'] as $file) {
						Multimedia::create([
							'fk_id_informe_detallado_cabecera' => $id,
							'fk_id_informe_detallado_detalle' => $lugar->id,
							'nota_detalle' => $this->uploadFile($file, $id),
							'created_at' => Carbon::now()->format('Y-m-d')
						]);
					}					

				}
				else
				{
					InformeDetalladoDetalle::find($request->place['id'])->update([
						'lineas' => $request->place['description'],
						'medida' => empty($request->place['measure'])?null:$request->place['measure'],
						'unidad_medida'=>$request->place['units'],
						'medio' => $request->place['medio'],
					'lineas_1' => $request->place['description_1'],
					'medida_1' => empty($request->place['measure_1'])?null:$request->place['measure_1'],
					'unidad_medida_1'=>$request->place['units_1'],
					'medio_1' => $request->place['medio_1'],
					'lineas_2' => $request->place['description_2'],
					'medida_2' => empty($request->place['measure_2'])?null:$request->place['measure_2'],
					'unidad_medida_2'=>$request->place['units_2'],
					'medio_2' => $request->place['medio_2'],	
					'lineas_3' => $request->place['description_3'],
					'medida_3' => empty($request->place['measure_3'])?null:$request->place['measure_3'],
					'unidad_medida_3'=>$request->place['units_3'],
					'medio_3' => $request->place['medio_3'],
					'lineas_4' => $request->place['description_4'],
					'medida_4' => empty($request->place['measure_4'])?null:$request->place['measure_4'],
					'unidad_medida_4'=>$request->place['units_4'],
					'medio_4' => $request->place['medio_4'],
					'lineas_5' => $request->place['description_5'],
					'medida_5' => empty($request->place['measure_5'])?null:$request->place['measure_5'],
					'unidad_medida_5'=>$request->place['units_5'],
					'medio_5' => $request->place['medio_5'],
					'lineas_6' => $request->place['description_6'],
					'medida_6' => empty($request->place['measure_6'])?null:$request->place['measure_6'],
					'unidad_medida_6'=>$request->place['units_6'],
					'medio_6' => $request->place['medio_6'],
					'lineas_7' => $request->place['description_7'],
					'medida_7' => empty($request->place['measure_7'])?null:$request->place['measure_7'],
					'unidad_medida_7'=>$request->place['units_7'],
					'medio_7' => $request->place['medio_7'],
					'lineas_8' => $request->place['description_8'],
					'medida_8' => empty($request->place['measure_8'])?null:$request->place['measure_8'],
					'unidad_medida_8'=>$request->place['units_8'],
					'medio_8' => $request->place['medio_8'],
					'lineas_9' => $request->place['description_9'],
					'medida_9' => empty($request->place['measure_9'])?null:$request->place['measure_9'],
					'unidad_medida_9'=>$request->place['units_9'],
					'medio_9' => $request->place['medio_9'],		
					'barrio' => $request->place['barrio']
					]);
					foreach ($request->place['files'] as $file) {
						Multimedia::create([
							'fk_id_informe_detallado_cabecera' => $id,
							'fk_id_informe_detallado_detalle' => $request->place['id'],
							'fotos_detalle' => $this->uploadFile($file, $id),
						]);
					}
					foreach ($request->place['videos'] as $file) {
						Multimedia::create([
							'fk_id_informe_detallado_cabecera' => $id,
							'fk_id_informe_detallado_detalle' => $request->place['id'],
							'nota_detalle' => $this->uploadFile($file, $id),
						]);
					}					
				}
			}
			else
			{
				$lugar_update_2=InformeDetalladoDetalle::find($request->place['id']);
				if  ($lugar_update_2  == null) {
					//no hago nada	
					//ahora pongo esto
					if (empty($request->place['barrio']) && empty($request->place['description']) && empty($request->place['description_1']))
					{
					}
					else
					{

						$lugar=  InformeDetalladoDetalle::create([
							'type'=>24,
							'created_at' => Carbon::now()->format('Y-m-d'),				
							'lineas' => $request->place['description'],
							'medida' => empty($request->place['measure'])?null:$request->place['measure'],
							'unidad_medida'=>$request->place['units'],
							'medio' => $request->place['medio'],
						'lineas_1' => $request->place['description_1'],
						'medida_1' => empty($request->place['measure_1'])?null:$request->place['measure_1'],
						'unidad_medida_1'=>$request->place['units_1'],
						'medio_1' => $request->place['medio_1'],
						'lineas_2' => $request->place['description_2'],
						'medida_2' => empty($request->place['measure_2'])?null:$request->place['measure_2'],
						'unidad_medida_2'=>$request->place['units_2'],
						'medio_2' => $request->place['medio_2'],
						'lineas_3' => $request->place['description_3'],
						'medida_3' => empty($request->place['measure_3'])?null:$request->place['measure_3'],
						'unidad_medida_3'=>$request->place['units_3'],
						'medio_3' => $request->place['medio_3'],	
						'lineas_4' => $request->place['description_4'],
						'medida_4' => empty($request->place['measure_4'])?null:$request->place['measure_4'],
						'unidad_medida_4'=>$request->place['units_4'],
						'medio_4' => $request->place['medio_4'],	
						'lineas_5' => $request->place['description_5'],
						'medida_5' => empty($request->place['measure_5'])?null:$request->place['measure_5'],
						'unidad_medida_5'=>$request->place['units_5'],
						'medio_5' => $request->place['medio_5'],	
						'lineas_6' => $request->place['description_6'],
						'medida_6' => empty($request->place['measure_6'])?null:$request->place['measure_6'],
						'unidad_medida_6'=>$request->place['units_6'],
						'medio_6' => $request->place['medio_6'],
						'lineas_7' => $request->place['description_7'],
						'medida_7' => empty($request->place['measure_7'])?null:$request->place['measure_7'],
						'unidad_medida_7'=>$request->place['units_7'],
						'medio_7' => $request->place['medio_7'],
						'lineas_8' => $request->place['description_8'],
						'medida_8' => empty($request->place['measure_8'])?null:$request->place['measure_8'],
						'unidad_medida_8'=>$request->place['units_8'],
						'medio_8' => $request->place['medio_8'],
						'lineas_9' => $request->place['description_9'],
						'medida_9' => empty($request->place['measure_9'])?null:$request->place['measure_9'],
						'unidad_medida_9'=>$request->place['units_9'],
						'medio_9' => $request->place['medio_9'],					
							'fk_id_informe_detallado_cabecera' =>  $id,
							'barrio' => $request->place['barrio']
						]); 
					}
				}
				else
				{
					InformeDetalladoDetalle::find($request->place['id'])->update([
						'lineas' => $request->place['description'],
						'medida' => empty($request->place['measure'])?null:$request->place['measure'],
						'unidad_medida'=>$request->place['units'],
						'medio' => $request->place['medio'],
					'lineas_1' => $request->place['description_1'],
					'medida_1' => empty($request->place['measure_1'])?null:$request->place['measure_1'],
					'unidad_medida_1'=>$request->place['units_1'],
					'medio_1' => $request->place['medio_1'],
					'lineas_2' => $request->place['description_2'],
					'medida_2' => empty($request->place['measure_2'])?null:$request->place['measure_2'],
					'unidad_medida_2'=>$request->place['units_2'],
					'medio_2' => $request->place['medio_2'],	
					'lineas_3' => $request->place['description_3'],
					'medida_3' => empty($request->place['measure_3'])?null:$request->place['measure_3'],
					'unidad_medida_3'=>$request->place['units_3'],
					'medio_3' => $request->place['medio_3'],
					'lineas_4' => $request->place['description_4'],
					'medida_4' => empty($request->place['measure_4'])?null:$request->place['measure_4'],
					'unidad_medida_4'=>$request->place['units_4'],
					'medio_4' => $request->place['medio_4'],
					'lineas_5' => $request->place['description_5'],
					'medida_5' => empty($request->place['measure_5'])?null:$request->place['measure_5'],
					'unidad_medida_5'=>$request->place['units_5'],
					'medio_5' => $request->place['medio_5'],	
					'lineas_6' => $request->place['description_6'],
					'medida_6' => empty($request->place['measure_6'])?null:$request->place['measure_6'],
					'unidad_medida_6'=>$request->place['units_6'],
					'medio_6' => $request->place['medio_6'],
					'lineas_7' => $request->place['description_7'],
					'medida_7' => empty($request->place['measure_7'])?null:$request->place['measure_7'],
					'unidad_medida_7'=>$request->place['units_7'],
					'medio_7' => $request->place['medio_7'],
					'lineas_8' => $request->place['description_8'],
					'medida_8' => empty($request->place['measure_8'])?null:$request->place['measure_8'],
					'unidad_medida_8'=>$request->place['units_8'],
					'medio_8' => $request->place['medio_8'],
					'lineas_9' => $request->place['description_9'],
					'medida_9' => empty($request->place['measure_9'])?null:$request->place['measure_9'],
					'unidad_medida_9'=>$request->place['units_9'],
					'medio_9' => $request->place['medio_9'],	
					'barrio' => $request->place['barrio']
					]);
					foreach ($request->place['files'] as $file) {
						Multimedia::create([
							'fk_id_informe_detallado_cabecera' => $id,
							'fk_id_informe_detallado_detalle' => $request->place['id'],
							'fotos_detalle' => $this->uploadFile($file, $id),
						]);
					}
					foreach ($request->place['videos'] as $file) {
						Multimedia::create([
							'fk_id_informe_detallado_cabecera' => $id,
							'fk_id_informe_detallado_detalle' => $request->place['id'],
							'nota_detalle' => $this->uploadFile($file, $id),
						]);
					}					
				}				
			}			
            // Recibidor
                InformeDetalladoDetalle::find($request->receiver['id'])->update([
                    'tamano_prox_recibidor' =>  empty($request->receiver['size'])?null:$request->receiver['size'],
                    'aparador' => $request->receiver['sideboard'],
                    'armario' => $request->receiver['type'],
                    'armario_num_puertas'=>$request->receiver['closet'],
                    'almacenamiento' => $request->receiver['storage'],
                    'sepuede_sacar_algo_mueble_recibidor' => $request->receiver['take'],    
                ]);

                foreach ($request->receiver['files'] as $file) {
                    Multimedia::create([
                        'fk_id_informe_detallado_cabecera' => $id,
                        'fk_id_informe_detallado_detalle' => $request->receiver['id'],
                        'fotos_detalle' => $this->uploadFile($file, $id),
                    ]);
                }
                foreach ($request->receiver['videos'] as $file) {
                    Multimedia::create([
                        'fk_id_informe_detallado_cabecera' => $id,
                        'fk_id_informe_detallado_detalle' => $request->receiver['id'],
                        'nota_detalle' => $this->uploadFile($file, $id),
                    ]);
                }  

            // SalÃ³n
                foreach ($request->salons as $salon) {
                    if ($salon['id'] == null) {
                        $new = InformeDetalladoDetalle::create([
                            'type' => 0,
                            'created_at' => Carbon::now()->format('Y-m-d'),
                            'tamano_aproximado_salon' => empty($salon['size'])?null:$salon['size'],
                            'muebles_salon' => json_encode($salon['furniture']['pieceOfFurniture']),
                            'salon_para' => $salon['furniture']['for'],
                            'venta_salon' => $salon['windoww'],
                            'orientacion_salon' => $salon['orientation'],
                            'tipo_ventana_salon' => $salon['typeOfWindow']['windoww'],
                            'pintura_salon' => $salon['painting'],
                            'salon_pared' => $salon['wall'],
                            'tipo_suelo_salon' => $salon['typeOfSoil']['type'],
                            'salon_estrenar_tipo_ventana' => $salon['typeOfWindow']['brandNew'],
                            'salon_cambiado_hace_tipo_ventana' => $salon['typeOfWindow']['changed']['year'].'-'.$salon['typeOfWindow']['changed']['month'],
                            'salon_puesta_hace_tipo_ventana'=> $salon['typeOfWindow']['putting']['year'].'-'.$salon['typeOfWindow']['putting']['month'],
                            'salon_pintuta_cambiada_hace' => $salon['paints']['justPainted']['year'].'-'.$salon['paints']['justPainted']['month'],
                            'salon_tipo_suelo_estrenar' => $salon['typeOfSoil']['brandNew'],
                            'salon_tipo_suelo_cambiado' => $salon['typeOfSoil']['changed']['year'].'-'.$salon['typeOfSoil']['changed']['month'],
                            'salon_tipo_suelo_puesto' => $salon['typeOfSoil']['putting']['year'].'-'.$salon['typeOfSoil']['putting']['month'],
                            'salon_dormitorio_balcon_m' => $salon['balcony'],
							'salon_dormitorio_tereza_m' => $salon['terrace'],
							'salon_muebles_sofa' => $salon['muebles']['sofa'],
							'salon_muebles_sofa_cama' => $salon['muebles']['sofa_cama'],
							'salon_muebles_tv' => $salon['muebles']['tv'],
							'salon_muebles_mesa_comedor' => $salon['muebles']['mesa_comedor'],
                            'aire_condicionado_salon' => $salon['airConditioner'],
                            'sepuede_sacar_algo_mueble_salon' => $salon['take'],
                            'salon_dclimati' => $salon['dclimalit'],
                            'fk_id_informe_detallado_cabecera' => $id,
                            'user_id' => auth()->user()->id
                        ]);

                        $salon['id'] = $new->id;
                    } else {
                        InformeDetalladoDetalle::find($salon['id'])->update([
                            'tamano_aproximado_salon' => empty($salon['size'])?null:$salon['size'],
                            'muebles_salon' => json_encode($salon['furniture']['pieceOfFurniture']),
                            'salon_para' => $salon['furniture']['for'],
                            'venta_salon' => $salon['windoww'],
                            'orientacion_salon' => $salon['orientation'],
                            'tipo_ventana_salon' => $salon['typeOfWindow']['windoww'],
                            'pintura_salon' => $salon['painting'],
                            'salon_pared' => $salon['wall'],
                            'tipo_suelo_salon' => $salon['typeOfSoil']['type'],
                            'salon_estrenar_tipo_ventana' => $salon['typeOfWindow']['brandNew'],
                            'salon_cambiado_hace_tipo_ventana' => $salon['typeOfWindow']['changed']['year'].'-'.$salon['typeOfWindow']['changed']['month'],
                            'salon_puesta_hace_tipo_ventana'=> $salon['typeOfWindow']['putting']['year'].'-'.$salon['typeOfWindow']['putting']['month'],
                            'salon_pintuta_cambiada_hace' => $salon['paints']['justPainted']['year'].'-'.$salon['paints']['justPainted']['month'],
                            'salon_tipo_suelo_estrenar' => $salon['typeOfSoil']['brandNew'],
                            'salon_tipo_suelo_cambiado' => $salon['typeOfSoil']['changed']['year'].'-'.$salon['typeOfSoil']['changed']['month'],
                            'salon_tipo_suelo_puesto' => $salon['typeOfSoil']['putting']['year'].'-'.$salon['typeOfSoil']['putting']['month'],
                            'salon_dormitorio_balcon_m' => $salon['balcony'],
                            'salon_dormitorio_tereza_m' => $salon['terrace'],
							'salon_muebles_sofa' => $salon['muebles']['sofa'],
							'salon_muebles_sofa_cama' => $salon['muebles']['sofa_cama'],
							'salon_muebles_tv' => $salon['muebles']['tv'],
							'salon_muebles_mesa_comedor' => $salon['muebles']['mesa_comedor'],							
                            'aire_condicionado_salon' => $salon['airConditioner'],
                            'sepuede_sacar_algo_mueble_salon' => $salon['take'],
                            'salon_dclimati' => $salon['dclimalit']
                        ]);
                    }
                    
                    foreach ($salon['files'] as $file) {
                        Multimedia::create([
                            'fk_id_informe_detallado_cabecera' => $id,
                            'fk_id_informe_detallado_detalle' => $salon['id'],
                            'fotos_detalle' => $this->uploadFile($file, $id),
                        ]);
                    }
                    
                    foreach ($salon['videos'] as $file) {
                        Multimedia::create([
                            'fk_id_informe_detallado_cabecera' => $id,
                            'fk_id_informe_detallado_detalle' => $salon['id'],
                            'nota_detalle' => $this->uploadFile($file, $id),
                        ]);
                    }
                }
            // Cocina
                foreach ($request->kitchens as $kitchen) {
                    if ($kitchen['id'] == null) {
                        $new = InformeDetalladoDetalle::create([
                            'type' => 1,
                            'created_at' => Carbon::now()->format('Y-m-d'),
                            'tanano_aproximado_cocina' => empty($kitchen['size'])?null:$kitchen['size'],
                            'estado_cocina' => $kitchen['state']['state'],
                            'cocina_estado_estrenar' => $kitchen['state']['brandNew'],
                            'cocina_estado_reformada' => $kitchen['state']['reformedAgo']['year'].'-'.$kitchen['state']['reformedAgo']['month'],
                            'tipo_cocina' => $kitchen['typeOfKitchen'],
                            'ventana_cocina' => $kitchen['windoww'],
                            'tipo_ventana_cocina' => $kitchen['typeOfWindow']['windoww'],
                            'cocina_tipo_ventana_estrenar' => $kitchen['typeOfWindow']['brandNew'],
                            'cocina_tipo_ventana_cambiado' => $kitchen['typeOfWindow']['changed']['year'].'-'.$kitchen['typeOfWindow']['changed']['month'],
                            'cocina_tipo_ventana_puesta' => $kitchen['typeOfWindow']['putting']['year'].'-'.$kitchen['typeOfWindow']['putting']['month'],
                            'cocina_balcon_m' => $kitchen['balcony'],
                            'cocina_terreza_m' => $kitchen['terrace'],
                            'cocina_equipaje_extractor' => $kitchen['luggage']['extractor'],
                            'cocina_equipaje_microondas' => $kitchen['luggage']['microwaveOven'],
                            'cocina_equipaje_horno' => $kitchen['luggage']['oven'],
                            'cocina_equipaje_nevera' => $kitchen['luggage']['fridge'],
                            'cocina_equipaje_lavadora' => $kitchen['luggage']['washingMachine'],
                            'cocina_equipaje_secadora' => $kitchen['luggage']['dryer'],
							'cocina_equipaje_lavaseca' => $kitchen['luggage']['washingDryer'],
                            'cocina_equipaje_lavavajillas' => $kitchen['luggage']['dishwasher'],
							'cocina_equipaje_menaje' => $kitchen['luggage']['menaje'],
							'cocina_equipaje_lavadero' => $kitchen['luggage']['lavadero'],
                            'cocina_fuego_vitroceramica' => $kitchen['typeOfFire']['vitroceramica'],
							'cocina_fuego_induccion' => $kitchen['typeOfFire']['induccion'],
                            'cocina_fuego_gas_nuevo' => $kitchen['typeOfFire']['naturalGas'],
                            'cocina_fuego_placa_electronica' => $kitchen['typeOfFire']['electricPlate'],
                            'cocina_fuego_bombonra_gas' => $kitchen['typeOfFire']['dasCylinder'],
                            'tipo_suelo_cocina' => $kitchen['typeOfSoil']['type'],
                            'cocina_tipo_suelo_estrenar' => $kitchen['typeOfSoil']['brandNew'],
                            'cocina_tipo_suelo_cambiado' => $kitchen['typeOfSoil']['changed']['year'].'-'.$kitchen['typeOfSoil']['changed']['month'],
                            'cocina_tipo_suelo_puesto' => $kitchen['typeOfSoil']['putting']['year'].'-'.$kitchen['typeOfSoil']['putting']['month'],
                            'cocina_dclimati' => $kitchen['dclimalit'],
                            'sepuede_sacar_algo_mueble_cocina' => $kitchen['take'],
                            'fk_id_informe_detallado_cabecera' => $id,
                            'user_id' => auth()->user()->id
                        ]);

                        $kitchen['id'] = $new['id'];
                    } else {
                        InformeDetalladoDetalle::find($kitchen['id'])->update([
                            'tanano_aproximado_cocina' =>  empty($kitchen['size'])?null:$kitchen['size'],
                            'estado_cocina' => $kitchen['state']['state'],
                            'cocina_estado_estrenar' => $kitchen['state']['brandNew'],
                            'cocina_estado_reformada' => $kitchen['state']['reformedAgo']['year'].'-'.$kitchen['state']['reformedAgo']['month'],
                            'tipo_cocina' => $kitchen['typeOfKitchen'],
                            'ventana_cocina' => $kitchen['windoww'],
                            'tipo_ventana_cocina' => $kitchen['typeOfWindow']['windoww'],
                            'cocina_tipo_ventana_estrenar' => $kitchen['typeOfWindow']['brandNew'],
                            'cocina_tipo_ventana_cambiado' => $kitchen['typeOfWindow']['changed']['year'].'-'.$kitchen['typeOfWindow']['changed']['month'],
                            'cocina_tipo_ventana_puesta' => $kitchen['typeOfWindow']['putting']['year'].'-'.$kitchen['typeOfWindow']['putting']['month'],
                            'cocina_balcon_m' => $kitchen['balcony'],
                            'cocina_terreza_m' => $kitchen['terrace'],
                            'cocina_equipaje_extractor' => $kitchen['luggage']['extractor'],
                            'cocina_equipaje_microondas' => $kitchen['luggage']['microwaveOven'],
                            'cocina_equipaje_horno' => $kitchen['luggage']['oven'],
                            'cocina_equipaje_nevera' => $kitchen['luggage']['fridge'],
                            'cocina_equipaje_lavadora' => $kitchen['luggage']['washingMachine'],
                            'cocina_equipaje_secadora' => $kitchen['luggage']['dryer'],
							'cocina_equipaje_lavaseca' => $kitchen['luggage']['washingDryer'],
                            'cocina_equipaje_lavavajillas' => $kitchen['luggage']['dishwasher'],
							'cocina_equipaje_menaje' => $kitchen['luggage']['menaje'],
							'cocina_equipaje_lavadero' => $kitchen['luggage']['lavadero'],
                            'cocina_fuego_vitroceramica' => $kitchen['typeOfFire']['vitroceramica'],
							'cocina_fuego_induccion' => $kitchen['typeOfFire']['induccion'],
                            'cocina_fuego_gas_nuevo' => $kitchen['typeOfFire']['naturalGas'],
                            'cocina_fuego_placa_electronica' => $kitchen['typeOfFire']['electricPlate'],
                            'cocina_fuego_bombonra_gas' => $kitchen['typeOfFire']['dasCylinder'],
                            'tipo_suelo_cocina' => $kitchen['typeOfSoil']['type'],
                            'cocina_tipo_suelo_estrenar' => $kitchen['typeOfSoil']['brandNew'],
                            'cocina_tipo_suelo_cambiado' => $kitchen['typeOfSoil']['changed']['year'].'-'.$kitchen['typeOfSoil']['changed']['month'],
                            'cocina_tipo_suelo_puesto' => $kitchen['typeOfSoil']['putting']['year'].'-'.$kitchen['typeOfSoil']['putting']['month'],
                            'cocina_dclimati' => $kitchen['dclimalit'],
                            'sepuede_sacar_algo_mueble_cocina' => $kitchen['take']
                        ]);
                    }
                    
                    foreach ($kitchen['files'] as $file) {
                        Multimedia::create([
                            'fk_id_informe_detallado_cabecera' => $id,
                            'fk_id_informe_detallado_detalle' => $kitchen['id'],
                            'fotos_detalle' => $this->uploadFile($file, $id)
                        ]);
                    }
                    
                    foreach ($kitchen['videos'] as $file) {
                        Multimedia::create([
                            'fk_id_informe_detallado_cabecera' => $id,
                            'fk_id_informe_detallado_detalle' => $kitchen['id'],
                            'nota_detalle' => $this->uploadFile($file, $id)
                        ]);
                    }
                }
            // Dormitorios
                foreach ($request->bedrooms as $bedroom) {
                    if ($bedroom['id'] == null) {
                        $new = InformeDetalladoDetalle::create([
                            'type' => 2,
                            'created_at' => Carbon::now()->format('Y-m-d'),
                            'tamano_aproximado_dormitorio' => empty($bedroom['size'])?null:$bedroom['size'],
                            'tamano_dormitorio' => $bedroom['sizeBedroom'],
                            'tipo_cama_dormitorio' => $bedroom['typeBed'],
							'canape_dormitorio' => $bedroom['canape'],
                            'armarios_dormitorio'=> $bedroom['closet'],
                            'dormitorio_armarios_dormitorio_puertas' => $bedroom['doors'],
                            'ventana_dormitorio' => $bedroom['windoww'],
                            'orientacion_dormitorio' => $bedroom['orientation'],
                            'tipo_ventana_dormitorio' => $bedroom['typeOfWindowwindoww'],
                            'dormitorio_tipo_ventana_estrenar' => $bedroom['typeOfWindowbrandNew'],
                            'dormitorio_tipo_ventana_cambiado' => $bedroom['typeOfWindowchangedyear'].'-'.$bedroom['typeOfWindowchangedmonth'],
                            'dormitorio_tipo_ventana_puesto' => $bedroom['typeOfWindowputtingyear'].'-'.$bedroom['typeOfWindowputtingmonth'],
                            'dormitorio_balcon_m' => $bedroom['balcony'],
                            'dormitorio_terreza_m' => $bedroom['terrace'],
                            'dormirotio_pared' => $bedroom['wall'],
                            'sepuede_sacar_algo_mueble_dormirorio' => $bedroom['take'],
                            'dormitorio_dclimati' => $bedroom['dclimalit'],
							'dormitorio_muebles_sofa' => $bedroom['sofa'],
							'dormitorio_muebles_sofa_cama' => $bedroom['sofa_cama'],
							'dormitorio_muebles_tv' => $bedroom['tv'],
							'dormitorio_muebles_mesa_comedor' => $bedroom['mesa_comedor'],
							'dormitorio_muebles_escritorio' => $bedroom['escritorio'],
							'dormitorio_muebles_comoda' => $bedroom['comoda'],							
                            'aire_condicionado_dormitorio' => $bedroom['airConditioner'],
                            'pintura_dormitorio' => $bedroom['painting'],
                            'dormitorio_pintura_recien' => $bedroom['paintspaintedMakesyear'].'-'.$bedroom['paintspaintedMakesmonth'],
                            'dormitorio_pintura_recien_pintada' => $bedroom['paintsjustPaintedyear'].'-'.$bedroom['paintsjustPaintedmonth'],
                            'dormitorio_pared' => $bedroom['wall'],
                            'tipo_suelo_dormitorio' => $bedroom['typeOfSoiltype'],
                            'dormitorio_tipo_suelo_estrenar' => $bedroom['typeOfSoilbrandNew'],
                            'dormitorio_tipo_suelo_cambiado' => $bedroom['typeOfSoilchangedyear'].'-'.$bedroom['typeOfSoilchangedmonth'],
                            'dormitorio_tipo_suelo_puesto' => $bedroom['typeOfSoilputtingyear'].'-'.$bedroom['typeOfSoilputtingmonth'],
                            'en_suite' => $bedroom['suite'],
                            'fk_id_informe_detallado_cabecera' => $id,
                            'user_id' => auth()->user()->id,
                            'precio' => array_key_exists('precio', $bedroom) ?  $bedroom['precio'] : 0,
                        ]);

                        $bedroom['id'] = $new['id'];
                    } else {
                        InformeDetalladoDetalle::find($bedroom['id'])->update([
                            'tamano_aproximado_dormitorio' => empty($bedroom['size'])?null:$bedroom['size'],
                            'tamano_dormitorio' => $bedroom['sizeBedroom'],
                            'tipo_cama_dormitorio' => $bedroom['typeBed'],
							'canape_dormitorio' => $bedroom['canape'],
                            'armarios_dormitorio'=> $bedroom['closet'],
                            'dormitorio_armarios_dormitorio_puertas' => $bedroom['doors'],
                            'ventana_dormitorio' => $bedroom['windoww'],
                            'orientacion_dormitorio' => $bedroom['orientation'],
                            'tipo_ventana_dormitorio' => $bedroom['typeOfWindowwindoww'],
                            'dormitorio_tipo_ventana_estrenar' => $bedroom['typeOfWindowbrandNew'],
                            'dormitorio_tipo_ventana_cambiado' => $bedroom['typeOfWindowchangedyear'].'-'.$bedroom['typeOfWindowchangedmonth'],
                            'dormitorio_tipo_ventana_puesto' => $bedroom['typeOfWindowputtingyear'].'-'.$bedroom['typeOfWindowputtingmonth'],
                            'dormitorio_balcon_m' => $bedroom['balcony'],
                            'dormitorio_terreza_m' => $bedroom['terrace'],
                            'dormirotio_pared' => $bedroom['wall'],
                            'sepuede_sacar_algo_mueble_dormirorio' => $bedroom['take'],
                            'dormitorio_dclimati' => $bedroom['dclimalit'],
							'dormitorio_muebles_sofa' => $bedroom['sofa'],
							'dormitorio_muebles_sofa_cama' => $bedroom['sofa_cama'],
							'dormitorio_muebles_tv' => $bedroom['tv'],
							'dormitorio_muebles_mesa_comedor' => $bedroom['mesa_comedor'],
							'dormitorio_muebles_escritorio' => $bedroom['escritorio'],
							'dormitorio_muebles_comoda' => $bedroom['comoda'],							
                            'aire_condicionado_dormitorio' => $bedroom['airConditioner'],
                            'pintura_dormitorio' => $bedroom['painting'],
                            'dormitorio_pintura_recien' => $bedroom['paintspaintedMakesyear'].'-'.$bedroom['paintspaintedMakesmonth'],
                            'dormitorio_pintura_recien_pintada' => $bedroom['paintsjustPaintedyear'].'-'.$bedroom['paintsjustPaintedmonth'],
                            'dormitorio_pared' => $bedroom['wall'],
                            'tipo_suelo_dormitorio' => $bedroom['typeOfSoiltype'],
                            'dormitorio_tipo_suelo_estrenar' => $bedroom['typeOfSoilbrandNew'],
                            'dormitorio_tipo_suelo_cambiado' => $bedroom['typeOfSoilchangedyear'].'-'.$bedroom['typeOfSoilchangedmonth'],
                            'dormitorio_tipo_suelo_puesto' => $bedroom['typeOfSoilputtingyear'].'-'.$bedroom['typeOfSoilputtingmonth'],
                            'en_suite' => $bedroom['suite'],
                            'precio' => array_key_exists('precio', $bedroom) ?  $bedroom['precio'] : 0,
                        ]);
                    }
                    
                    foreach ($bedroom['files'] as $file) {
                        Multimedia::create([
                            'fk_id_informe_detallado_cabecera' => $id,
                            'fk_id_informe_detallado_detalle' => $bedroom['id'],
                            'fotos_detalle' => $this->uploadFile($file, $id)
                        ]);
                    }
                    
                    foreach ($bedroom['videos'] as $file) {
                        Multimedia::create([
                            'fk_id_informe_detallado_cabecera' => $id,
                            'fk_id_informe_detallado_detalle' => $bedroom['id'],
                            'nota_detalle' => $this->uploadFile($file, $id)
                        ]);
                    }
                }
            // Dormitorio y salÃ³n
                foreach ($request->livingRoomBedrooms as $livingRoomBedrooms) {
                    if ($livingRoomBedrooms['id'] == null) {
                        $new = InformeDetalladoDetalle::create([
                            'type' => 3,
                            'created_at' => Carbon::now()->format('Y-m-d'),
                            'tamano_aprox_salon' => empty($livingRoomBedrooms['size'])?null:$livingRoomBedrooms['size'],
                            'muebles_dormitorio_salon' => json_encode($livingRoomBedrooms['furniture']['pieceOfFurniture']),
                            'salon_dormitorio_cuantas_personas' => $livingRoomBedrooms['furniture']['for'],
                            'salon_dormitorio_pared' => $livingRoomBedrooms['wall'],
                            'salon_dormitorio_balcon_m' => $livingRoomBedrooms['balcony'],
                            'salon_dormitorio_tereza_m' => $livingRoomBedrooms['terrace'],
                            'salon_dormitorio_dclimati' => $livingRoomBedrooms['dclimalit'],
                            'sepuede_sacar_algo_mueble_salon_dormitorio' => $livingRoomBedrooms['take'],
                            'ventana_dormitorio_salon' => $livingRoomBedrooms['windoww'],
                            'salon_tipo_ventana_estrenar' => $livingRoomBedrooms['typeOfWindow']['brandNew'],
                            'salon_tipo_ventana_cambiado' => $livingRoomBedrooms['typeOfWindow']['changed']['year'].'-'.$livingRoomBedrooms['typeOfWindow']['changed']['month'],
                            'salon_tipo_ventana_puesto' => $livingRoomBedrooms['typeOfWindow']['putting']['year'].'-'.$livingRoomBedrooms['typeOfWindow']['putting']['month'],
                            'orientacion_dormitorio_salon' => $livingRoomBedrooms['orientation'],
                            'tipo_ventana_dormitorio_salon' => $livingRoomBedrooms['typeOfWindow']['windoww'],
                            'pintura_dormitorio_salon' => $livingRoomBedrooms['painting'],
                            'salon_pintura_recien' => $livingRoomBedrooms['paints']['paintedMakes']['year'].'-'.$livingRoomBedrooms['paints']['paintedMakes']['month'],
                            'salon_pintura_recien_pintada' => $livingRoomBedrooms['paints']['justPainted']['year'].'-'.$livingRoomBedrooms['paints']['justPainted']['month'],
                            'tipo_suelo_dormitorio_salon' => $livingRoomBedrooms['typeOfSoil']['type'],
                    'salon_dormitorio_tipo_suelo_estrenar' => $livingRoomBedrooms['typeOfSoil']['brandNew'],
                    'salon_dormitorio_tipo_suelo_cambiado' => $livingRoomBedrooms['typeOfSoil']['changed']['year'].'-'.$livingRoomBedrooms['typeOfSoil']['changed']['month'],
                    'salon_dormitorio_tipo_suelo_puesto' => $livingRoomBedrooms['typeOfSoil']['putting']['year'].'-'.$livingRoomBedrooms['typeOfSoil']['putting']['month'], 
							'salon_dormitorio_muebles_sofa' => $livingRoomBedrooms['muebles']['sofa'],
							'salon_dormitorio_muebles_sofa_cama' => $livingRoomBedrooms['muebles']['sofa_cama'],
							'salon_dormitorio_muebles_tv' => $livingRoomBedrooms['muebles']['tv'],
							'salon_dormitorio_muebles_mesa_comedor' => $livingRoomBedrooms['muebles']['mesa_comedor'],
							'salon_dormitorio_muebles_escritorio' => $livingRoomBedrooms['muebles']['escritorio'],
							'salon_dormitorio_muebles_comoda' => $livingRoomBedrooms['muebles']['comoda'],					
                            'aire_condicionado_dormitorio_salon' => $livingRoomBedrooms['airConditioner'],
                            'tipo_cama_dormitorio_salon' => $livingRoomBedrooms['typeBed'],
							'canape_dormitorio_salon' => $livingRoomBedrooms['canape'],
                            'armarios_dormitorio_saldon' => $livingRoomBedrooms['closet']['closet'],
                            'salon_dorimitorio_puertas' => $livingRoomBedrooms['closet']['doors'],
                            'fk_id_informe_detallado_cabecera' => $id,
                            'user_id' => auth()->user()->id
                        ]);

                        $livingRoomBedrooms['id'] = $new['id'];
                    } else {
                        InformeDetalladoDetalle::find($livingRoomBedrooms['id'])->update([
                            'tamano_aprox_salon' => empty($livingRoomBedrooms['size'])?null:$livingRoomBedrooms['size'],
                            'muebles_dormitorio_salon' => json_encode($livingRoomBedrooms['furniture']['pieceOfFurniture']),
                            'salon_dormitorio_cuantas_personas' => $livingRoomBedrooms['furniture']['for'],
                            'salon_dormitorio_pared' => $livingRoomBedrooms['wall'],
                            'salon_dormitorio_balcon_m' => $livingRoomBedrooms['balcony'],
                            'salon_dormitorio_tereza_m' => $livingRoomBedrooms['terrace'],
                            'salon_dormitorio_dclimati' => $livingRoomBedrooms['dclimalit'],
                            'sepuede_sacar_algo_mueble_salon_dormitorio' => $livingRoomBedrooms['take'],
                            'ventana_dormitorio_salon' => $livingRoomBedrooms['windoww'],
                            'salon_tipo_ventana_estrenar' => $livingRoomBedrooms['typeOfWindow']['brandNew'],
                            'salon_tipo_ventana_cambiado' => $livingRoomBedrooms['typeOfWindow']['changed']['year'].'-'.$livingRoomBedrooms['typeOfWindow']['changed']['month'],
                            'salon_tipo_ventana_puesto' => $livingRoomBedrooms['typeOfWindow']['putting']['year'].'-'.$livingRoomBedrooms['typeOfWindow']['putting']['month'],
                            'orientacion_dormitorio_salon' => $livingRoomBedrooms['orientation'],
                            'tipo_ventana_dormitorio_salon' => $livingRoomBedrooms['typeOfWindow']['windoww'],
                            'pintura_dormitorio_salon' => $livingRoomBedrooms['painting'],
                            'salon_pintura_recien' => $livingRoomBedrooms['paints']['paintedMakes']['year'].'-'.$livingRoomBedrooms['paints']['paintedMakes']['month'],
                            'salon_pintura_recien_pintada' => $livingRoomBedrooms['paints']['justPainted']['year'].'-'.$livingRoomBedrooms['paints']['justPainted']['month'],
                            'tipo_suelo_dormitorio_salon' => $livingRoomBedrooms['typeOfSoil']['type'],
                    'salon_dormitorio_tipo_suelo_estrenar' => $livingRoomBedrooms['typeOfSoil']['brandNew'],
                    'salon_dormitorio_tipo_suelo_cambiado' => $livingRoomBedrooms['typeOfSoil']['changed']['year'].'-'.$livingRoomBedrooms['typeOfSoil']['changed']['month'],
                    'salon_dormitorio_tipo_suelo_puesto' => $livingRoomBedrooms['typeOfSoil']['putting']['year'].'-'.$livingRoomBedrooms['typeOfSoil']['putting']['month'],
							'salon_dormitorio_muebles_sofa' => $livingRoomBedrooms['muebles']['sofa'],
							'salon_dormitorio_muebles_sofa_cama' => $livingRoomBedrooms['muebles']['sofa_cama'],
							'salon_dormitorio_muebles_tv' => $livingRoomBedrooms['muebles']['tv'],
							'salon_dormitorio_muebles_mesa_comedor' => $livingRoomBedrooms['muebles']['mesa_comedor'],
							'salon_dormitorio_muebles_escritorio' => $livingRoomBedrooms['muebles']['escritorio'],
							'salon_dormitorio_muebles_comoda' => $livingRoomBedrooms['muebles']['comoda'],											
                            'aire_condicionado_dormitorio_salon' => $livingRoomBedrooms['airConditioner'],
                            'tipo_cama_dormitorio_salon' => $livingRoomBedrooms['typeBed'],
							'canape_dormitorio_salon' => $livingRoomBedrooms['canape'],
                            'armarios_dormitorio_saldon' => $livingRoomBedrooms['closet']['closet'],
                            'salon_dorimitorio_puertas' => $livingRoomBedrooms['closet']['doors']
                        ]);
                    }
                    
                    foreach ($livingRoomBedrooms['files'] as $file) {
                        Multimedia::create([
                            'fk_id_informe_detallado_cabecera' => $id,
                            'fk_id_informe_detallado_detalle' => $livingRoomBedrooms['id'],
                            'fotos_detalle' => $this->uploadFile($file, $id)
                        ]);
                    }
                    
                    foreach ($livingRoomBedrooms['videos'] as $file) {
                        Multimedia::create([
                            'fk_id_informe_detallado_cabecera' => $id,
                            'fk_id_informe_detallado_detalle' => $livingRoomBedrooms['id'],
                            'nota_detalle' => $this->uploadFile($file, $id)
                        ]);
                    }
                }
            // BaÃ±o 
                foreach ($request->bathrooms as $bathroom) {
                    if ($bathroom['id'] == null) {
                        $new = InformeDetalladoDetalle::create([
                            'type' => 4,
                            'created_at' => Carbon::now()->format('Y-m-d'),
                            'tamano_aprox_banos' => empty($bathroom['size'])?null:$bathroom['size'],
                            'bano_dentro_dormitorio' => $bathroom['bathroomInBedroom'],
                            'banos_suite' => $bathroom['bathroomInBedroom'],
                            'estado_reforma_banos' => $bathroom['reformStatusstate'],
                            'banos_estado_estrenar' => $bathroom['reformStatusbrandNew'],
                            'banos_estado_reformada' => $bathroom['reformStatusreformedAgoyear'].'-'.$bathroom['reformStatusreformedAgomonth'],
                            'banos_banera' => $bathroom['bath'],
                            'banos_ducha' => $bathroom['shower'],
                            'banos_bide' => $bathroom['bidet'],
                            'banos_jacuzzi' => $bathroom['jacuzzi'],
                            'bano_dclimati' => $bathroom['dclimalit'],
                            'sepuede_sacar_algo_mueble_bano' => $bathroom['take'],
                            'venta_banos' => $bathroom['windoww'],
                            'tipo_ventana' => $bathroom['typeOfWindowwindoww'],
                            'bano_tipo_ventana_estrenar' => $bathroom['typeOfWindowbrandNew'],
                            'bano_tipo_ventana_cambiado' => $bathroom['typeOfWindowchangedyear'].'-'.$bathroom['typeOfWindowchangedmonth'],
                            'bano_tipo_ventana_puesto' => $bathroom['typeOfWindowputtingyear'].'-'.$bathroom['typeOfWindowputtingmonth'],
                            'tipo_suelo_banos' => $bathroom['typeOfSoiltype'],
                            'bano_tipo_suelo_estrenar' => $bathroom['typeOfSoilbrandNew'],
                            'bano_tipo_suelo_cambiado' => $bathroom['typeOfSoilchangedyear'].'-'.$bathroom['typeOfSoilchangedmonth'],
                            'bano_tipo_suelo_puesto' => $bathroom['typeOfSoilputtingyear'].'-'.$bathroom['typeOfSoilputtingmonth'],
                            'fk_id_informe_detallado_cabecera' => $id,
                            'user_id' => auth()->user()->id
                        ]);

                        $bathroom['id'] = $new['id'];
                    } else {
                        InformeDetalladoDetalle::find($bathroom['id'])->update([
                            'tamano_aprox_banos' => empty($bathroom['size'])?null:$bathroom['size'],
                            'bano_dentro_dormitorio' => $bathroom['bathroomInBedroom'],
                            'banos_suite' => $bathroom['bathroomInBedroom'],
                            'estado_reforma_banos' => $bathroom['reformStatusstate'],
                            'banos_estado_estrenar' => $bathroom['reformStatusbrandNew'],
                            'banos_estado_reformada' => $bathroom['reformStatusreformedAgoyear'].'-'.$bathroom['reformStatusreformedAgomonth'],
                            'banos_banera' => $bathroom['bath'],
                            'banos_ducha' => $bathroom['shower'],
                            'banos_bide' => $bathroom['bidet'],
                            'banos_jacuzzi' => $bathroom['jacuzzi'],
                            'bano_dclimati' => $bathroom['dclimalit'],
                            'sepuede_sacar_algo_mueble_bano' => $bathroom['take'],
                            'venta_banos' => $bathroom['windoww'],
                            'tipo_ventana' => $bathroom['typeOfWindowwindoww'],
                            'bano_tipo_ventana_estrenar' => $bathroom['typeOfWindowbrandNew'],
                            'bano_tipo_ventana_cambiado' => $bathroom['typeOfWindowchangedyear'].'-'.$bathroom['typeOfWindowchangedmonth'],
                            'bano_tipo_ventana_puesto' => $bathroom['typeOfWindowputtingyear'].'-'.$bathroom['typeOfWindowputtingmonth'],
                            'tipo_suelo_banos' => $bathroom['typeOfSoiltype'],
                            'bano_tipo_suelo_estrenar' => $bathroom['typeOfSoilbrandNew'],
                            'bano_tipo_suelo_cambiado' => $bathroom['typeOfSoilchangedyear'].'-'.$bathroom['typeOfSoilchangedmonth'],
                            'bano_tipo_suelo_puesto' => $bathroom['typeOfSoilputtingyear'].'-'.$bathroom['typeOfSoilputtingmonth']
                        ]);
                    }
                    
                    foreach ($bathroom['files'] as $file) {
                        Multimedia::create([
                            'fk_id_informe_detallado_cabecera' => $id,
                            'fk_id_informe_detallado_detalle' => $bathroom['id'],
                            'fotos_detalle' => $this->uploadFile($file, $id)
                        ]);
                    }
                    
                    foreach ($bathroom['videos'] as $file) {
                        Multimedia::create([
                            'fk_id_informe_detallado_cabecera' => $id,
                            'fk_id_informe_detallado_detalle' => $bathroom['id'],
                            'nota_detalle' => $this->uploadFile($file, $id)
                        ]);
                    }
                }
            // Cuarto de aseo
                foreach ($request->restrooms as $restroom) {
                    if ($restroom['id'] == null) {
                        $new = InformeDetalladoDetalle::create([
                            'type' => 5,
                            'created_at' => Carbon::now()->format('Y-m-d'),
                            'aseo_aprox_pasillo' => empty($restroom['size'])?null:$restroom['size'],
							'sepuede_sacar_algo_mueble_restrooms' => $restroom['take'],
                            'fk_id_informe_detallado_cabecera' => $id,
                            'user_id' => auth()->user()->id
                        ]);

                        $restroom['id'] = $new['id'];
                    } else {
                        InformeDetalladoDetalle::find($restroom['id'])->update([
                            'aseo_aprox_pasillo' => empty($restroom['size'])?null:$restroom['size'],
							'sepuede_sacar_algo_mueble_restrooms' => $restroom['take']
                        ]);
                    }
                    
                    foreach ($restroom['files'] as $file) {
                        Multimedia::create([
                            'fk_id_informe_detallado_cabecera' => $id,
                            'fk_id_informe_detallado_detalle' => $restroom['id'],
                            'fotos_detalle' => $this->uploadFile($file, $id)
                        ]);
                    }
                    
                    foreach ($restroom['videos'] as $file) {
                        Multimedia::create([
                            'fk_id_informe_detallado_cabecera' => $id,
                            'fk_id_informe_detallado_detalle' => $restroom['id'],
                            'nota_detalle' => $this->uploadFile($file, $id)
                        ]);
                    }
                }
            // Pasillo
                foreach ($request->hallways as $hallway) {
                    if ($hallway['id'] == null) {
                        $new = InformeDetalladoDetalle::create([
                            'type' => 6,
                            'created_at' => Carbon::now()->format('Y-m-d'),
                            'tamano_aprox_pasillo' => empty($hallway['size'])?null:$hallway['size'],
                            'almacenamiento_pasillo' => $hallway['storage'],
                            'armario_pasillo' => $hallway['closet'],
                            'pasillo_puertas' => $hallway['closetdoors'],
                            'sepuede_sacar_algo_mueble_pasillo' => $hallway['take'],
                            'fk_id_informe_detallado_cabecera' => $id,
                            'user_id' => auth()->user()->id
                        ]);

                        $hallway['id'] = $new['id'];
                    } else {
                        InformeDetalladoDetalle::find($hallway['id'])->update([
                            'tamano_aprox_pasillo' => empty($hallway['size'])?null:$hallway['size'],
                            'almacenamiento_pasillo' => $hallway['storage'],
                            'armario_pasillo' => $hallway['closet'],
                            'pasillo_puertas' => $hallway['closetdoors'],
                            'sepuede_sacar_algo_mueble_pasillo' => $hallway['take'],
                        ]);
                    }
                    
                    foreach ($hallway['files'] as $file) {
                        Multimedia::create([
                            'fk_id_informe_detallado_cabecera' => $id,
                            'fk_id_informe_detallado_detalle' => $hallway['id'],
                            'fotos_detalle' => $this->uploadFile($file, $id)
                        ]);
                    }
                    
                    foreach ($hallway['videos'] as $file) {
                        Multimedia::create([
                            'fk_id_informe_detallado_cabecera' => $id,
                            'fk_id_informe_detallado_detalle' => $hallway['id'],
                            'nota_detalle' => $this->uploadFile($file, $id)
                        ]);
                    }
                }
            // Distribuidor
                foreach ($request->dealers as $dealer) {
                    if ($dealer['id'] == null) {
                        $new = InformeDetalladoDetalle::create([
                            'type' => 7,
                            'created_at' => Carbon::now()->format('Y-m-d'),
                            'tanano_aprox_distribuidor' => empty($dealer['size'])?null:$dealer['size'],
                            'armarios_distribuidor'=> $dealer['closet'],
                            'distribuidor_armarios_puertas' => $dealer['closetdoors'],
                            'sepuede_sacar_algo_mueble_distribuidor' => $dealer['take'],
                            'fk_id_informe_detallado_cabecera' => $id,
                            'user_id' => auth()->user()->id
                        ]);

                        $dealer['id'] = $new['id'];
                    } else {
                        InformeDetalladoDetalle::find($dealer['id'])->update([
                            'tanano_aprox_distribuidor' => empty($dealer['size'])?null:$dealer['size'],
                            'armarios_distribuidor'=> $dealer['closet'],
                            'distribuidor_armarios_puertas' => $dealer['closetdoors'],
                            'sepuede_sacar_algo_mueble_distribuidor' => $dealer['take'],
                        ]);
                    }
                    
                    foreach ($dealer['files'] as $file) {
                        Multimedia::create([
                            'fk_id_informe_detallado_cabecera' => $id,
                            'fk_id_informe_detallado_detalle' => $dealer['id'],
                            'fotos_detalle' => $this->uploadFile($file, $id)
                        ]);
                    }
                    
                    foreach ($dealer['videos'] as $file) {
                        Multimedia::create([
                            'fk_id_informe_detallado_cabecera' => $id,
                            'fk_id_informe_detallado_detalle' => $dealer['id'],
                            'nota_detalle' => $this->uploadFile($file, $id)
                        ]);
                    }
                }
            // HabitaciÃ³n de servicio
                foreach ($request->serviceRooms as $serviceRoom) {
                    if ($serviceRoom['id'] == null) {
                        $new = InformeDetalladoDetalle::create([
                            'type' => 8,
                            'created_at' => Carbon::now()->format('Y-m-d'),
                            'tanano_aprox_habitacion_servicio' => empty($serviceRoom['size'])?null:$serviceRoom['size'],
							'sepuede_sacar_algo_mueble_serviceRooms' => $serviceRoom['take'],
                            'fk_id_informe_detallado_cabecera' => $id,
                            'user_id' => auth()->user()->id
                        ]);

                        $serviceRoom['id'] = $new['id'];
                    } else {
                        InformeDetalladoDetalle::find($serviceRoom['id'])->update([
                            'tanano_aprox_habitacion_servicio' => empty($serviceRoom['size'])?null:$serviceRoom['size'],
							'sepuede_sacar_algo_mueble_serviceRooms' => $serviceRoom['take']
                        ]);
                    }
                    
                    foreach ($serviceRoom['files'] as $file) {
                        Multimedia::create([
                            'fk_id_informe_detallado_cabecera' => $id,
                            'fk_id_informe_detallado_detalle' => $serviceRoom['id'],
                            'fotos_detalle' => $this->uploadFile($file, $id)
                        ]);
                    }
                    
                    foreach ($serviceRoom['videos'] as $file) {
                        Multimedia::create([
                            'fk_id_informe_detallado_cabecera' => $id,
                            'fk_id_informe_detallado_detalle' => $serviceRoom['id'],
                            'nota_detalle' => $this->uploadFile($file, $id)
                        ]);
                    }
                }
            // BaÃ±o de servicio
                foreach ($request->bathServices as $bathService) {
                    if ($bathService['id'] == null) {
                        $new = InformeDetalladoDetalle::create([
                            'type' => 9,
                            'tamano_aprox_bano_servicios' => empty($bathService['size'])?null:$bathService['size'],
							'sepuede_sacar_algo_mueble_bathServices' => $bathService['take'],
                            'fk_id_informe_detallado_cabecera' => $id,
                            'user_id' => auth()->user()->id,
                            'created_at' => Carbon::now()->format('Y-m-d'),
                        ]);

                        $bathService['id'] = $new['id'];
                    } else {
                        InformeDetalladoDetalle::find($bathService['id'])->update([
                            'tamano_aprox_bano_servicios' => empty($bathService['size'])?null:$bathService['size'],
							'sepuede_sacar_algo_mueble_bathServices' => $bathService['take']
                        ]);
                    }
                    
                    foreach ($bathService['files'] as $file) {
                        Multimedia::create([
                            'fk_id_informe_detallado_cabecera' => $id,
                            'fk_id_informe_detallado_detalle' => $bathService['id'],
                            'fotos_detalle' => $this->uploadFile($file, $id),
                        ]);
                    }
                    
                    foreach ($bathService['videos'] as $file) {
                        Multimedia::create([
                            'fk_id_informe_detallado_cabecera' => $id,
                            'fk_id_informe_detallado_detalle' => $bathService['id'],
                            'nota_detalle' => $this->uploadFile($file, $id)
                        ]);
                    }
                }

            // Elimnar
                foreach ($request->trash as $id) {
                    $trash = InformeDetalladoDetalle::find($id);
                    $trash->multimedia()->delete();
                    $trash->delete();
                }

            $informeDC = InformeDetalladoCabecera::find($id);
            //$informeDC->bathrooms = $this->getBathrooms($request);
            //$informeDC->bedrooms  = $this->getBedrooms($request);
			if ($file_garaje_update != null){
				$informeDC->hay_garaje  = 1;
			}
			else			
			{
				if  ($garaje_update_2  == null) {
					//No hago nada
					//hago esto
					if (empty($request->garage['description']) && empty($request->garage['size']) && empty($request->garage['type']) && empty($request->garage['number']))
					{
					}
					else
					{
						$informeDC->hay_garaje  = 1;
					}
				}
			}
			if ($file_trastero_update != null){
				$informeDC->hay_trastero  = 1;
			}
			else
			{
				if  ($trastero_update_2  == null) {
					//no hago nada	
					//hago esto
					if (empty($request->boxroom['description']) && empty($request->boxroom['size']))
					{
					}
					else
					{
										$informeDC->hay_trastero  = 1;
					}
				}
			}
			if ($file_garaje_update != null || $file_trastero_update != null || $file_fachada_update != null || $file_portal_update != null || 
			$file_ascensor_update != null || $file_piscina_update != null || $file_jardin_update!=null || $file_gimnasio_update != null ||
				$file_saunas_update != null || $file_zona_deportiva_update != null || $file_zona_infantil_update != null){
				$informeDC->hay_datosedificio  = 1;
			}
			 if ($file_jardin_update!=null)
			 {
					 $informeDC->jardin=1;
			 }
			 if ($file_piscina_update!=null)
			 {
					 $informeDC->piscina=1;
			 }
			 if ($file_gimnasio_update!=null)
			 {
					 $informeDC->gym=1;
			 } 
			 if ($file_saunas_update!=null)
			 {
					 $informeDC->sauna=1;
			 } 
			 if ($file_zona_deportiva_update!=null)
			 {
					 $informeDC->zona_deportiva=1;
			 } 
			 if ($file_zona_infantil_update!=null)
			 {
					 $informeDC->zona_infantil=1;
			 }  
			
			if ($flag_insert_hay_transporte>0){
				$informeDC->hay_transporte  = 1;
			}
			if ( $file_lugar_update != null){
				$informeDC->hay_barrio  = 1;
			}
			else
			{
				if  ($lugar_update_2  == null) {
					//no hago nada	
					//ahora pongo esto
					if (empty($request->place['barrio']) && empty($request->place['description']) && empty($request->place['description_1']))
					{
					}
					else
					{
						$informeDC->hay_barrio  = 1;
					}
				}
			}
			//if ($file_trastero---- || |||| || || || _update != null){
			//	//	$informeDC->hay_datosedificio  = 1;
			//}			
			//$informeDC->user_id = auth()->user()->id;
			//$informeDC->user_email = auth()->user()->email;
			$informeDC->plazas_garaje = empty($request->garage['number'])?0:$request->garage['number'];
			$informeDC->lavavajillas = empty($kitchen['luggage']['dishwasher'])?0:$kitchen['luggage']['dishwasher'];
			$informeDC->horno = empty($kitchen['luggage']['oven'])?0:$kitchen['luggage']['oven'];
            $informeDC->save();
            // Guardar
            DB::commit();
			
        } catch (\Exception $e) {
            DB::rollBack();
            
            return response([$e->getMessage()], 422);
        }

        return response(compact('id'), 200);
    }
    /**
     * Upload file
     * @param  array $file
     * @return string
     */
    private function uploadFile($file, $id) 
    {
        return $this->upload($file, "{$this->folder}/{$id}");
    }


    

  /* public function search($search)
    {
        if(auth()->user()->role_id == 1){
			$informe = InformeDetalladoCabecera::
				with('detalles')
				->where('id', 'like', "%{$search}%")
				->get();
		}else{
			$informe = InformeDetalladoCabecera::
				with('detalles')
				->where('id', 'like', "%{$search}%")
				->where('user_id',auth()->user()->id)
				//>orWhereNull('user_id')
				->get();
		}
        return response()->json($informe);
    }
*/

public function search($search)
{
    $query = InformeDetalladoCabecera::with('detalles');
    
    if (is_numeric($search)) {
        // Búsqueda por ID exacto o parcial
        $query->where('id', 'like', "%{$search}%");
    } else {
        // Búsqueda por texto (dirección, etc.)
        $query->where('direccion', 'like', "%{$search}%")
              ->orWhere('tipo_inmueble', 'like', "%{$search}%");
    }
    
    if (auth()->user()->role_id != 1) {
        $query->where('user_id', auth()->user()->id);
    }
    
    $informe = $query->get();
    
    return response()->json($informe);
} 

}
