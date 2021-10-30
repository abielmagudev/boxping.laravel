<section class="col-sm col-lg-10" id="app-content">
    @include('layouts.navbar')
    <div class="px-3 px-md-4">
        @include('layouts.notifications')
        @yield('content')
        @include('layouts.footer')
    </div>
</section>
