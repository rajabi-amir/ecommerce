<?php

namespace App\Http\Controllers\Admin;

use Intervention\Image\Facades\Image;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{

    public function UploadeImage($image, $directory, $heigh = null, $width = null)
    {
        
        if ($image) {
           
            //درایور پیش فرض ذخیره
            $filesystem = config('filesystems.default');

            //مسیر ذخیره سازی درایور پیش فرض
            $pach = config('filesystems.disks.' . $filesystem)['root'];

            //پسوند تصویر
            $extension = $image->extension();

            //ساخت نام تصویر از هلپر فانکشن
            $image_name = Persian_generateImageName($extension);
            
         

            if (!Storage::exists($directory)) {
                // این پوشه را بساز
                Storage::makeDirectory($directory);
            }

            if ($heigh && $width) {
                $img = Image::make($image)->resize($heigh, $width);

                $img->save($pach . '/' . $directory . '/' . $image_name);
            } else {
                $image->storeAs($directory, $image_name);
            }

            return $image_name;
        } else {

            return null;
        }
    }
    
  
}