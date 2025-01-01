<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;
Route::get('/', function () {
    return view('welcome');
});





// 1
Route::get('/posts',[PostController::class,'index'])->name(name:'posts.index');
// name==>short cut :: donner un nom à l'url de la  route pour pouvoir utiliser cette url dans tous les fichiers



Route::get('/posts/create',[PostController::class,'create'])->name(name:'posts.create');

Route::get('/posts/{post}',[PostController::class,'show'])->name(name:'posts.show');

Route::post('/posts',[PostController::class,'store'])->name(name:'posts.store');

Route::get('/posts/{post}/edit',[PostController::class,'edit'])->name(name:'posts.edit');

Route::put('/posts/{post}',[PostController::class,'update'])->name('posts.update');


Route::delete('/posts/{post}',[PostController::class,'destroy'])->name('posts.destroy');


//1 Crée une nouvelle route pour afficher le contenu de la page.
//2 crée une controller de route logic code 
// crée une view dans le fichier du controller pour dirgé vers   la page test
