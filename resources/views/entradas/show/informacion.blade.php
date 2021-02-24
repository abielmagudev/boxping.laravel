@component('components.card', [
    'classes' => 'h-100',
    'header_styles' => 'background-color:#F5F5F5',
    'header_nav_type' => 'tabs',
])
    @slot('header_nav', [
        '<a href="#resumen" id="resumen-tab" data-bs-toggle="tab" role="tab" class="nav-link border-0 active">Resumen</a>',
        '<a href="#reempaque" id="reempaque-tab" data-bs-toggle="tab" role="tab" class="nav-link border-0">Reempaque</a>',
        '<a href="#importacion" id="importacion-tab" data-bs-toggle="tab" role="tab" class="nav-link border-0">Importación</a>',
    ])

    @slot('body_classes', 'px-4')
    @slot('body')
    <div class="tab-content mt-3" id="informacion-tabs-contents">
        @include('entradas.show.informacion.resumen')
        @include('entradas.show.informacion.reempaque')
        @include('entradas.show.informacion.importacion')
    </div>
    @endslot
@endcomponent
