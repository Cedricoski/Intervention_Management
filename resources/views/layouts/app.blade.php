<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>Intervention Management</title>
    
    @vite('resources/css/app.css')
    <style>
        [x-cloak] {
            display: none;
        }
    </style>
    @livewireStyles
</head>

<body class="h-full">
    @include('partials.sidebar')
    @include('partials.navbar')
    <main class="flex-1">
        <div class="py-6">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 md:px-8">
                <h1 class="text-2xl font-semibold text-gray-900">{{$title}}</h1>
            </div>
            <div class="mx-auto max-w-7xl px-4 sm:px-6 md:px-8">
                <!-- Replace with your content -->
                <div class="py-4">
                    @yield('content')
                </div>
                <!-- /End replace -->
            </div>
        </div>
    </main>


    </div>
    </div>
    
    @livewireScripts
    
</body>

</html>