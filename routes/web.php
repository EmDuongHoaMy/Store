<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserCatalogueController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductCatalogueController;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TestController;


Route::get('/',[HomeController::class,'home'])->name('home');
Route::get('/ajax/location/district/',[LocationController::class,'getDistrict']);
Route::get('/ajax/location/ward/',[LocationController::class,'getWard']);
Route::get('/ajax/getdoc/',[ProductCatalogueController::class,'getDescription']);
Route::get('/ajax/complete_search/',[TestController::class,'searchAutocomplete']);

Route::prefix('/user')->group(function(){
    Route::get('/login',[UserController::class,'login'])->name('user.login');
    Route::post('/login',[UserController::class,'postlogin'])->name('user.postlogin');
    Route::get('/signin',[UserController::class,'signin'])->name('user.signin');
    Route::post('/signin',[UserController::class,'postsignin'])->name('user.postsignin');
    Route::get('/logout',[UserController::class,'logout'])->name('user.logout');
    Route::get('/index',[UserController::class,'index'])->middleware(AuthMiddleware::class)->name('user.index');    
    Route::get('/add',[UserController::class,'add'])->middleware(AuthMiddleware::class)->name('user.add');
    Route::post('/create',[UserController::class,'create'])->name('user.create');
    Route::get('/edit/{id}',[UserController::class,'edit'])->middleware(AuthMiddleware::class)->name('user.edit');
    Route::post('/update/{id}',[UserController::class,'update'])->name('user.update');
    Route::post('/user_update/{id}',[UserController::class,'userUpdate'])->name('user.user_update');
    Route::get('/delete/{id}',[UserController::class,'delete'])->middleware(AuthMiddleware::class)->name('user.delete');
    Route::post('/destroy/{id}',[UserController::class,'destroy'])->name('user.destroy');
    Route::get('/info',[UserController::class,'info'])->middleware(AuthMiddleware::class)->name('user.info');
});

Route::prefix('/usercatalogue')->group(function(){
    Route::get('/index',[UserCatalogueController::class,'index'])->middleware(AuthMiddleware::class)->name('usercatalogue.index');    
    Route::get('/add',[UserCatalogueController::class,'add'])->middleware(AuthMiddleware::class)->name('usercatalogue.add');
    Route::post('/create',[UserCatalogueController::class,'create'])->name('usercatalogue.create');
    Route::get('/edit/{id}',[UserCatalogueController::class,'edit'])->middleware(AuthMiddleware::class)->name('usercatalogue.edit');
    Route::post('/update/{id}',[UserCatalogueController::class,'update'])->name('usercatalogue.update');
    Route::get('/delete/{id}',[UserCatalogueController::class,'delete'])->middleware(AuthMiddleware::class)->name('usercatalogue.delete');
    Route::post('/destroy/{id}',[UserCatalogueController::class,'destroy'])->name('usercatalogue.destroy');
});

Route::prefix('/products')->group(function(){
    Route::get('/index',[ProductController::class,'index'])->middleware(AuthMiddleware::class)->name('product.index');    
    Route::get('/add',[ProductController::class,'add'])->middleware(AuthMiddleware::class)->name('product.add');
    Route::post('/create',[ProductController::class,'create'])->name('product.create');
    Route::get('/edit/{id}',[ProductController::class,'edit'])->middleware(AuthMiddleware::class)->name('product.edit');
    Route::post('/update/{id}',[ProductController::class,'update'])->name('product.update');
    Route::get('/delete/{id}',[ProductController::class,'delete'])->middleware(AuthMiddleware::class)->name('product.delete');
    Route::post('/destroy/{id}',[ProductController::class,'destroy'])->name('product.destroy');
});

Route::prefix('/products_catalogue')->group(function(){
    Route::get('/index',[ProductCatalogueController::class,'index'])->middleware(AuthMiddleware::class)->name('productcatalogue.index');    
    Route::get('/add',[ProductCatalogueController::class,'add'])->middleware(AuthMiddleware::class)->name('productcatalogue.add');
    Route::post('/create',[ProductCatalogueController::class,'create'])->name('productcatalogue.create');
    Route::get('/edit/{id}',[ProductCatalogueController::class,'edit'])->middleware(AuthMiddleware::class)->name('productcatalogue.edit');
    Route::post('/update/{id}',[ProductCatalogueController::class,'update'])->name('productcatalogue.update');
    Route::get('/delete/{id}',[ProductCatalogueController::class,'delete'])->middleware(AuthMiddleware::class)->name('productcatalogue.delete');
    Route::post('/destroy/{id}',[ProductCatalogueController::class,'destroy'])->name('productcatalogue.destroy');
});

Route::prefix('/store')->group(function(){
    Route::get('/index',[StoreController::class,'index'])->name('store.index');    
    Route::get('/review/{id}',[StoreController::class,'review'])->name('store.review');
    Route::get('/pay',[StoreController::class,'pay'])->middleware(AuthMiddleware::class)->name('store.pay');
    Route::get('/cart',[StoreController::class,'cart'])->middleware(AuthMiddleware::class)->name('store.cart');
    Route::get('/add_to_cart',[StoreController::class,'addToCart'])->middleware(AuthMiddleware::class)->name('store.addtocart');
    Route::get('/delete_item/{id}',[StoreController::class,'deleteItem'])->middleware(AuthMiddleware::class)->name('store.deleteitem');
    Route::get('/index_by_catalogue/{id}',[StoreController::class,'index_by_catalogue'])->name('store.index_by_catalogue');    
    Route::post('/order',[StoreController::class,'order'])->middleware(AuthMiddleware::class)->name('store.order');
});

Route::get('test', [TestController::class, 'index']);
Route::get('search-autocomplete', [TestController::class, 'searchAutocomplete']);

Route::prefix('/order')->group(function(){
    Route::get('/index',[OrderController::class,"index"])->middleware(AuthMiddleware::class)->name("order.index");
    Route::get('/index/detail/{id}',[OrderController::class,"detail"])->middleware(AuthMiddleware::class)->name("order.detail");
    Route::get('/ps_order',[OrderController::class,"psOrder"])->middleware(AuthMiddleware::class)->name("order.ps_order");
    Route::get('/updateStatus/{id}',[OrderController::class,"updateStatus"])->middleware(AuthMiddleware::class)->name("order.updateStatus");
    Route::get('/own/detail/{id}',[OrderController::class,"ownDetail"])->middleware(AuthMiddleware::class)->name("order.own_detail");

});
