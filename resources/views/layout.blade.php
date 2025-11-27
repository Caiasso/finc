<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'FINC') }} - @yield('title', 'Financial App')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=fredoka-one:400|comfortaa:400,700|righteous:400|inter:400,500,600|roboto:400,500,700" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Fredoka+One&family=Comfortaa:wght@400;700&family=Righteous&family=Inter:wght@400;500;600&family=Roboto:wght@400;500;700&display=swap');
        </style>
    @endif

    @stack('styles')
</head>
<body class="bg-gradient-to-br from-[#75C47F] via-[#5A8CCF] to-[#B8A4D4] min-h-screen font-inter text-gray-900">
    <!-- Background Image Overlay -->
    <div class="fixed inset-0 bg-cover bg-center opacity-20" style="background-image: url('/features-bg.png');"></div>

    <!-- Header -->
    <header class="relative z-10 p-4">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <h1 class="text-3xl font-fredoka text-white">FINC</h1>
            @yield('header')
        </div>
    </header>

    <!-- Main Content -->
    <main class="relative z-10">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="relative z-10 p-4 mt-8">
        <div class="max-w-7xl mx-auto text-center text-white">
            @yield('footer', 'FINC — versão 1.0 | Feito com amor | Free & Open Source')
        </div>
    </footer>

    @stack('scripts')
</body>
</html>
