<x-layout>
    <h1 class="font-bold fs-1 title">Reset your password</h1>

    <div class="mx-auto card w-50">
        <form action="{{ route('password.update') }}" method="post">
            @csrf 

            <input type="hidden" name="token" value="{{ $token }}">

            {{-- Email --}}
            <div class="mb-4 px-4 pt-4">
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

            {{-- Submit Button --}}
            <div class="mb-4 px-4">
                <button class="btn btn-primary form-control">Reset Password</button>
            </div>
        </form>
    </div>
</x-layout>