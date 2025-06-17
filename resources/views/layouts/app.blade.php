<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'FastNews') }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        h1,
        h2,
        h3,
        h4,
        h5 {
            font-family: Georgia, serif;
        }

        data-bs-ride="carousel" data-bs-interval="5000"
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    @auth
        @if (Auth::user()->role === 'admin')
            @include('layouts.admin')
        @else
            @include('layouts.navigation') {{-- User login --}}
        @endif
    @else
        @include('layouts.navigation') {{-- Guest view --}}
    @endauth

    @if (isset($header))
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endif

    <main class="py-6 px-4 sm:px-6 lg:px-8">
        @yield('content')
    </main>
</body>

</html>