<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css-bs/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css-bs/bootstrap-icons.css') }}">
    <title>{{ config('app.name') }}</title>
</head>
<body class="@yield('classes')">

    @auth
        @include('@.layouts.navbar')
        <br>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm d-none d-lg-block">
                    @include('@.layouts.sidebar')
                </div>
                <div class="col-sm col-sm-12 col-lg-10">
                    @include('@.layouts.alerts')
                    @include('@.layouts.errors')
                    @yield('content')
                    <br>
                </div>
            </div>
        </div>
    
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script> -->
    <script src="{{ asset('js-bs/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>

    @else
        @yield('content')

    @endauth

    @stack('scripts')

</body>
</html>