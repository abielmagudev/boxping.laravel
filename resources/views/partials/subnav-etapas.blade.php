<div class="text-center">
    @component('components.links-group', [
        'links' => [
            'etapas' => route('etapas.index'),
            'alertas' => route('alertas.index'),
        ],
        'rounded_pill' => true,
        'active' => isset($active) && is_string($active) ? $active : false,
    ])
    @endcomponent
</div>
<br>
