<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pixel Positions</title>

    <!-- Fonts -->
    {{-- <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" /> --}}

    <!-- Styles / Scripts -->
    @vite('resources/js/app.js')
</head>

<body class="bg-black text-white font-hanken-grotesk pb-20">
    <div class="px-10">
        <nav class="flex justify-between items-center py-4 border-b border-white/10">
            <div>
                <a href="{{ route('jobs.index') }}">
                    <img src="{{ Vite::asset('resources/images/logo.svg') }}" alt="Pixel Positions Logo" />
                </a>
        </div>

            <div class="space-x-4 font-bold">
                <a href="{{ route('jobs.index') }}">Jobs</a>
                <a href="javascript:void(0)">Careers</a>
                <a href="javascript:void(0)">Salaries</a>
                <a href="javascript:void(0)">Companies</a>
            </div>

            @auth
                <div>
                    <a href="javascript:void(0)">
                        Post a Job
                    </a>
                </div>
            @endauth

            @guest
                <div class="space-x-4">
                    <a href="{{ route('register.create') }}">Sign Up</a>
                    <a href="{{ route('login') }}">Log In</a>
                </div>
            @endguest
        </nav>

        <main class="mt-10 max-w-[986px] mx-auto">
            {{ $slot }}
        </main>
    </div>
</body>

</html>