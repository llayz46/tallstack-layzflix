<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="bg-background-normal">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Erreur 500 : Problème serveur - LayzFlix</title>
    <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<div class="pt-44 px-4 mx-auto max-w-screen-xl lg:pt-52 lg:px-6">
    <div class="mx-auto max-w-screen-sm text-center">
        <h1 class="mb-4 text-7xl tracking-tight font-bold lg:text-9xl text-primary-600">500</h1>
        <p class="mb-4 text-3xl tracking-tight font-bold md:text-4xl text-gray-300">Il y a eu un problème. Veuillez réessayer un peu plus tard.</p>
        <p class="mb-4 text-lg font-light text-neutral-400">Une erreur est survenue. Nous travaillons à la résoudre rapidement.</p>
        <x-button type="link" href="{{ route('home') }}">Retourner à l'accueil</x-button>
    </div>
</div>
</body>
</html>
