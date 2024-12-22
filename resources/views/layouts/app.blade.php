<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} - @yield('title', 'Welcome')</title>
    @vite('resources/css/app.css')
    @livewireStyles
    @stack('styles')
</head>
<body class="flex flex-col min-h-screen">
    <!-- Header -->
    @include('layouts.partials.header')

    <!-- Main Content -->
    <div class="flex-grow">
        @yield('content')
    </div>

    <!-- Footer -->
    @include('layouts.partials.footer')

    <!-- Scripts -->
    @livewireScripts
    @stack('scripts')
</body>
</html>
