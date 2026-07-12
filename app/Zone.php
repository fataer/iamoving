<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Zone extends Model
{ 
	protected $table = "zone"; 
    
    public $appends = ['video'];

     /// disparador
      public static function  boot(){

    	 parent::boot();

    	 static::saving(function(Zone $zo) {
			if( ! \App::runningInConsole() ) {
         
				 // $zo->video_principal = $format; //
           if(strlen($zo->video_principal)>=16){
              $format=explode("https://youtu.be/",$zo->video_principal)[1];
           // $data=array_pad($format,-2,"");
            $zo->video_principal = $format;    
           }     

                      
			}
		});

    }

    public function getVideoAttribute()
    {
        return json_decode($this->video_principal)[0]->download_link ?? null;
    }
}
