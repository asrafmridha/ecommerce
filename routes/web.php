<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CartController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\StripePaymentController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/',[FrontendController::class,'index'])->name('index');

Route::get('/checkout/{id}',[FrontendController::class,'checkout'])->name('checkout');
Route::get('/details/{slug}',[FrontendController::class,'details'])->name('details');
Route::get('/remove/item/{id}',[FrontendController::class,'remove_item'])->name('remove-item');

// Route::get('/remove/item/{id}',[FrontendController::class,'remove_item']);
Route::post('/addcart/{id}',[CartController::class,'add_cart']);
Route::get('/countqnt',[CartController::class,'countQnt']);
Route::get('/cartshow',[CartController::class,'cartshow']);
Route::get('/cart/countqnt',[CartController::class,'cartcount']);
Route::post('/quantity/increase/{id}',[CartController::class,'increase_quantity']);
Route::get('/cupon/apply/{cuponvalue}',[FrontendController::class,'cupon_apply']);

Route::post('/customer/information',[FrontendController::class,'customer_store'])->name('customer-information');

Route::get('user/address',[FrontendController::class,'user_address'])->name('user.address');
Route::get('user/payment',[FrontendController::class,'user_payment'])->name('user.payment');

Route::get('user/pa',[FrontendController::class,'user_paym'])->name('product.filter');




// Route::controller(StripePaymentController::class)->group(function(){
//     Route::get('stripe', 'stripe');
//     Route::post('stripe', 'stripePost')->name('stripe.post');
// });

Route::get('stripe', [StripePaymentController::class, 'stripe'])->name('stripe.index');
Route::post('stripe', [StripePaymentController::class, 'stripePost'])->name('stripe.post');


// Route::get('/dd',[ProductController::class,'fd']);

// Route::group(['prefix'=>'/admin','middleware'=>['auth']],function(){

// }

Route::group(['prefix'=>'/admin','middleware'=>['auth']],function(){
    Route::get('/dashboard',[AdminController::class,'index'])->name('dashboard');

    Route::resource('product', ProductController::class);
    
    Route::get('product/massdelete',[ProductController::class,'mass_delete'])->name('product.mass.delete');

    Route::get('admin/profile',[AdminController::class,'myprofile'])->name('admin.profile-view');

    Route::post('admin/profile/update/{id}',[AdminController::class,'profile_update'])->name('admin.profile.update');

    Route::post('admin/update/{id}',[AdminController::class,'update'])->name('admin.update');
    
    Route::post('reset/password',[AdminController::class,'reset_password'])->name('reset-password');

    Route::get('create/cupon',[AdminController::class,'create_cupon_view'])->name('cupon.create');

    Route::post('admin/cupon/store',[AdminController::class,'cupon_store'])->name('cupon.store');

});

// Route::get('product/datefilter',[ProductController::class,'dateFilter'])->name('product.filter');

// Route::get('gg',[FrontendController::class,'check']);






