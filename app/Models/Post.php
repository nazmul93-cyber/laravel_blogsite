<?php


namespace App\Models;


use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use mysql_xdevapi\Exception;

class Post
{

    public static function all() {
        $files = File::files(resource_path("posts/"));
        return array_map(function($file){
//            return "foo";
            return $file->getContents();
        }, $files);
    }
    public static function find($slug) {
        if(!file_exists( $path = resource_path("posts/{$slug}.html"))) {
//           throw new Exception();
            throw new ModelNotFoundException();
        }

        return cache()->remember("post.{$slug}",5,function() use($path){
            return  file_get_contents($path);
        });





        //            if(!file_exists( $path =  __DIR__."/../resources/posts/{$slug}.html")) {
//
//
//
////        dd('File does not exist');
////        ddd('File does not exist');
////            abort(404);
//        return redirect('/');
//    }

//    $post = cache()->remember("post.{$slug}",now()->addMinute(),function() use($path){
//        var_dump("file_get_contents");     // for the one min cache test
//        return  file_get_contents($path);
//    });
//
////    $post = cache()->remember("post.{$slug}",5, fn() => file_get_contents($path));        // for php 7.4 and above

    }

}
