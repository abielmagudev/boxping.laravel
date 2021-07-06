<div class="text-center">
    @component('@.bootstrap.group-links', [
        'links' => [
            'Conductores' => route('conductores.index'),
            'Vehículos' => route('vehiculos.index'),
        ],
        'active' => $active ?? null,
        'outline' => true,
        'size' => 'sm',
    ])
    @endcomponent
</div>
<br>
