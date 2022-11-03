<?php

use App\Http\Controllers\Backend\AdminController;
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

Route::get('/checkout',[FrontendController::class,'checkout'])->name('checkout');

// Route::group(['prefix'=>'/admin','middleware'=>['auth']],function(){

// }

Route::group(['prefix'=>'/admin','middleware'=>['auth']],function(){
    Route::get('/dashboard',[AdminController::class,'index'])->name('dashboard');

    Route::resource('product', ProductController::class);



});


