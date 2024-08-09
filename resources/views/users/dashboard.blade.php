<x-layout>
    <div class="font-bold fs-1 title">Welcome {{ auth()->user()->username }}, you have {{ $posts->total() }} posts</div>

    <div class="mx-auto card w-75 mb-4 p-4 mt-3">
        <h2 class="font-bold mb-4 title">Create a new post</h2>

        {{-- Session Messages --}}
        @if (session('success'))
            <x-flashMsg msg="{{ session('success') }}" />
        @elseif (session('delete'))
            <x-flashMsg msg="{{ session('delete') }}" bg="bg-red-500" />
        @endif
        
        {{-- Create Post Form --}}
        <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            {{-- Post Title --}}
            <div class="mb-4">
                <label for="title">Post Title</label>
                <input type="text" name="title" value="{{ old('title') }}" class="form-control @error('username') border border-danger @enderror">

                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- Post Body --}}
            <div class="mb-4">
                <label for="body">Post Content</label>
                <textarea name="body" rows="5" class="form-control @error('username') border border-danger @enderror">{{ old('body') }}</textarea>

                @error('body')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- Post Image --}}
            <div class="mb-4">
                <label for="image">Cover photo</label>
                <input type="file" name="image" id="image">

                @error('image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- Submit Button --}}
            <div class="mb-4 px-4">
                <button class="btn btn-primary form-control">Create</button>
            </div>
        </form>
    </div>

    {{-- User Posts --}}
    <h2 class="font-bold mb-4">Your Latest Posts</h2>

    <div class="grid grid-cols-2 gap-6">
        @foreach ($posts as $post)
                <x-postCard :post="$post">
                    {{-- Update post --}}
                    <a href="{{ route('posts.edit', $post) }}" class="text-white rounded bg-green-500 px-2 py-1 text-xs">Update</a>
                    {{-- Delete post --}}
                    <form action="{{ route('posts.destroy', $post) }}"  method="post">
                        @csrf
                        @method('DELETE')
                        <button class="text-white rounded bg-danger px-2 py-1 text-xs">Delete</button>
                    </form>
                </x-postCard>
        @endforeach
    </div>

    <div>
            {{ $posts->links() }}
    </div>
</x-layout>