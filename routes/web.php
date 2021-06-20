<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UploadController;
use App\Models\Article;
use Illuminate\Support\Facades\Cache;

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

Route::get('/', function () {
    $articles = Cache::remember('articles',600, function() {
        return Article::all();
    });   
    // $articles = Article::all();
    
    Debugbar::info($articles);
    
    return view('welcome');
});


Route::get('upload',[UploadController::class,'upload']);
Route::post('upload',[UploadController::class,'uploaded']);







// for Form Validation - Registration [manual]

Route::get('/register',[RegisterController::class,'register']);
Route::post('/register',[RegisterController::class,'create']);



// custom login using middleware and session

// Route::group(['middleware'=>'web'], function() {

//     Route::get('/login','login');
//     Route::post('/login',[RegisterController::class,'login']);
//     Route::view('/dashboard','dashboard');

// });


// auth helper trial

// Route::get('/login','login');
// Route::post('/login',[RegisterController::class,'login']);
// Route::view('/dashboard','dashboard');














// for CRUD using Model

Route::get('/create', function() {

    return view('userForm');
});

Route::post('/create',[UserController::class,'create']);

Route::get('/read',[UserController::class,'read']);
Route::post('/read',[UserController::class,'read']);

Route::get('/delete/{id}',[UserController::class,'delete']);

Route::get('/update/{id}',[UserController::class,'upForm']);

Route::post('/update',[UserController::class,'update']);





