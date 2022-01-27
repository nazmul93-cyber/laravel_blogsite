<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostCommentsController extends Controller
{
    public function store(Post $post) {
//        dd(request()->all());
       request()->validate([
           'body' => 'required',
       ]);


        $post->comments()->create([
//            'user_id' => request()->user()->id,
//            'user_id' => auth()->id(),
            'user_id' => auth()->user()->id,
            'body' => request('body'),
        ]);

        return back();
    }
}
