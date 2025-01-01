<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
// Route::get('/',function(){
//     return 'API';
// });

Route::apiResource('posts',PostController::class);

Route::post('/register',[AuthController::class,'register']);

Route::post('/login',[AuthController::class,'login']);

Route::post('/logout',[AuthController::class,'logout'])->name('auth.logout')->middleware('auth:sanctum');

Route::get('/users',[AuthController::class,'GetUser'])->name('auth.getuser')->middleware('auth:sanctum');
