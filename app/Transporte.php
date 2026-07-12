<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Transporte extends Model
{
	protected $table = "transporte";
		
	//   public   $timestamps=false;
		
	protected $fillable = [
	  'fk_id_informe_detallado_cabecera', 
	  'tipo_transporte',
	  'parada', 
	  'lineas', 
	  'medida', 
	  'unidad_medida',
	  'medio',
	  'created_at', 
	  'updated_at'
	];
}
