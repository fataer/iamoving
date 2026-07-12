<?php
namespace App\Http\Controllers;
//use App\Http\Traits\FileTrait;
use Illuminate\Http\Request;
use Image;
class FileController extends Controller
{
    function upload(Request $request) 
    {
        $width = 444;
        $height = 250;
        $width_name = 798;
        $height_name = 599; 
        if ($request->hasFile('file') &&  $request->has('reference') ) 
        {
            $filename = $request->file('file')->hashName();
            $path = "home/{$request->reference}";
            /*if ($request->file('file')->store("public/{$path}")) */
            if ($request->file('file')->store("{$path}")) 
            {
                $nameExtension = pathinfo($filename); 
                if ( in_array($nameExtension['extension'], array("jpeg","jpg","webp","png")) ) {
                    //Generate thumbnail
                    $storagePath = config('paths.custom_storage');
                    //$img = '/home/u819346592/domains/iamoving.com/public_html/storage/' . $path . '/' . $filename;
                    $img = $storagePath . $path . '/' . $filename;
                    //$realImg = '/home/u819346592/domains/iamoving.com/public_html/storage/' . $path . '/' . $filename;
                    $realImg = $storagePath . $path . '/' . $filename;
                    $filename_no_ext = preg_replace('/\\.[^.\\s]{3,4}$/', '', $img);
                    
                    // Usar Intervention Image para todos los tipos de imágenes
                    list($old_width, $old_height) = getimagesize($img);
                    $ratio = $old_width / $old_height;
                    
                    if ($ratio < 0.85) {
                        $width = 449;
                        $height = 599;
                        
                        // Usar Image para redimensionar (funciona con todos los formatos)
                        $wimg = Image::make($realImg)->resize($width, $height);
                        $wimg->save($filename_no_ext . '_' . $width_name . 'x' . $height_name . '.jpg', 75);
                        
                        //$fondo = imagecreatefromjpeg("/home/u819346592/domains/iamoving.com/public_html/storage/fondo/fondo.jpg");
                        $fondo = imagecreatefromjpeg($storagePath . "fondo/fondo.jpg");
                        $fondoAlto = 599;
                        $texto = imagecreatefromjpeg($filename_no_ext . '_' . $width_name . 'x' . $height_name . '.jpg');
                        imagecopy($fondo, $texto, $width_name/4, $fondoAlto - $height, 0, 0, $width, $height);
                        imagejpeg($fondo, $filename_no_ext . '_444x250.jpg');
                        imagedestroy($fondo);
                        imagedestroy($texto);
                    } else {
                        // Usar Image para redimensionar
                        $wimg = Image::make($realImg)->resize($width, $height);
                        $wimg->save($filename_no_ext . '_' . $width . 'x' . $height . '.jpg', 75);
                    }
                }
                return response()->json([ 'path' => "{$path}/{$filename}" ]);
            }
        }
        return response([]);
    }
}
