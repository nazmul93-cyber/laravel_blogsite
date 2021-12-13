<?php


namespace App\Models;


use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use mysql_xdevapi\Exception;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Post extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = ['title','excerpt','body','published_at'];

    public function category() {
        return $this->belongsTo(Category::class);
    }



















// working fine for file system operation

//    public $title;
//    public $excerpt;
//    public $date;
//    public $body;
//    public $slug;
//
//    /**
//     * Post constructor.
//     * @param $title
//     * @param $excerpt
//     * @param $date
//     * @param $body
//     */
//    public function __construct($title, $excerpt, $date, $body, $slug)
//    {
//        $this->title = $title;
//        $this->excerpt = $excerpt;
//        $this->date = $date;
//        $this->body = $body;
//        $this->slug = $slug;
//    }

//    public static function all()
//    {
//        return cache()->rememberForever('posts.all', function () {
//            return collect(File::files(resource_path("posts")))
//                ->map(function ($file) {                                            //convert callback to arrow function above php 7.4
//                    return \Spatie\YamlFrontMatter\YamlFrontMatter::parseFile($file);
//                })
//                ->map(function ($document) {
//                    return new \App\Models\Post(
//                        $document->title,
//                        $document->excerpt,
//                        $document->date,
//                        $document->body(),
//                        $document->slug
//                    );
////            })->sortBy('date');
//                })->sortByDesc('date');
//        });


//        $files = File::files(resource_path("posts/"));
//        return array_map(function($file){
////            return "foo";
//            return $file->getContents();
//        }, $files);
//    }

//    public static function find($slug)
//    {
//        return static::all()->firstWhere('slug', $slug);
//    }
//
//    public static function findOrFail($slug)
//    {
//
//        if (!(static::find($slug))) {
//            throw new ModelNotFoundException();
//        }
//        return static::find($slug);
//    }




//        if (!file_exists($path = resource_path("posts/{$slug}.html"))) {
////           throw new Exception();
//            throw new ModelNotFoundException();
//        }
//
//        return cache()->remember("post.{$slug}", 5, function () use ($path) {
//            return file_get_contents($path);
//        });


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
//    $post = cache()->remember("post.{$slug}",5, fn() => file_get_contents($path));        // for php 7.4 and above

//    }

}
