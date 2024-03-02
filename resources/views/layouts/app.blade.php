<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        {{-- <link href="{{ asset('css/tabler.min.css') }}" rel="stylesheet"> --}}
        <title>{{ config('app.name', 'Hudi Library') }}</title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        {{-- <script src="{{ asset('js/tabler.min.js') }}"></script> --}}
    </head>
    <body class="font-sans antialiased">
        <main>
            <div class="p-4 sm:ml-64">
            @include('layouts.sidebar')
                <div class="p-4">
                    @yield('content')
                </div>
            </div>
        </main>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    </body>
</html>
