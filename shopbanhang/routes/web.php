<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\FrontendUserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderdetailController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

require_once 'frontend.php';


//giao diện chính ở layouts
// Route::get('/master', function () {
//     return view('layouts.master');
// });

//home admin 
// Route::get('/admin', function () {
//     return view('admin.index');
// })->name('admin');

Route::get('admin',[AdminController::class,'index'])->name('admin');
Route::resource('categories', CategoryController::class);
Route::resource('products', ProductController::class);
Route::resource('users', UserController::class);
Route::resource('orders', OrderController::class);
Route::resource('orderdetail', OrderdetailController::class);
Route::resource('employees', EmployeeController::class);


Route::get('login', [LoginController::class, 'show_login'])->name('auth.login');
Route::post('postlogin', [LoginController::class, 'handlle_login'])->name('auth.postlogin');
Route::get('register', [LoginController::class, 'show_register'])->name('auth.register');
Route::get('postregister', [LoginController::class, 'handle_register'])->name('auth.postregister');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');



Route::get('home', [FrontendController::class, 'index'])->name('home');
Route::get('homeusers', [FrontendUserController::class, 'index'])->name('homeUsers');
Route::get('search', [FrontendController::class, 'getSearch'])->name('search');



Route::get('category/{id}',[FrontendController::class, 'category'])->name('category');
Route::get('detail/{id}',[FrontendController::class, 'detail'])->name('detail');
Route::post('detail/{id}',[FrontendController::class, 'postComment'])->name('comment');
Route::get('cart',[FrontendController::class, 'cart'])->name('cart');
Route::get('addtocart/{id}',[FrontendController::class, 'addToCart'])->name('addtocart');


Route::post('editcart',[FrontendUserController::class, 'edit_cart'])->name('editcart');
Route::get('delete/{id}',[FrontendUserController::class, 'delete_cart'])->name('deletecart');
// Route::post('edit/{id}',[FrontendUserController::class, 'edit'])->name('edit');


