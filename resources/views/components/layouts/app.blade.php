<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>{{ $title ?? 'Page Title' }}</title>
</head>

<body class="dark:bg-slate-950">
    <x-nav.main />

    <div class="min-h-screen flex flex-col">
        <main class="flex-grow">
            {{ $slot }}
        </main>


        <x-layouts.footer />
    </div>
</body>

</html>
