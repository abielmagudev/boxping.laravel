<div class="text-center">
    @component('components.links-group', [
        'links' => [
            'destinatarios' => route('destinatarios.index'),
            'remitentes' => route('remitentes.index'),
        ],
        'rounded_pill' => true,
        'active' => isset($active) && is_string($active) ? $active : false,
    ])
    @endcomponent
</div>
<br>
