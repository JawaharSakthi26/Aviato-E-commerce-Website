<?php

use App\Http\Controllers\Auth\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\frontend\AddressController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\frontend\CheckoutController;
use App\Http\Controllers\frontend\DashboardController;
use App\Http\Controllers\frontend\HomeController as FrontendHomeController;
use App\Http\Controllers\frontend\OrderdetailsController;
use App\Http\Controllers\frontend\OrdersController;
use App\Http\Controllers\frontend\ProductDetailsController;
use App\Http\Controllers\frontend\ProfileDetails;
use App\Http\Controllers\frontend\ShopController;
use App\Http\Controllers\frontend\UpdateaddressController;
use App\Http\Controllers\OrderlistController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserManagementController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('aviato/home',FrontendHomeController::class);
    Route::resource('/shop',ShopController::class);
    Route::resource('/productdetails',ProductDetailsController::class);
    Route::resource('/cart',CartController::class);
    Route::resource('/checkout',CheckoutController::class);
    Route::resource('/profile_details',ProfileDetails::class);
    Route::resource('/address',AddressController::class);
    Route::resource('/orders',OrdersController::class);
    Route::resource('/dashboard',DashboardController::class);
    Route::resource('/orderDetails',OrderdetailsController::class);
    Route::resource('/updateAddress',UpdateaddressController::class);
    Route::resource('/orderList',OrderlistController::class);
    Route::resource('/paymentList',PaymentsController::class);
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::middleware(['admin'])->group(function () {
        Route::get('/home', [HomeController::class, 'index'])->name('home');
        Route::resource('category',CategoryController::class);
        Route::resource('product',ProductController::class);
        Route::resource('users',UserManagementController::class);
        Route::resource('banner',BannerController::class);
    });
});
    
Route::middleware(['noauth'])->group(function () {
    Route::view('/login','index')->name('login');
    Route::view('/register','register');
    Route::post('/store',[RegisterController::class,'store']); 
    Route::post('/authenticate',[LoginController::class,'authenticate']);
});