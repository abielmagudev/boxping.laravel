<div class="text-center">
    @component('components.links-group', [
        'links' => [
            'salidas' => route('salidas.index'),
            'incidentes' => route('incidentes.index'),
        ],
        'rounded_pill' => true,
        'active' => isset($active) && is_string($active) ? $active : false,
    ])
    @endcomponent
</div>
<br>
