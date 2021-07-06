<div class="text-center">
    @component('@.bootstrap.group-links', [
        'links' => [
            'Transportadoras' => route('transportadoras.index'),
            'Incidentes' => route('incidentes.index'),
        ],
        'active' => $active ?? null,
        'outline' => true,
        'size' => 'sm',
    ])
    @endcomponent
</div>
<br>
