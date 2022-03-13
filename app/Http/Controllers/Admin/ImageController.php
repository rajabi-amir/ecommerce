<?php

namespace App\Http\Controllers\Admin;
use Intervention\Image\Facades\Image;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    
   public function UploadeBrandImage($request){
    if (isset($request->img)) {
        
    //درایور پیش فرض ذخیره   
    $filesystem=config('filesystems.default');

    //مسیر ذخیره سازی درایور پیش فرض
    $pach=config('filesystems.disks.'. $filesystem)['root'];

    //پسوند تصویر
    $extension = $request->file('img')->extension();
    
    //ساخت نام تصویر از هلپر فانکشن
    $image_name=Persian_generateImageName($extension);
    
    $img=Image::make($request->img)->resize(50,50);

    if (!Storage::exists('brands')) {
        // این پوشه را بساز
        Storage::makeDirectory('brands');
    }

    $img->save($pach . '/brands/' . $image_name);

    return $image_name;
}else{

return null;

    }
}
}