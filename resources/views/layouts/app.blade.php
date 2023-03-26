<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Intervention Management</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
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




    @livewireStyles
</head>

<body class="h-full" data-no-turbolink="true">
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

    @vite('resources/js/app.js')


</body>

</html>