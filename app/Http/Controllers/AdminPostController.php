<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public  function  index () {
        return view ('admin.posts.index', [
           'posts' => Post::paginate(50)
        ]);
    }
    public function create() {
        return view('admin.posts.create');

        // both checks can be done  - in php-8   -easier
//        if(auth()->user()?->username != 'charity55') {
//                abort(403);
//        }
    }

    public function store() {
//        ddd(request()->file('thumbnail'));
//        $path	= request()->file('thumbnail')->store('thumbnails'); return "done.$path";
        $post = new Post;
        $attributes = request()->validate([
            'title' => 'required',
            'thumbnail' => $post->exists ? ['image'] : ['required', 'image'],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post)],
        ]);

        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

       Post::create($attributes);

        return redirect('/');
    }

    public function edit(Post $post) {
        return view('admin.posts.edit', [
            'post' => $post,
        ]);
    }

    public function update(Post $post) {
        $attributes = request()->validate([
            'title' => 'required',
            'thumbnail' => $post->exists ? ['image'] : ['required', 'image'],
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post)],
        ]);

        if(isset($attributes['thumbnail'])){
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }
        $post->update($attributes);
        return back()->with('success', 'Post Updated!');
    }

    public function destroy(Post $post) {
        $post->delete();
        return back()->with('success', 'Post deleted');
    }
}
