<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>{{ config('app.name') }}</title>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Navbar</a>
    </nav>
    <br>
    <div class="container">
        @include('components.notification')
        @yield('content')
    </div>
    <br>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>