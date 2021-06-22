@component('@.bootstrap.card')
    @slot('header')
        <p>Procesamiento</p>
        @include('@.bootstrap.nav', [
            'style' => 'tabs',
            'is_card' => true,
            'is_toggle' => true,
            'active' => 'Guía',
            'items' =>  [
                'Guía' => '#resumen',
                'Reempaque' => '#reempaque',
                'Importación' => '#importacion',
            ],
        ])
    @endslot

    @slot('body')
    <div class="tab-content mt-3" id="informacionContentTabs">
        @include('entradas.show.informacion.guia')
        @include('entradas.show.informacion.reempaque')
        @include('entradas.show.informacion.importacion')
    </div>

    @endslot
@endcomponent
