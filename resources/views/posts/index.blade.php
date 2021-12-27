<x-layout>

    @include('posts._header')
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if($posts->count())
            <x-posts-grid :posts="$posts" />
        @else
            <p class="text-center">No posts yet. Please check back later</p>
        @endif


{{--        <div class="lg:grid lg:grid-cols-3">--}}
{{--            <x-post-card/>--}}
{{--            <x-post-card/>--}}
{{--            <x-post-card/>--}}
{{--        </div>--}}
    </main>


{{--    working fine--}}
{{--   default  $slot is set so x-slot not required anymore --}}
{{--    @foreach($posts as $post)--}}
{{--                    @dd($loop)--}}
{{--            <article class="{{ $loop->even ? "foobar" : "" }}">--}}
{{--                <h1>--}}
{{--                    <a href="/posts/{{ $post->slug }}">--}}
{{--                    <a href="posts/{{ $post->id }}">--}}

{{--                        {{   $post->title   }}--}}

{{--                    </a>--}}
{{--                </h1>--}}
{{--                <p>--}}
{{--                    By <a href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a> in <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>--}}
{{--                    with this created a new n+1 issue--}}
{{--                </p>--}}

{{--                <div>--}}
{{--                    {{  $post->excerpt }}--}}
{{--                </div>--}}
{{--            </article>--}}
{{--    @endforeach--}}
</x-layout>






{{--<x-layout>--}}
{{--    <x-slot name="content"> --}}{{--        when slot name is custom - a variable--}}
{{--        Hello again--}}
{{--    </x-slot>--}}
{{--</x-layout>--}}




{{--<x-layout content="hello there">--}}        {{--basic aproach--}}

{{--</x-layout>--}}













{{--@extends('components.layout')--}}
{{--@section('content')--}}
{{--    @foreach($posts as $post)--}}
{{--        --}}{{--        @dd($loop)--}}
{{--        <article class="{{ $loop->even ? "foobar" : "" }}">--}}
{{--            <h1>--}}
{{--                <a href="/posts/{{ $post->slug }}">--}}
{{--                <a href="posts/{{ $post->id }}">--}}

{{--                    {{   $post->title   }}--}}

{{--                    --}}{{--<!--                    --><?//= $post->title;?>--}}
{{--                </a>--}}
{{--            </h1>--}}
{{--            <p>--}}
{{--                By <a href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a> in <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>         --}}{{--                with this created a new n+1 issue--}}
{{--            </p>--}}

{{--            <div>--}}
{{--                {{  $post->excerpt }}--}}
{{--            </div>--}}
{{--        </article>--}}
{{--    @endforeach--}}
{{--@endsection--}}
