<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="{{ asset('jquery-3.7.1.min.js')}}"></script>
        @livewireStyles()
    </head>
    <body class="font-sans text-gray-900 antialiased dark:bg-gray-900">
        @include('layouts.partials.header')

        <div class="min-h-screen flex flex-col sm:justify-center pt-2 sm:pt-0 bg-gray-100 dark:bg-gray-900">

                {{ $slot }}
        </div>
        @include('layouts.partials.footer')
        @livewireScripts()
    </body>
    </html>
