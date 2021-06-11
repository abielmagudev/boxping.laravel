<div class="text-center">
    @component('@.bootstrap.group-links', [
        'links' => [
            'Reempacadores' => route('reempacadores.index'),
            'Códigos de reempacado' => route('codigosr.index'),
        ],
        'active' => $active ?? null,
        'outline' => true,
        'size' => 'sm',
    ])
    @endcomponent
</div>
<br>
