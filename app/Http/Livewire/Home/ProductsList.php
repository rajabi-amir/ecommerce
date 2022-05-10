<?php

namespace App\Http\Livewire\Home;

use App\Models\Category;
use Livewire\Component;

class ProductsList extends Component
{
    public Category $category;
    public function render()
    {
        $products=$this->category->products()->paginate(10);
        return view('livewire.home.products-list',['products'=>$products])->extends('home.layout.MasterHome');
    }
}
