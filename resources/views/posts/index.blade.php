<x-layout>
        <div class="font-bold fs-1 mb-4 title">Latest Posts</div>

        {{-- <img src="{{ asset('storage/posts_images/s3g84bPnYYYjEy1Xdob1UK8XnTtkMRUjFoAgzESM.png') }}" alt=""> --}}

        <div class="grid grid-cols-2 gap-6">
                @foreach ($posts as $post)
                        <x-postCard :post="$post" />
                @endforeach
        </div>

        <div>
                {{ $posts->links() }}
        </div>
</x-layout>
