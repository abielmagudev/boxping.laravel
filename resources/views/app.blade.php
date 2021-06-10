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
    @include('@.layouts.navbar')
    <br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm d-none d-lg-block">
                @include('@.layouts.sidebar')
            </div>
            <div class="col-sm col-sm-12 col-lg-10">
                @include('@.partials.errors')
                @include('@.partials.alerts')
                @yield('content')
                <br>
            </div>
        </div>
    </div>
    @include('@.layouts.scripts')
</body>
</html>