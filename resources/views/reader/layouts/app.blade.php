<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ 'Dashboard | Schemacode' }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/css/clock.css', 'resources/js/app.js', 'resources/js/clock.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-primary">
        @include('reader.layouts.navigation')
        <main class="pt-16 px-2 sm:px-0">
            {{ $slot }}
        </main>
        <div class="border border-t-black mt-40">
            @include('layouts.footer')
        </div>
    </div>
    <script>
        let copyText = document.querySelector(".copy__text");
        copyText.querySelector("button").addEventListener("click", () => {
            copyText.querySelector("input").select();
            document.execCommand("copy");
            copyText.classList.add("active");
            setTimeout(() => {
                copyText.classList.remove("active");
            }, 1000);
        });
    </script>
</body>

</html>