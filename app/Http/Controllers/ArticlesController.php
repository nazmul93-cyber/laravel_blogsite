<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Cache;
// use Illuminate\Support\Facades\Redis;    [just another trial]

// use Barryvdh\Debugbar\Facade as Debugbar;
use Debugbar;


class ArticlesController extends Controller
{
    public function index() {

        // without cache
            // $articles = Article::all();
            // return response()->json($articles);        

        // with cache  [tested: file, database, redis]

        Debugbar::startMeasure('render','Time for rendering');
        

            // $articles = Article::all();
            $articles = Article::where('id','<',20001)->get();



            // $articles = Cache::remember('articles',600, function() {

            //     // return Article::all();
            //     return Article::where('id','<',20001)->get();
            // });   

        Debugbar::stopMeasure('render');
        


        //alt
        // $articles = cache()->remember('articles',600, function() {

        //     return Article::all();
        // });   



            // Debugbar::info($articles);


            // return response()->json($articles);
            return view('cache',['kinfo' => $articles]);
            
           
    }
}
