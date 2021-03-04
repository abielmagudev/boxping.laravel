<div class="text-center">
    @component('components.links-group', [
        'links' => [
            'reempacadores' => route('reempacadores.index'),
            'códigos' => route('codigosr.index'),
        ],
        'rounded_pill' => true,
        'active' => isset($active) && is_string($active) ? $active : false,
    ])
    @endcomponent
</div>
<br>
