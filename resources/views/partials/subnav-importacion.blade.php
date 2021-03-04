<div class="text-center">
    @component('components.links-group', [
        'links' => [
            'conductores' => route('conductores.index'),
            'vehículos' => route('vehiculos.index'),
        ],
        'rounded_pill' => true,
        'active' => isset($active) && is_string($active) ? $active : false,
    ])
    @endcomponent
</div>
<br>
