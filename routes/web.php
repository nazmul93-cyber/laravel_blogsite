<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\QueueController;
use App\Http\Controllers\JobsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\AlertController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\SendBulkEmailController;
use App\Http\Controllers\StudentController;

// use App\Jobs\CustomMailJob;
// use App\Mail\CustomMail;
use Illuminate\Support\Facades\Mail;

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

// new bulk mail queue job 
Route::get('bulk_mail', [SendBulkEmailController::class, 'sendBulkEmail']);









// pagination - ajax
Route::get('books', [BookController::class, 'books']);


// laravel ajax crud - sweetalert - pagination
Route::get('student/fetch_student', [StudentController::class, 'fetchStudent']);
Route::resource('student', StudentController::class);










// mail functions  older version
// Route::get('send-email', [MailController::class, "sendMailWithPDF"]);

// new mail function
// Route::get('mailed', function() {
//     Mail::to("target@gmail.com")->send(new CustomMail());
//     // return new CustomMail();
//     dd("Mail sent successfully");
// });

// new mail function with jobs
// Route::get('testmail', function () {
//     $details['name'] = "Target";
//     $details['email'] = "target@gmail.com";

//     dispatch(new CustomMailJob($details));

//     dd('sent');
// });


//  sweet alert 2
Route::get('users', [AlertController::class, "users"]);
Route::post('delete/{id}', [AlertController::class, "delete"]);





Route::get('/', function () {

    // Debugbar::startMeasure('render','Time for rendering');

    // $articles = Cache::remember('articles',600, function() {
    //     return Article::where('id','between',1,'and',2000)->get();
    // });   

    // Debugbar::stopMeasure('render');




    // $articles = Article::all();

    // Debugbar::info($articles);

    return view('welcome');
});



// for queue and jobs
// Route::get('queue',[QueueController::class,'runMyJob']);
// Route::get('job',[JobsController::class,'TestJob']);
Route::get('queue', [JobsController::class, 'runMyQueue']);





// for caching ArticlesController
Route::get('cache', [ArticlesController::class, 'index']);



// for upload
Route::get('upload', [UploadController::class, 'upload']);
Route::post('upload', [UploadController::class, 'uploaded']);







// for Form Validation - Registration [manual]

Route::get('/register', [RegisterController::class, 'register'])->middleware('custom');
Route::post('/register', [RegisterController::class, 'create'])->middleware('custom');



// cutom authentication logic,session,middleware  for route middleware - only works with this
Route::view('/login', 'login')->middleware('custom');
Route::post('/login', [RegisterController::class, 'login'])->middleware('custom');
Route::view('/dashboard', 'dashboard')->middleware('custom');
Route::get('/logout', [RegisterController::class, 'logout'])->middleware('custom');




// custom login using middleware and session    - for some reason group middleware doesn't work

// Route::group(['middleware'=>'web'], function() {

//     Route::get('/login','login');
//     Route::post('/login',[RegisterController::class,'login']);
//     Route::view('/dashboard','dashboard');

// });

// same with global middleware all set kernel.php with namespace    - not working for some reason
// Route::view('/login','login');
// Route::post('/login',[RegisterController::class,'login']);
// Route::view('/dashboard','dashboard');
// Route::get('/logout',[RegisterController::class,'logout']);




// for CRUD using Model

Route::get('/create', function () {

    return view('userForm');
});

Route::post('/create', [UserController::class, 'create']);

Route::get('/read', [UserController::class, 'read']);
Route::post('/read', [UserController::class, 'read']);

Route::get('/delete/{id}', [UserController::class, 'delete']);

Route::get('/update/{id}', [UserController::class, 'upForm']);

Route::post('/update', [UserController::class, 'update']);






// learnning route resource

Route::resource('product', ProductController::class);
