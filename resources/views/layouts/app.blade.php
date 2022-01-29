<!DOCTYPE html>
<html>
    <head>
        <title>{{ env('APP_NAME') }}</title>
        <meta name="csrf-token" content="{{ csrf_token() }}"/>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    </head>
    <body class="min-vh-100 d-flex justify-content-center align-items-center">

        @yield('body')

    </body>
</html>
