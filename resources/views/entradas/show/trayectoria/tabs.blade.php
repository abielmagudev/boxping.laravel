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
