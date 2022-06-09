<?php

use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Auth\OtpController;
use App\Http\Controllers\Home\AddressController;
use App\Http\Controllers\Home\CartController;
use App\Http\Controllers\Home\CommentController as HomeCommentController;
use App\Http\Controllers\Home\CompareController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Home\PaymentController;
use App\Http\Controllers\Home\ProductController as HomeProductController;
use App\Http\Controllers\Home\UserProfileController;
use App\Http\Controllers\Home\WishListController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\Tags\TagControll;
use App\Http\Livewire\Home\Cart\ShowCart;
use App\Http\Livewire\Home\ProductSearch;
use App\Http\Livewire\Home\ProductsList;


//admin routes
Route::prefix('Admin-panel/managment')->name('admin.')->group(function () {

    Route::resource('products',   ProductController::class);
    Route::resource('brands',     BrandController::class);
    Route::resource('attributes', AttributeController::class)->except(['show', 'destroy']);
    Route::resource('categories', CategoryController::class);
    Route::resource('banners',    BannerController::class)->except(['show', 'destroy']);
    Route::resource('/services',  ServiceController::class)->except(['show']);
    Route::resource('/posts',     PostController::class)->except('show');
    Route::resource('/comments',  CommentController::class);
    Route::resource('/coupons',   CouponController::class);
    Route::resource('products',   ProductController::class);

    Route::get('tags/create',                         [TagControll::class, "createTag"])->name('tags.create');
    Route::get('/category-attributes/{category}',     [CategoryController::class , 'getCategoryAttributes']);
    Route::get('/products/{product}/images-edit',     [ImageController::class, 'edit'])->name('products.images.edit');
      // Edit Product Category
    Route::get('/products/{product}/category-edit',   [ProductController::class, 'editCategory'])->name('products.category.edit');
    Route::put('/products/{product}/category-update', [ProductController::class, 'updateCategory'])->name('products.category.update');
    
    Route::view('/dashboard', 'admin.page.dashboard')->name('home');

});

Route::post('/upl', [ProductController::class, 'uploadImage'])->name('uploade');
Route::post('/del', [ProductController::class, 'deleteImage'])->name('del');

Route::post('/editupl', [ImageController::class, 'edit_uploadImage'])->name('edit_uploade');
Route::post('/editdel', [ImageController::class, 'edit_deleteImage'])->name('edit_del');

Route::post('/add_image', [ImageController::class, 'setPrimary'])->name('product.images.add');

//end




// home routes
Route::get('/',[HomeController::class , 'index'])->name('home');

Route::get('/products/{product:slug}' , [HomeProductController::class , 'show'] )->name('home.products.show');

Route::get('/search/{slug?}', ProductsList::class)->name('home.products.search');
Route::get('/main/{slug}', ProductsList::class)->name('home.products.index');
Route::post('/comments/{product}', [HomeCommentController::class , 'store'])->name('home.comments.store');


Route::post('/reply/store', [HomeCommentController::class , 'replyStore'])->name('reply.add');

// otp auth
Route::post('/otp/verify', [OtpController::class , 'checkVerificationCode'])->name('otp.verify');
Route::post('/otp/resend', [OtpController::class , 'resendVerificationCode'])->name('otp.resend');
Route::post('/otp', [OtpController::class , 'sendVerificationCode'])->name('otp.auth');

Route::get('/assets/ajax', function () {
    return view('home.partial.login');
});

Route::prefix('profile')->name('home.')->group(function () {
  Route::get('/',[UserProfileController::class, 'index'])->name('user_profile');
  Route::get('/wishlist',[WishListController::class, 'usersProfileIndex'])->name('profile.wishlist.index');
  Route::get('/add-to-wishlist/{product:id}', [WishListController::class, 'add'])->name('home.wishlist.add');

  Route::get('/addreses',  [AddressController::class, 'index'])->name('addreses.index');
  Route::post('/addreses', [AddressController::class, 'store'])->name('addreses.store');
  Route::get('/addreses/{address}', [AddressController::class, 'edit'])->name('addreses.edit');
  Route::put('/addreses/{address}', [AddressController::class, 'update'])->name('addreses.update');
  Route::get('/addreses/delete/{address}', [AddressController::class, 'destroy'])->name('addreses.destroy');
});



//user route


Route::get('/add-to-compare/{product:id}', [CompareController::class, 'add'])->name('home.compare.add');

Route::get('/compare',[CompareController::class, 'index'])->name('home.compare.index');
Route::get('/remove-from-compare/{product}', [CompareController::class, 'remove'])->name('home.compare.remove');

//cart
Route::post('/add-to-cart', [CartController::class, 'add'])->name('home.cart.add');

Route::get('/cart', ShowCart::class)->name('home.cart.index');

Route::get('/remove-from-cart/{rowId}', [CartController::class, 'remove'])->name('home.cart.remove');

Route::get('/checkout', [CartController::class, 'checkout'])->name('home.orders.checkout');

Route::post('/payment', [PaymentController::class, 'payment'])->name('home.payment');

Route::get('/payment-verify/{gatewayName}', [PaymentController::class, 'paymentVerify'])->name('home.payment_verify');


Route::get('/get-province-cities-list', [AddressController::class, 'getProvinceCitiesList']);


Route::get('/test', function () {
  \Cart::clear();
  //  dd(\Cart::getContent()) ;
});