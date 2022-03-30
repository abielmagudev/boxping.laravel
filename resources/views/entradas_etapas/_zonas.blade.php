@if( $etapa->zonas->count() )
<?php

$pivot = (object) [
    'zona_id' => $etapa->entrada_etapa->zona_id ?? null,
];

?>
<div class="mb-3">
    <label for="select-zona" class="form-label small">Zonas</label>
    <select name="zona" id="select-zona" class="form-select {{ bootstrap_isInputInvalid('zona', $errors) }}">
        <option label="- Sin zona -" selected></option>
        @foreach($etapa->zonas as $zona)
        <option value="{{ $zona->id }}" {{ toggleSelected($zona->id, old('zona', $pivot->zona_id)) }}>{{ $zona->nombre }}</option>
        @endforeach
    </select>
    @include('@.bootstrap.invalid-input-message', ['name' => 'zona'])
</div>
@endif
