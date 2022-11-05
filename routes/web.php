<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CartController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Frontend\FrontendController;
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
Route::get('/remove/item//{id}',[FrontendController::class,'remove_item'])->name('remove-item');
Route::get('/addcart/{id}',[CartController::class,'add_cart']);
Route::get('/countqnt',[CartController::class,'countQnt']);
Route::get('/cartshow',[CartController::class,'cartshow']);
Route::post('/quantity/increase/{id}',[CartController::class,'increase_quantity']);




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
    



});

Route::get('product/datefilter',[ProductController::class,'dateFilter'])->name('product.filter');






