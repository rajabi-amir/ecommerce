<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\WishList;
use Illuminate\Http\Request;

class WishListController extends Controller
{
    //auth()->id()=1
    public function add(Product $product)
    {    
        if (1) {

            $wishlist = WishList::where("user_id" ,'=', 1)->where("product_id",'=', $product->id)->first();
           
            if ($wishlist) {
                Wishlist::where('product_id', $product->id)->where('user_id', 1)->delete();
                return response(['errors' => 'deleted']);
            }else {
                Wishlist::create([
                    'user_id' => 1,
                    'product_id' => $product->id
                ]);
                return response(['errors' => 'saved']);
            }
             
        } else {
            return response(['errors' => 'sign']);
        }
    }

    public function show(){
        return view('home.pages.UserProfile.wish_list');
    }

    public function usersProfileIndex()
    {
        //auth()->id()=1
        $wishlist = Wishlist::where('user_id' , 1)->get();
        
        return view('home.page.users_profile.wishlist' , compact('wishlist'));
    }
}