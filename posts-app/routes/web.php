<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AuthController;
use Faker\Core\File;
use Illuminate\Auth\Middleware\Authenticate;


Route::get('/', [PostsController::class, 'index']);

Route::resource('posts', PostsController::class);


Route::get('/posts', [PostsController::class, 'index'])->name('posts.index');

Route::get('posts/create', [PostsController::class, 'create'])->name('posts.create')->middleware('auth');

Route::get('/posts/{post}',[PostsController::class,'show'])->name('posts.show');

Route::post('/posts',[PostsController::class,'store'])->name('posts.store');


Route::delete('/posts/{post}',[PostsController::class,'destroy'])->name('posts.destroy');

Route::get('/posts/{post}/edit',[PostsController::class,'edit'])->name('posts.edit');



// partie comment

//1==> crée une route
// 2==> crée  une conttroller 
// 3==> une page dans posts folder

Route::get('/posts/{post}/comments/create',[CommentController::class,'create'])->name('comments.create');

Route::post('/posts/{post}/comments',[CommentController::class,'store'])->name('comments.store');

Route::delete('/posts/{post}/comments/{comment}',[CommentController::class,'destroy'])->name('comments.destroy');

// liked posts  

Route::post('/posts/{post}/toggle-like',[PostsController::class,'toggleLike'])->name('posts.toggleLike');




Route::get('/users/login', [AuthController::class, 'login'])->name('users.login');
Route::post('/users/login',[AuthController::class, 'dologin'])->name('users.dologin');

Route::delete('/users',[AuthController::class,'logout'])->name('users.logout');

// affiche la formulaire de crée une neveua user
Route::get("/user/register",[AuthController::class,'singup'])->name('users.create');

// ajouter user  à la base de donneé

Route::post('users',[AuthController::class,'store'])->name('users.store');






