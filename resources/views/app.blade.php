<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'C\'Kooly') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">

        <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/jquery-confirm.min.css') }}" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <script src="{{ mix('js/app.js') }}" defer></script>
        <!-- Scripts -->
        @routes
    </head>
    <body class="font-sans antialiased" id="page-top">

        @inertia

        <!-- Scripts -->

        <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>

        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('js/ruang-admin.js') }}" defer></script>
        <script src="{{ asset('js/jquery-confirm.min.js') }}"></script>
    </body>
</html>
