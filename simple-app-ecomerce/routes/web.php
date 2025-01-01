<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminControllerLivre;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\UserMiddleware;
use Illuminate\Support\Facades\Route;






// login adminpage
Route::get('/admin/login',[AuthController::class,'admin_login'])->name('admin.login');
Route::post('/admin',[AuthController::class,'admin_dologin'])->name('admin.dologin');


// user
Route::get('/product/login',[AuthController::class,'user_login'])->name('product.login');
Route::post('/product',[AuthController::class,'user_dologin'])->name('product.dologin');

Route::middleware(UserMiddleware::class)->group(function(){ 
    Route::delete('/product',[AuthController::class,'user_logout'])->name('product.logout');
    // index page
    Route::get('/products/{id}/read',[AdminControllerLivre::class,'read'])->name('books.read');
    Route::get('/products/{id}/download',[AdminControllerLivre::class,'download'])->name('books.download');
    Route::get('/',[ProductController::class,'index'])->name('product.index');
});
Route::get('product/books/',[ProductController::class,'books'])->name("product.books");

Route::middleware(AdminMiddleware::class)->group(function(){
    // admin
    Route::delete('/admin',[AuthController::class,'admin_logout'])->name('admin.logout');
    Route::post('/Admin/store-categ',[AdminController::class,'store_cate'])->name('admin.store_cate');
    Route::delete('/product/{product}',[AdminController::class,'destroy'])->name('product.destroy');
    Route::post('/Admin/store',[AdminController::class,'store'])->name('admin.store');
    Route::get('/admin/index',[AdminController::class,'index'])->name("admin.index");
    Route::get('/admin/create',[AdminController::class,'create'])->name("admin.create");
    Route::get('admin/create_cat',[AdminController::class,'create_cate'])->name("admin.create_cat");
    Route::get('/admin/create_livre',[AdminControllerLivre::class,'create_liv'])->name("admin_livre.create");
    Route::post('/Admin/store_livre',[AdminControllerLivre::class,'store_liv'])->name("admin_livre.store");

});



