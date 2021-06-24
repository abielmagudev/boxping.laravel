<p>Proceso</p>
@include('@.bootstrap.nav', [
    'style' => 'tabs',
    'is_card' => true,
    'is_toggle' => true,
    'active' => 'Guía',
    'items' =>  [
        'Guía' => '#guia',
        'Reempaque' => '#reempaque',
        'Importación' => '#importacion',
    ],
])
