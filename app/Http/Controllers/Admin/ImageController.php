<?php

namespace App\Http\Controllers\Admin;
use Intervention\Image\Facades\Image;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    
   public function UploadeBrandImage($request ,$heigh , $width ,$path){
    if (isset($request->img)) {
        
    //درایور پیش فرض ذخیره   
    $filesystem=config('filesystems.default');

    //مسیر ذخیره سازی درایور پیش فرض
    $pach=config('filesystems.disks.'. $filesystem)['root'];

    //پسوند تصویر
    $extension = $request->file('img')->extension();
    
    //ساخت نام تصویر از هلپر فانکشن
    $image_name=Persian_generateImageName($extension);
    
    $img=Image::make($request->img)->resize($heigh,$width);

    if (!Storage::exists('brands')) {
        // این پوشه را بساز
        Storage::makeDirectory('brands');
    }

    $img->save($pach . '/' . $path . '/' . $image_name);

    return $image_name;
}else{

return null;

    }
}
}