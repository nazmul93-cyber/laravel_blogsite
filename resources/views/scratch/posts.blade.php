@extends('scratch.layout')
@section('content')
    @foreach($posts as $post)
        {{--        @dd($loop)--}}
        <article class="{{ $loop->even ? "foobar" : "" }}">
            <h1>
                <a href="posts/{{ $post->slug }}">
{{--                <a href="posts/{{ $post->id }}">--}}

                    {{   $post->title   }}

                    {{--<!--                    --><?//= $post->title;?>--}}
                </a>
            </h1>
            <p>
                <a href="categories/{{ $post->category->slug}}">{{ $post->category->name }}</a>         {{--                with this created a new n+1 issue--}}
            </p>
            <div>
                {{  $post->excerpt }}
            </div>
        </article>
    @endforeach
@endsection
