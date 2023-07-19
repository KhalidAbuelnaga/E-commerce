<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use  App\Http\Controllers\Auth\RegisterController;
use  App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CartsController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\KidsController;
use App\Http\Controllers\MenController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\WomenController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', [HomeController::class , "get_home_page"]);

Route::get('search', [HomeController::class , "searchProducts"]);

Route::get('categories', [CategoryController::class , "index"]);

Route::get('register', [RegisterController::class , "register"]);

Route::post('register', [RegisterController::class , "handleRegister"]);

Route::get('login', [LoginController::class , "login"]);

Route::post('login', [LoginController::class , "handleLogin"]);

Route::get('logout', [LoginController::class , "logout"]);

Route::get('product-list', [SearchController::class , "productlist"]);

Route::get('searchproduct', [SearchController::class , "searchProduct"]);

Route::get('addUser', [UserController::class , "create"]);

Route::post('storeUser', [UserController::class , "store"]);

Route::get('profile', [ProfileController::class , "profile"]);

Route::post('profile', [ProfileController::class , "editprofile"]);

Route::middleware(['checkadmin'])->group(function(){
    Route::get('categories/create', [CategoryController::class , "create"]);
    Route::post('categories/store', [CategoryController::class , "store"]);
    Route::get('categories/{category}', [CategoryController::class , "show"]);
    Route::get('categories/destroy/{category}', [CategoryController::class , "destroy"]);
    Route::get('categories/edit/{category}', [CategoryController::class , "edit"]);
    
    Route::get('products/create', [ProductController::class , "create"]);
    Route::get('products/edit/{product}', [ProductController::class , "edit"]);
    Route::post('products/update', [ProductController::class , "update"]);
    Route::post('products/store', [ProductController::class , "store"]);
    Route::get('products/destroy/{product}', [ProductController::class , "destroy"]);

    Route::get('orders' , [OrderController::class , 'index']);
    Route::get('admin/show-orders/{orders}' , [OrderController::class , 'show']);
    Route::put('update-order/{orders}' , [OrderController::class , 'updateorder']);
    Route::get('order-history' , [OrderController::class , 'orderhistory']);

    Route::get('users' , [DashboardController::class , 'users']);
    Route::get('show-user/{users}' , [DashboardController::class , 'show']);
    
});

Route::get('products', [ProductController::class , "index"]);
Route::get('products/{product}', [ProductController::class , "show"]);
Route::get('Men', [MenController::class , "index"]);
Route::get('Women', [WomenController::class , "index"]);
Route::get('Kids', [KidsController::class , "index"]);


Route::middleware(['auth'])->group(function(){
    Route::get('wishlist' , [WishlistController::class , "index"]);
    Route::post('add-to-wishlist' , [WishlistController::class , "add"]);
    Route::get('wishlist/destroy/{wishlist}' , [WishlistController::class , "destroy"]);
    Route::get('cart' , [CartsController::class , "index"]);
    Route::post('add-to-cart' , [CartsController::class , "add"]);
    Route::get('cart/destroy/{carts}' , [CartsController::class , "destroy"]);
    Route::post('update-cart' , [CartsController::class , "updateCart"]);
    Route::get('checkout' , [CheckoutController::class , "index"]);
    Route::post('place-order' , [CheckoutController::class , 'placeorder']);
    Route::get('my-orders' , [UserController::class , 'index']);
    Route::get('show-order/{orders}' , [UserController::class , 'show']);
    
});
Route::prefix('facebook')->name('facebook.')->group( function(){
    Route::get('auth', [FaceBookController::class, 'loginUsingFacebook'])->name('login');
    Route::get('callback', [FaceBookController::class, 'callbackFromFacebook'])->name('callback');
});