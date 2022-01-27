@props(['comment'])
<x-panel class="bg-gray-50">
    <article class="flex space-x-4">
        <div class="flex-shrink-0">
            <img src="https://i.pravatar.cc/60?u={{$comment->user_id}}" alt="image" width="60" height="60" class="rounded-xl">
        </div>
        <div>
            <header class="mb-4">
                <h3 class="font-blod">{{ $comment->author->username }}</h3>
                <p class="text-xs">posted <time>{{ $comment->created_at->format('Y-m-d h:i a') }}</time></p>
            </header>
            <p>
                {{ $comment->body }}
            </p>
        </div>
    </article>
</x-panel>
