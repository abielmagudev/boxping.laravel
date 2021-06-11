<div class="text-center">
    @component('@.bootstrap.group-links', [
        'links' => [
            'Etapas' => route('etapas.index'),
            'Alertas' => route('alertas.index'),
        ],
        'active' => $active ?? null,
        'outline' => true,
        'size' => 'sm',
    ])
    @endcomponent
</div>
<br>
