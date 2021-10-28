<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css-bs/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css-bs/bootstrap-icons.css') }}">
    <title>{{ config('app.name') }}</title>
    @yield('style')
</head>
<body onload="print()">
    <div>
        @yield('header')
    </div>
    
    @yield('content')
</body>
</html>
