<?php

use App\Http\Controllers\Admin\BrandController;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//admin routes

Route::prefix('Admin-panel/managment')->name('admin.')->group(function(){


    Route::post('brands', [BrandController::class , 'active'])->name('active');
    Route::resource('brands', BrandController::class);
    
  
//admin route
Route::get('/dashboard', function () {
    return view('admin.page.dashboard');
    })->name('home');

});



Route::get('/', function () {
    return view('admin.layout.MasterAdmin')->name('home');
});

Route::get('/upl',function(){
return view('uploade');
});

Route::post('/upl',[BrandController::class,'uploade'])->name('uploade');