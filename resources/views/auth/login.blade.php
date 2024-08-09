<x-layout>
    <div class="font-bold fs-1 title">Welcome back</div>

    {{-- Session Messages --}}
    @if (session('status'))
        <x-flashMsg msg="{{ session('status') }}" />
    @endif

    <div class="mx-auto card w-50">
        <form action="{{ route('login') }}" method="post">
            @csrf 
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

            {{-- Remember checkbox --}}
            <div class="mb-4 px-4 flex justify-between align-items-center">
                <div>
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember">Remember me</label> 
                </div>
                
                <a class="text-blue-500" href="{{ route('password.request') }}">Forgot your password?</a>
            </div>

            {{-- Submit Button --}}
            <div class="mb-4 px-4">
                @error('failed')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <button class="btn btn-primary form-control">Login</button>
            </div>
        </form>
    </div>
</x-layout>