<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
//        return 'hello';         //basic memory usage 18mb roughly //after query load its 20mb

        $posts = \App\Models\Post::latest()
            ->filter(request(['search', 'category', 'author']))                    // scopeFilter [ takes an array with search as key ]
            ->with('category', 'author')
//                    ->get();
            ->paginate(5)->withQueryString();                   //withQueryString()  -new page links will be with query string
        return view('posts.index', [
            'posts' => $posts,
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }
}
