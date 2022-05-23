<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Service;
use App\Models\WishList;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show(Product $product)
    {
        $categories=Category::all();
        $brands=Brand::all();
        $services=Service::orderBy('service_order')->get();
        $category_simulation=Category::active()->where('name',$product->category->name)->get()->first();
        $product_simulation=$category_simulation->products->take(3)->sortBy('desc');
        $products_latest=Product::active()->latest()->take(3)->get();
        $wishlist = WishList::where('user_id', 1)->get();
       
  

        return view('home.page.products.show' , compact('product','categories','services','product_simulation' ,'products_latest' ,'wishlist'));
    }
}