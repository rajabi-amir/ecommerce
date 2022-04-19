<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\product;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;


class ProductComponent extends Component
{
    use WithFileUploads;

       
            public function render()
            {
                return view('livewire.admin.products.product-component',['products' => Product::latest()->paginate(10)]);
           
            }
            
    public function delproduct(product $product){

        if (Storage::exists('products/' . $product->image)) {
            Storage::delete('products/' . $product->image);
        };
        $product->delete();
    }

   public function Inactive_product (product $product){

       $product->update([
        "is_active"=> false
       ]);

   }
   public function active_product (product $product){

    $product->update([
     "is_active"=> true
    ]);

}
    }