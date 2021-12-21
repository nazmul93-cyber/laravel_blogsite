@props(['posts'])
<x-post-featured-card :post="$posts[0]"/>

@if($posts->count() > 1)
    <div class="lg:grid lg:grid-cols-3">
        @foreach($posts->skip(1) as $post)
            {{--                            @dd($loop->iteration);--}}
            <x-post-card :post="$post"/>
            {{--                        <x-post-card :post="$post" class="{{$loop->iteration < 3 ? 'col-span-3' : 'col-span-2'}}"/>--}}
        @endforeach
    </div>
@endif
