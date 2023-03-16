<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Upwork</title>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    @vite('resources/css/app.css')
    <style>
        [x-cloak] {
            display: none;
        }

        .turbolinks-progress-bar {
            height: 2.5px;
            background-color: #6600ff;
        }
    </style>

</head>

<body class="h-full">

    @yield('content')

    @vite('resources/js/app.js')

</body>

</html>