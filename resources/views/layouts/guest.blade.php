 <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Schemacode') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        @include('layouts.header')
        <div class="min-h-screen flex flex-col sm:justify-center items-center  sm:pt-0 bg-primary">
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-primary overflow-hidden sm:rounded-lg">
                <div class="text-left pb-6 text-3xl font-semibold">
                    <h1>
                        @if(Route::currentRouteName() == 'login')
                            Login to Schemacode
                        @elseif(Route::currentRouteName() == 'register')
                            Get started for free
                        @endif
                    </h1>
                </div>
                {{ $slot }}
            </div>
        </div>
        @include('layouts.footer')
    </body>
</html>
