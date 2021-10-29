<section class="col-sm col-lg-10" id="app-content">
    @include('layouts.navbar')
    @include('layouts.alerts')
    @include('layouts.errors')
    <div class="px-4">
        @yield('content')
        @include('layouts.footer')
    </div>
</section>
