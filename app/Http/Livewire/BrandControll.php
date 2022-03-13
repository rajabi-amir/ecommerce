<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Brand;
use Illuminate\Support\Facades\Storage;

class BrandControll extends Component
{
    public $brands  ;
    public function render()
    {
        
        $brands=Brand::all(); 

        $this->brands=$brands;  
        
        return view('livewire.brand-controll');

    }

    public function delbrand(Brand $brand){

        if (Storage::exists('brands/' . $brand->image)) {
            Storage::delete('brands/' . $brand->image);
        };
        $brand->delete();
    }

   public function Inactive_brand (Brand $brand){

       $brand->update([
        "is_active"=> false
       ]);

   }
   public function active_brand (Brand $brand){

    $brand->update([
     "is_active"=> true
    ]);

}

}