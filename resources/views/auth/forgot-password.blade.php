<x-layout>
    <div class="font-bold fs-1 title">Request a password reset email</div>

    {{-- Session Messages --}}
    @if (session('status'))
        <x-flashMsg msg="{{ session('status') }}" />
    @endif

    <div class="mx-auto card w-50">
        <form action="{{ route('password.request') }}" method="post">
            @csrf 
            {{-- Email --}}
            <div class="mb-4 px-4 pt-4">
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control @error('email') border border-danger @enderror" value="{{ old('email') }}">
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- Submit Button --}}
            <div class="mb-4 px-4">
                <button class="btn btn-primary form-control">Submit</button>
            </div>
        </form>
    </div>
</x-layout>