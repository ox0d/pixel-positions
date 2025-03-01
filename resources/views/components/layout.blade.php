<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pixel Positions</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @vite('resources/js/app.js')
</head>

<body>
    <div>
        <nav>
            <div>
                <a href="{{ route('home') }}">
                    <img src="{{ Vite::asset('resources/images/logo.svg') }}" alt="Pixel Positions Logo" />
                </a>
            </div>

            <div>
                <a href="javascript:void(0)">Jobs</a>
                <a href="javascript:void(0)">Careers</a>
                <a href="javascript:void(0)">Salaries</a>
                <a href="javascript:void(0)">Companies</a>
            </div>

            <div>
                <a href="javascript:void(0)">
                    Post a Job
                </a>
            </div>
        </nav>

        <main>
            {{ $slot }}
        </main>
    </div>
</body>

</html>