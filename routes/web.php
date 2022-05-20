<?php

use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\TagController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\Tags\TagControll;
use App\Http\Livewire\Home\ProductSearch;
use App\Http\Livewire\Home\ProductsList;



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

    Route::resource('products', ProductController::class);
    Route::resource('brands', BrandController::class);
    Route::resource('attributes', AttributeController::class)->except(['show', 'destroy']);
    Route::resource('categories', CategoryController::class);
    Route::resource('banners', BannerController::class)->except(['show', 'destroy']);
    // Route::resource('tags', TagController::class);
    Route::resource('/services', ServiceController::class)->except(['show']);
    Route::resource('/posts', PostController::class)->except('show');
    Route::get('tags/create', [TagControll::class, "createTag"])->name('tags.create');
    Route::resource('products', ProductController::class);
    Route::view('/dashboard', 'admin.page.dashboard')->name('home');
    Route::get('/category-attributes/{category}',[CategoryController::class , 'getCategoryAttributes']);
    Route::get('/products/{product}/images-edit', [ImageController::class, 'edit'])->name('products.images.edit');
      // Edit Product Category
    Route::get('/products/{product}/category-edit', [ProductController::class, 'editCategory'])->name('products.category.edit');
    Route::put('/products/{product}/category-update', [ProductController::class, 'updateCategory'])->name('products.category.update');

});

Route::post('/upl', [ProductController::class, 'uploadImage'])->name('uploade');
Route::post('/del', [ProductController::class, 'deleteImage'])->name('del');

Route::post('/editupl', [ImageController::class, 'edit_uploadImage'])->name('edit_uploade');
Route::post('/editdel', [ImageController::class, 'edit_deleteImage'])->name('edit_del');

Route::post('/add_image', [ImageController::class, 'setPrimary'])->name('product.images.add');

//end


 

// home routes
Route::get('/',[HomeController::class , 'index'])->name('home');
Route::get('/search/{slug?}', ProductsList::class)->name('home.products.search');
Route::get('/main/{slug}', ProductsList::class)->name('home.products.index');

Route::get('/assets/ajax', function () {
    return view('home.partial.login');
});

 
