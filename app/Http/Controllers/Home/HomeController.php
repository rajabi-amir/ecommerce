<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Service;

use function PHPSTORM_META\type;

class HomeController extends Controller
{
    public function index(){
        $categories=Category::where('parent_id',0)->where('is_active',1)->get();
        $services=Service::orderBy('service_order')->get();
        //بنر ها
        $sliders=Banner::where('type','اسلایدر')->where('is_active',1)->orderBy('priority')->get();
        $banner_left_top=Banner::where('type','بنر-چپ-بالا')->where('is_active',1)->orderBy('priority')->get()->first();
        $banner_left_bottom=Banner::where('type','بنر-چپ-پایین')->where('is_active',1)->orderBy('priority')->get()->first();
        //محصولات
        $Products_auction_today=Product::where('position' , 'تخفیف روزانه')->where('is_active',1)->get();
        
        return view('home.page.home' , 
        compact(
        'categories' , 'sliders' , 'banner_left_top' , 
        'banner_left_bottom' ,'services',
        'Products_auction_today',
        ));
}
}
    