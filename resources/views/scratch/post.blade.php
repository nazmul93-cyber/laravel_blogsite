<x-layout>
        <article>
            <h1>
                {{  $post->title    }}

            </h1>

            <p>
                By <a href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a> in <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>                         with this created a new n+1 issue
            </p>

            <div>
                {!! $post->body !!}
{{--                for safety purpose laravel blade doesn't load html, but if user is admin of a content then use this syntax to load html--}}
            </div>


{{--                    {{  $post }}--}}
{{--            <!--        --><?php //echo($post) ?>--}}
{{--                    <?= $post?>         short code for echo--}}
        </article>

</x-layout>


























{{--1st method functioning--}}
{{--@extends('scratch.components.layout')--}}
{{--@section('content')--}}
{{--    <article>--}}
{{--        <h1>--}}
{{--            {{  $post->title    }}--}}

{{--        </h1>--}}

{{--        <p>--}}
{{--            By <a href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a> in <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>         --}}{{--                with this created a new n+1 issue--}}
{{--        </p>--}}

{{--        <div>--}}
{{--            {!! $post->body !!}     --}}{{--            for safety purpose laravel blade doesn't load html, but if user is admin of a content then use this syntax to load html--}}
{{--        </div>--}}


{{--        --}}{{--        {{  $post }}--}}
{{--        --}}{{--<!--        --><?php //echo($post) ?>--}}
{{--        --}}{{--        <?= $post?> --}}{{----}}{{--        short code for echo--}}
{{--    </article>--}}
{{--    <a href="/">Go back</a>--}}
{{--@endsection--}}
