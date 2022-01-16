<?php

$options_salida = (object) [
    'cualquier' => '- Cualquier salida -',
    'con' => 'Con salida',
    'sin' => 'Sin salida',
];

?>

<div class="mb-3">
    <label for="selectFiltroSalida" class="form-label d-block small">Salida</label>
    <select name="salida" id="selectFiltroSalida" class="form-select">
        @foreach ($options_salida as $value => $label)
        <option value="{{ $value }}" {{ toggleSelected($value, request('salida')) }}>{{ $label }}</option>
        @endforeach
    </select>
</div>
