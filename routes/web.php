<?php

use App\Http\Controllers\FirstController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\LoginController;
use App\Http\Controllers\Front\RegisterController;
use App\Http\Controllers\Front\UserProfileController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

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
  Route::get('/users/details/{id}',[UserController::class,'detail'])->name('user.details');
  Route::get('/profile',[UserController::class,'profile'])->name('profile');
  Route::post('/profile/admin/store',[UserController::class,'profile_store'])->name('profile.store');


 });
  //frontController
 Route::get('/',[HomeController::class,'index'])->name('front.index');
 Route::post('/register',[HomeController::class,'register'])->name('front.register');
 Route::post('/login',[HomeController::class,'login'])->name('front.login');


 //Cartcontroller

 Route::get('/cart/index',[CartController::class,'cartindex'])->name('cart.index');
 Route::Post('/cart/store',[CartController::class,'store'])->name('cart.store');

 //loging Controller
Route::get('/user/login',[LoginController::class,'login'])->name('singin');
Route::get('/user/singin',[LoginController::class,'stored'])->name('user.login');



//Register Controller
Route::get('/user/singup',[RegisterController::class,'singup'])->name('singup');
Route::post('/user/register',[RegisterController::class,'store'])->name('user.register');

//UserprofileController
Route::get('/user/profile',[UserProfileController::class,'index'])->name('user.profile');
// Route::get('/user/profile/order',[UserProfileController::class,'index'])->name('user.order');
Route::get('/user/profile/details',[UserProfileController::class,'show'])->name('user.show');
Route::get('/user/profile/edit',[UserProfileController::class,'edit'])->name('edit.profile');
