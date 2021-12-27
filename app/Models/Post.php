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

//    protected $with = ['category', 'author'];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function author() {          //assumes foreign key is author_id whether originally it's user_id
        return $this->belongsTo(User::class, 'user_id');
    }
//    public function user() {
//        return $this->belongsTo(User::class);
//    }


    public function scopeFilter($query, array $filters) {     //Post::newQuery->filter()  -first parameter is always $query which represents querybuilder. 2nd parameter $filters which received the array sent
        $query->when($filters['search'] ?? false, fn($query, $search) =>
        $query
            ->where('title', 'like', '%'.$search.'%')
            ->orWhere('body', 'like', '%'.$search.'%')
        );

        $query->when($filters['category'] ?? false, fn($query, $category) =>
        $query
            ->whereHas('category', fn($query) => $query->where('slug', $category))
        );

        $query->when($filters['author'] ?? false, fn($query, $author) =>
            $query
                ->whereHas('author', fn($query) => $query->where('username', $author))
        );



                                        //functioning with whereExists  (but whereHas is more code efficient)
//        $query->when($filters['category'] ?? false, fn($query, $category) =>
//            $query->whereExists(fn($query) =>                                             //whereExists accepts boolean - accepts or not dep. on true or false
//                    $query
//                        ->from('categories')
//                        ->whereColumn('categories.id', 'posts.category_id')              // where takes 2nd parameter as string, here for dynamic values use whereColumn
//                        ->where('categories.slug', $category)
//            )
//        );



                             // alt way using if condition   (using when is more updated)
//        if($filters['search'] ?? false){
//            return $query
//                        ->where('title', 'like', '%'.$filters['search'].'%')
//                        ->orWhere('body', 'like', '%'.$filters['search'].'%');
////        }


                                // using request handler works fine     (Post model not suitable for handler operation)
//        if(request('search')){
//            return $query
//                    ->where('title', 'like', '%'.request('search').'%')
//                    ->orWhere('body', 'like', '%'.request('search').'%');
//        }

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
