@component('@.bootstrap.card')
    @slot('header')
        <p>Trayectoria</p>
        @include('@.bootstrap.nav', [
            'is_card' => true,
            'is_toggle' => true,
            'style' => 'tabs',
            'active' => 'Salida',
            'items' =>  [
                'Salida' => '#salida',
                'Destinatario' => '#destinatario',
                'Remitente' => '#remitente',
            ],
        ])
    @endslot

    @slot('body')
    <div class="tab-content mt-3" id="trayectoriaContentTabs">
        @include('entradas.show.trayectoria.salida')
        @include('entradas.show.trayectoria.destinatario')
        @include('entradas.show.trayectoria.remitente')
    </div>
    @endslot

@endcomponent