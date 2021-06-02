<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('bs-css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bs-css/bootstrap-icons.css') }}">
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <title>{{ config('app.name') }}</title>
</head>
<body>
    @include('layout.navbar')
    <br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm d-none d-lg-block">
                @include('layout.menubar')
            </div>
            <div class="col-sm col-sm-12 col-lg-10">
                @include('components.errors')
                @include('components.notification')
                @yield('content')
            </div>
        </div>
    </div>
    @include('layout.scripts')
</body>
</html>