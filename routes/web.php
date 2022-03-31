<?php

use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\TagController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\Tags\TagControll;

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

Route::prefix('Admin-panel/managment')->name('admin.')->group(function () {

    Route::resource('brands', BrandController::class);
    Route::resource('attributes', AttributeController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('tags', TagController::class);
    Route::get('tags', [TagControll::class, "show"])->name('tags');
    Route::resource('products', ProductController::class);
    Route::view('/dashboard', 'admin.page.dashboard')->name('home');
    
});



Route::get('/', function () {
    return view('admin.layout.MasterAdmin')->name('home');
});



// dropzone upload multiple image routes
Route::get('/upl', function () {
    return view('uploade');
});

Route::post('/upl', function (Request $request) {
    $images = $request->file();
    // dd($images);
    if (count($images) > 0) {
        $paths = [];
        foreach ($images['file'] as $image) {
            $ImageController = new ImageController();
            $image_name = $ImageController->UploadeImage($image, "test");
            $paths[] = ['url' => $image_name];
        }
    }
    return response()->json('success', 200);
})->name('uploade');
//end