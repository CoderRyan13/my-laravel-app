@props(['post', 'full' => false])

<div class="card p-4 mb-4 flex flex-row">
    <div class="w-25">
        {{-- Cover photo --}}
        <div class="me-4 h-25 w-50">
            @if ($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" alt="">    
            @else
                <img src="{{ asset('storage/posts_images/default.jpg') }}" alt="">   
            @endif
        </div>
    </div>
    <div class="flex-1">
        {{-- Title --}}
        <h2 class="font-bold text-xl">{{ $post->title }}</h2>

        {{-- Author and Date --}}
        <div class="text-xs font-light mb-4">
                <span>Posted {{ $post->created_at->diffForHumans() }} by </span>
                <a href="{{ route('posts.user', $post->user) }}" class="text-blue-500 font-medium">{{ $post->user->username }}</a>
        </div>

        {{-- Body --}}
        @if ($full)
            <div class="text-sm">
                    <span>{{ $post->body }}</span>
            </div>
        @else      
            <div class="text-sm">
                    <span>{{ Str::words($post->body, 15) }}</span>
                    <a href="{{ route('posts.show', $post) }}" class="text-blue-500">Read more &rarr;</a>
            </div>
        @endif

        <div class="flex items-center justify-end gap-4 mt-6">
            {{ $slot }}
        </div>
    </div>
    
    
</div>