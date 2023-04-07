<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Intervention Management</title>
    
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


</body>

</html>