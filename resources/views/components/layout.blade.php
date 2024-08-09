<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-100 text-slate-900">
    {{-- <header class="bg-slate-800 shadow-lg">
        <a href="{{ route('home') }}" class="nav-link">Home</a>
        <div class="flex items-center gap-4">
            <a href="#" class="nav-link">Login</a>
            <a href="{{ route('register') }}" class="nav-link">Register</a>
        </div>
    </header> --}}

    <header class="header">
        <a href="{{ route('posts.index') }}" class="home-link">Home</a>
        @auth
            <div class="position-absolute d-flex flex-column justify-content-center align-items-center top-0 right-0" x-data="{ open: false }">
                {{-- Dropdown menu button --}}
                <button @click="open = !open" type="button" class="btn"><img src="https://picsum.photos/200" alt="" class="rounded-circle h-10"></button>
            
                {{-- Dropdown menu --}}
                <div x-show="open" @click.outside="open = false" class="z-1 bg-white position-absolute top-12 right-6 rounded py-2 pe-4 ps-2">
                    <div class="username fs-6 fw-normal pb-2">{{ auth()->user()->username }}</div>
                    <a href="{{ route('dashboard') }}" class="fs-5 fw-normal btn btn-outline-secondary mb-2">Dashboard</a>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button class="fs-5 fw-normal btn btn-outline-danger">Logout</button>
                    </form>
                    
                </div>
            </div>
        @endauth
        @guest
            <div class="right-header">
                <a href="{{ route('login') }}" class="login-link">Login</a>
                <a href="{{ route('register') }}" class="register-link">Register</a>
            </div>
        @endguest     
    </header>
    <main class="main">
        {{ $slot }}
    </main>
</body>
</html>