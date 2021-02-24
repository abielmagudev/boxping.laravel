@component('components.card', [
    'classes' => 'h-100',
    'header_styles' => 'background-color:#F5F5F5',
    'header_nav_type' => 'tabs',
])
    @slot('classes', 'h-100')
    @slot('header_nav', [
        '<a href="#salida" id="salida-tab" data-bs-toggle="tab" role="tab" class="nav-link active border-0">Salida</a>',
        '<a href="#destinatario" id="destinatario-tab" data-bs-toggle="tab" role="tab" class="nav-link border-0">Destinatario</a>',
        '<a href="#remitente" id="remitente-tab" data-bs-toggle="tab" role="tab" class="nav-link border-0">Remitente</a>',
    ])

    @slot('body_classes', 'px-4')
    @slot('body')
    <div class="tab-content mt-3" id="trayectoria-tabs-contents">
        @include('entradas.show.trayectoria.salida')
        @include('entradas.show.trayectoria.destinatario')
        @include('entradas.show.trayectoria.remitente')
    </div>
    @endslot
@endcomponent
