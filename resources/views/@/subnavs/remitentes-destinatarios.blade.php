<div class="text-center">
    @component('@.bootstrap.group-links', [
        'links' => [
            'Remitentes' => route('remitentes.index'),
            'Destinatarios' => route('destinatarios.index'),
        ],
        'active' => $active ?? null,
        'outline' => true,
        'size' => 'sm',
    ])
    @endcomponent
</div>
<br>
