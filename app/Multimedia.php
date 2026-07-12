<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

 

/* estados fotos y videos

## salon
 	salon_foto
 	salon_video
##cocina
 	cocina_video
 	cocina_foto

 ##dormitorios
  	dormirotio_foto
  	dormirotio_video

##salon dormitorios
  	salon_dormitorio_foto  
  	salon_dormitorio_video
	
##baños
  	banos_foto
  	banos_video

##Aseo
 	aseo_foto
 	aseo_video

##pasillos
	pasillo_foto
	pasillo_video

##Distribuidor
	distribuidor_foto
	distribuidor_video


##Habitación de servicio
  habitacion_servicio_foto
  habitacion_servicio_video	

## baños de servicio
	banos_servicio_foto
	banos_servicio_video



  
*/

class Multimedia extends Model
{
	protected $table = "multimedia";
		
	//   public   $timestamps=false;
		
	protected $fillable = [
	  'fk_id_informe_detallado_cabecera', 
	  'fk_id_informe_detallado_detalle', 
	  'fotos_cabecera',
	  'fotos_detalle', 
	  'nota_cabecera', 
	  'nota_detalle', 
	  'created_at', 
	  'updated_at',
	  'video_session',
	  'foto_session'
	];
}
