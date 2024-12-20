<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="bg-background-normal">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title ?? config('app.name', 'LayzFlix') }}</title>
        <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/x-icon">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased" x-data="{ headerMobileMenu: false }">
        <div id="tsparticles" class="-z-50"></div>

        <x-banner />

        <div class="min-h-screen overflow-hidden flex flex-col">
            <x-header />

            <main>
                {{ $slot }}
            </main>

            <x-footer />
        </div>

        @stack('modals')
    </body>
</html>
