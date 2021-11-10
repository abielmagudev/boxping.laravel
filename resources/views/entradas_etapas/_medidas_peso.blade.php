<?php 

$peso_pivot = $etapa->entrada_etapa->peso ?? null;
$medicion_peso_pivot = $etapa->entrada_etapa->medicion_peso ?? null;

?>
<!-- Peso -->
<div class="row mb-3">
    <div class="col-sm">
        <label for="input-peso" class="form-label small">Peso</label>
        <input name="peso" value="{{ old('peso', $peso_pivot) }}" id="input-peso" type="number" step="0.01" min="0.01" class="form-control {{ bootstrap_isInputInvalid('peso', $errors) }}">
        @include('@.bootstrap.invalid-input-message', ['name' => 'peso'])
    </div>
    <div class="col-sm col-sm-3">
        <label for="select-medicion_peso" class="form-label small">Medición de peso</label>
        <select name="medicion_peso" id="select-medicion_peso" class="form-select {{ bootstrap_isInputInvalid('medicion_peso', $errors) }}">
            @if( ! $etapa->hasMedicionUnicaPeso() )
            <option label="" disabled selected></option>
            @endif

            @foreach($etapa->mediciones_peso as $abbr => $medicion)
            <option value="{{ $abbr }}" {{ toggleSelected($abbr, old('medicion_peso', $medicion_peso_pivot)) }}>{{ ucfirst($medicion) }}</option>
            @endforeach
        </select>
        @include('@.bootstrap.invalid-input-message', ['name' => 'medicion_peso'])
    </div>
</div>
