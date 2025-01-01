<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ManagerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

// appelr le controller
use  App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;

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




//  1    //
// route  c'est un class et get methode 
Route::get('/', function () {
    return view('auth/login');// la ligne suivant contient  une fonction view et passe
                             // un paramétre dans cette fonction qui est le nom du fichier 
});

// function hello($name){
//     echo  'hello '.$name;
// }
// hello("amine");






//     2       //  ===>>>> class route methode get


// créee une nouvelle route  permet d'exécuter le fichier  /posts
// Route::get('/posts',function(){
//     $localname='amine';
//     $tuto=['php','java','python'];
//     return view(/* nom de fichier=>>>*/"test",/* les varaibles =>>>>*/['name'=>$localname,'tutoriel'=>$tuto]);
// });
// le deuxiéme paramétre de fonction view contient les varaibles utiliséesdans le fichier test









//      3       // =>>>>  appeler les fonction des ficher controller


// echo TestController::class;  ===> App\Http\Controllers\TestController
// echo "<br>";
Route::get('/posts',[TestController::class,'firstAction']);
// 2 paramétre la méthode que je veux appeler dans fichier testController 
Route::get('/hello',[TestController::class,'sehello']);

Route::get('/test/{city}',[UserController::class,'getWeather']);


Route::middleware(['user-access'])->group(function () {
    Route::get('/user/dashboard', [UserController::class, 'dashboard']);
});
Route::middleware(['admin-access'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
});
Route::middleware(['manager-access'])->group(function () {
    Route::get('/manager/dashboard', [ManagerController::class, 'dashboard']);
});

// Route::middleware(['auth', 'user-access:manager'])->group(function () {
//     Route::get('/manager/dashboard', [ManagerController::class, 'dashboard']);
// });

// Route::middleware(['auth', 'user-access:user'])->group(function () {
//     Route::get('/user/dashboard', [UserController::class, 'dashboard']);
// });




Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');





// deuxiéme methode pour appler une action pour executer la methode controller 

















// hello(name:'amine');cette application de la fonction s'affchier dans tous les fichiers 