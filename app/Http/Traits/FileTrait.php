<?php

namespace App\Http\Traits;

use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Image;

trait FileTrait {

    private function storage()
    {
        return Storage::disk('public');
    }

    public function upload($file, $path)
    {
        $width = 798;
        $height = 599;

        if (gettype($file) != "Array") 
        {
            $file = new File($_FILES[$file['id']]['tmp_name']);
        }

        $filename = $file->hashName();

        $this->storage()->put($path, $file);
        //Generate thumbnail
        $nameExtension = pathinfo($filename);
        if ( in_array($nameExtension['extension'], array("jpeg","jpg","webp","png")) ) {
            $storagePath = config('paths.custom_storage_without_slash');
            //$img = '/home/u819346592/domains/iamoving.com/public_html/storage' . $path . '/' . $filename;
            $img = $storagePath . $path . '/' . $filename;
			//$realImg = '/home/u819346592/domains/iamoving.com/public_html/storage' . $path . '/' . $filename;
			$realImg = $storagePath . $path . '/' . $filename;
            list($old_width, $old_height) = getimagesize($img);

            /*$new_image = imagecreatetruecolor($width, $height);
            $old_image = imagecreatefromjpeg($file);
            imagecopyresampled($new_image, $old_image, 0, 0, 0, 0, $width, $height, $old_width, $old_height);*/

            $filename_no_ext = preg_replace('/\\.[^.\\s]{3,4}$/', '', $img);
            /*imagejpeg($new_image, $filename_no_ext . '_' . $width . 'x' . $height . '.jpg');
            imagedestroy($old_image);
            imagedestroy($new_image);*/
            
            /*$wimg = Image::make($realImg);

            $wimg->text('IAMoving', 390, 300, function ($font) {
                $font->file('/home/u819346592/domains/iamoving.com/public_html/fonts/RobotoMono-VariableFont_wght.ttf');
                $font->size(20);
                $font->color('#858585');
                $font->align('center');
                $font->valign('top');
                $font->angle(0);
            });
            $wimg->save($filename_no_ext . '_' . $width . 'x' . $height . '.jpg');*/
           
            //$wimg = Image::make($realImg);
			if ($old_width>$old_height){
			$wimg = Image::make($realImg)->resize($width, $height);
            // Insertar marca de agua, centro
            //$wimg->insert('/home/u819346592/domains/iamoving.com/public_html/storage' .  '/iamoving_white_transparent.jpg', 'center', 20, 100);
            $wimg->insert($storagePath .  '/iamoving_white_transparent.jpg', 'center', 20, 100);
            $wimg->save($filename_no_ext . '_' . $width . 'x' . $height . '.jpg', 75);
			}else{
				//fotos verticales
				$width = 449;
				$width_name= 798;
				$height_name=599;
				$height=599;
				$wimg = Image::make($realImg)->resize($width, $height);
				// Insertar marca de agua, centro
				//$wimg->insert('/home/u819346592/domains/iamoving.com/public_html/storage' .  '/iamoving_white_transparent.jpg', 'center', 20, 100);				
				$wimg->insert($storagePath .  '/iamoving_white_transparent.jpg', 'center', 20, 100);		
				$wimg->save($filename_no_ext . '_' . $width . 'x' . $height_name . '.jpg', 75);				
						//$fondo= imagecreatefromjpeg("/home/u819346592/domains/iamoving.com/public_html/storage/fondo/fondo.jpg");
						$fondo= imagecreatefromjpeg($storagePath . "/fondo/fondo.jpg");
						$fondoAlto=599;				 
						 $texto=imagecreatefromjpeg($filename_no_ext . '_' . $width . 'x' . $height_name . '.jpg');
						imagecopy($fondo,$texto,$width_name/4,$fondoAlto - $height,0,0,$width ,$height); 
						 
						// Damos salida a la imagen final 
						imagejpeg($fondo, $filename_no_ext . '_798x599.jpg');	
						// Destruimos las imágenes 
						imagedestroy($fondo); 
						imagedestroy($texto); 								
			}
            
        }

        return $filename;
    }
}