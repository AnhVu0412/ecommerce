<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\MailController;


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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/',[FrontendController::class,'index']);
Route::get('/category',[FrontendController::class,'category']);
Route::get('/view-category/{slug}',[FrontendController::class,'viewcategory']);
Route::get('category/{cate_slug}/{prd_slug}',[FrontendController::class,'productdetail']);


Auth::routes();

Route::post('add-to-cart',[CartController::class,'addProduct']);
Route::post('delete-cart-item',[CartController::class,'delete']);
Route::post('update-cart',[CartController::class,'update']);
Route::middleware(['auth'])->group(function(){
    Route::get('cart',[CartController::class,'viewCart']);
    Route::get('checkout',[CheckoutController::class,'index']);
    Route::post('place-order',[CheckoutController::class,'placeorder']);
    Route::get('send-mail',[MailController::class,'sendEmail']);


});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


    Route::middleware(['auth','isAdmin'])->group(function(){
        Route::get('/categories',[CategoryController::class,'index']);
        Route::get('/add-categories',[CategoryController::class,'add']);
        Route::post('/insert-categories',[CategoryController::class,'insert']);
        Route::get('/edit-category/{id}',[CategoryController::class,'edit']);
        Route::put('update-category/{id}',[CategoryController::class,'update']);
        Route::get('/delete-category/{id}',[CategoryController::class,'delete']);

        Route::get('products',[ProductController::class,'index']);
        Route::get('add-products',[ProductController::class,'add']);
        Route::post('insert-product',[ProductController::class,'insert']);
        Route::get('edit-product/{id}',[ProductController::class,'edit']);
        Route::put('update-product/{id}',[ProductController::class,'update']);
        Route::get('delete-product/{id}',[ProductController::class,'delete']);

});




