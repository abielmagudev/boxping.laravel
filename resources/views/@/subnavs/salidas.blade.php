<div class="text-center">
    @component('@.bootstrap.group-links', [
        'links' => [
            'Salidas' => route('salidas.index'),
            'Incidentes' => route('incidentes.index'),
        ],
        'active' => $active ?? null,
        'outline' => true,
        'size' => 'sm',
    ])
    @endcomponent
</div>
<br>
