<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ImageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

    //admin route
    Route::get('/dashboard', function () {
        return view('admin.page.dashboard');
    })->name('home');
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
            $path = $image->store('test');
            $paths[] = ['url' => $path];
        }
    }
    return response()->json('success', 200);
})->name('uploade');
//end
