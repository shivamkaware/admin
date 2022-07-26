<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

//ROUTE Middelware

    Route::get('/dashboard', function () {
    return view('admin.dashboard');
    })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
Route::middleware(['auth'])->group(function () {


//Products
// Route::get('/',[ProductController::class,'dashboard'])->name('dashboard');
  Route::get('/product/create',[ProductController::class,'create'])->name('product.create');
  Route::post('/product/store',[ProductController::class,'store'])->name('store');
  Route::get('/product/index',[ProductController::class,'index'])->name('products.index');
  Route::get('/product/edit/{id}',[ProductController::class,'edit'])->name('edit');
  Route::post('/product/update/{id}',[ProductController::class,'update'])->name('update');
  Route::get('/product/delete/{id}',[ProductController::class,'delete'])->name('delete');
  Route::get('/product/datails/{id}',[ProductController::class,'detail'])->name('products.details');


  //Orders

  Route::get('/orders/index',[OrderController::class,'index'])->name('order.index');
  Route::get('/orders/confirm/{id}',[OrderController::class,'confirm'])->name('orders.confirm');
  Route::get('/orders/pending/{id}',[OrderController::class,'pending'])->name('orders.pending');
  Route::get('/orders/details/{id}',[OrderController::class,'detail'])->name('order.detail');


  //users
  Route::get('/users/index',[UserController::class,'index'])->name('users.index');
  Route::get('/users/details/{id}',[UserController::class,'detail'])->name('user.detail');

});
