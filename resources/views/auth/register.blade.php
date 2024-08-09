<x-layout>
    <div class="font-bold fs-1 title">Register a new account</div>

    <div class="mx-auto card w-50">
        <form action="{{ route('register') }}" method="post">
            @csrf 
            {{-- Username --}}
            <div class="mb-4 px-4 pt-4">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control @error('username') border border-danger @enderror" value="{{ old('username') }}">
                @error('username')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- Email --}}
            <div class="mb-4 px-4">
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control @error('email') border border-danger @enderror" value="{{ old('email') }}">
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- Password --}}
            <div class="mb-4 px-4">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control @error('password') border border-danger @enderror">
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- Confirm Password --}}
            <div class="mb-4 px-4">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control @error('password') border border-danger @enderror">
            </div>

            <div class="mb-4 px-4">
                <input type="checkbox" name="subscribe" id="subscribe">
                <label for="subscribe">Subscribe to our newsletter</label>
            </div>

            {{-- Submit Button --}}
            <div class="mb-4 px-4">
                <button class="btn btn-primary form-control">Register</button>
            </div>
        </form>
    </div>
</x-layout>