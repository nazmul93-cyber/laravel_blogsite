<?php

use Illuminate\Support\Facades\File;
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
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\FeatureController;

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


// laravel-8 from posts
Route::get('/', [
    \App\Http\Controllers\PostController::class, 'index'
])->name('home');

// using route model binding with custom unique slug
Route::get('/posts/{post:slug}', [
    \App\Http\Controllers\PostController::class, 'show'
]);










            // working fine
// instance of Post model $post name must be same as wild card {post} then they will be binded automatically. meaning $post id will fill wild card {post} s place

//Route::get('categories/{category:slug}', function(\App\Models\Category $category){
//    return view('posts.posts', [
//'posts' => $category->posts->load('category', 'author'),
//'currentCategory' => $category, 'categories' => \App\Models\Category::all()
//]);
//})->name('category');                 //all these functionality are managed in Post scopeFilter now

//Route::get('authors/{author:username}', function(\App\Models\User $author){
//    return view('posts.index', [
//        'posts' => $author->posts->load('category', 'author'),
//    ]);
//});





// functioning operations

//Route::get('/', function () {
//    //    $posts = []
//
//    //using laravel collection approach instead of array_map
//    $posts = \App\Models\Post::all();
//    return view('posts.posts', ['posts' => $posts]);


    //using array_map instead of foreach loop - to make another array
//    $posts = array_map(function($file){
//                $document = \Spatie\YamlFrontMatter\YamlFrontMatter::parseFile($file);
//                return new \App\Models\Post(
//                    $document->title,
//                    $document->excerpt,
//                    $document->date,
//                    $document->body(),
//                    $document->slug
//                );
//    },$files);


//    foreach ($files as $file) {
//        $document = \Spatie\YamlFrontMatter\YamlFrontMatter::parseFile($file);
//        $posts[] = new \App\Models\Post(
//            $document->title,
//            $document->excerpt,
//            $document->date,
//            $document->body(),
//            $document->slug
//        );
//    }

//    ddd($posts);
//    ddd($posts[0]);
//    ddd($posts[0]->title);


//    $document = \Spatie\YamlFrontMatter\YamlFrontMatter::parseFile(resource_path('posts/my-fourth-post.html'));    // parseFile instead of parse gets file_get_contents

    //ddd($document);
    //ddd($document->body());
    //ddd($document->matter('title'))s
//    ddd($document->title);


//    ddd(\App\Models\Post::all());
//    ddd($posts[0]->getPath());
//    ddd($posts[0]->getContents());
//    return view('posts', ['posts' => \App\Models\Post::all()]);


    // Debugbar::startMeasure('render','Time for rendering');
    // $articles = Cache::remember('articles',600, function() {
    //     return Article::where('id','between',1,'and',2000)->get();
    // });
    // Debugbar::stopMeasure('render');
    // $articles = Article::all();
    // Debugbar::info($articles);

//});




// using route model binding with default id
//Route::get('/posts/{post}', function (\App\Models\Post $post) {                     // instance of Post model $post name must be same as wild card {post} then they will be binded automatically. meaning $post id will fill wild card {post} s place
//    return view('posts.post', ['post' => $post]);
//});








//Route::get('/posts/{post}', function ($id) {                                 //introducing wild-card
//    return view('posts.post', ['post' => \App\Models\Post::findOrFail($id)]);          // refactor ctrl+alt+n  made the codes below inline
////    // task: find a post by its slug and pass it to a view called "post"
////    $post = \App\Models\Post::find($slug);                                                          // introducing Model
////    return view('post',['post' => $post]);
//
//});                          // called wildcard constraints
//})->where('post', '[A-z_\-]+');                          // called wildcard constraints

//helpers
//whereAlpha()
//whereAlphaNumeric()
//whereNumber()


// eloquent modern practices
Route::get('employee_data', [EmployeeController::class, 'index']);
Route::get('features', [FeatureController::class, 'index']);


// new bulk mail queue job
Route::get('bulk_mail', [SendBulkEmailController::class, 'sendBulkEmail']);


// pagination - ajax
Route::get('books', [BookController::class, 'books']);


// laravel ajax crud - sweetalert
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
