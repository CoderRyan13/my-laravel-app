<x-layout>

    <a href="{{ route('dashboard') }}" class="block mb-2 text-xs text-blue-500">&larr; Go back to your dashboard</a>

    <div class="card p-4 mb-4 mx-auto w-75">
        <h2 class="font-bold mb-4 title">Update your post</h2>
        <form action="{{ route('posts.update', $post) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Post Title --}}
            <div class="mb-4">
                <label for="title">Post Title</label>
                <input type="text" name="title" value="{{ $post->title }}" class="form-control @error('username') border border-danger @enderror">

                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- Post Body --}}
            <div class="mb-4">
                <label for="body">Post Content</label>
                <textarea name="body" rows="5" class="form-control @error('username') border border-danger @enderror">{{ $post->body }}</textarea>

                @error('body')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- Current cover photo if exists --}}
            @if ($post->image)
                <div>               
                    <label>Current cover photo</label>
                    <img src="{{ asset('storage/' . $post->image) }}" alt="">                   
                </div>
            @endif

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
                <button class="btn btn-primary form-control">Update</button>
            </div>
        </form>
    </div>
    
</x-layout>