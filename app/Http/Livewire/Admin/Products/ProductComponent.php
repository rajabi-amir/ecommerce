<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Tag;
use Livewire\Component;
use Livewire\WithFileUploads;


class ProductComponent extends Component
{
    use WithFileUploads;

        public $brands;
        public $tags;
        public $categories;
        public $photo=[];

        public function send(){
            dd($this->photo);
        }
     public function storeProduct($data){

        dd($data);
     }
            public function render()
            {
                $this->brands=Brand::all();
                $this->tags=Tag::all();
                $this->categories=Category::where('parent_id','!=' , 0)->get();

                return view('livewire.admin.products.product-component');
            }
    }