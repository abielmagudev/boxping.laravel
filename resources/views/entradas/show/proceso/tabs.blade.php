<p>Proceso</p>
@include('@.bootstrap.nav', [
    'style' => 'tabs',
    'is_card' => true,
    'is_toggle' => true,
    'active' => 'Información',
    'items' =>  [
        'Información' => '#informacion',
        'Reempaque' => '#reempaque',
        'Importación' => '#importacion',
        'Actualizaciones' => '#actualizaciones',
    ],
])
