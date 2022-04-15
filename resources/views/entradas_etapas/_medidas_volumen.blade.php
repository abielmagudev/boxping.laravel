<?php

$pivot = (object) [
    'largo' => $etapa->entrada_etapa->largo ?? null,
    'ancho' => $etapa->entrada_etapa->ancho ?? null,
    'alto' => $etapa->entrada_etapa->alto ?? null,
    'medicion' => $etapa->entrada_etapa->medicion_volumen ?? null,
];

?>
<!-- Volúmen -->
<div class="row mb-3">
    <div class="col-sm">
        <label for="input-largo" class="form-label small">Largo</label>
        <input name="largo" value="{{ old('largo', $pivot->largo) }}" id="input-largo" type="number" step="0.01" min="0.01" class="form-control {{ bootstrap_isInputInvalid('largo', $errors) }}">
        @include('@.bootstrap.invalid-input-message', ['name' => 'largo'])
    </div>
    <div class="col-sm">
        <label for="input-ancho" class="form-label small">Ancho</label>
        <input name="ancho" value="{{ old('ancho', $pivot->ancho) }}" id="input-ancho" type="number" step="0.01" min="0.01" class="form-control {{ bootstrap_isInputInvalid('ancho', $errors) }}">
        @include('@.bootstrap.invalid-input-message', ['name' => 'ancho'])
    </div>
    <div class="col-sm">
        <label for="input-altura" class="form-label small">Alto</label>
        <input name="alto" value="{{ old('alto', $pivot->alto) }}" id="input-alto" type="number" step="0.01" min="0.01" class="form-control {{ bootstrap_isInputInvalid('alto', $errors) }}">
        @include('@.bootstrap.invalid-input-message', ['name' => 'alto'])
    </div>
    <div class="col-sm">
        <label for="select-medicion_volumen" class="form-label small">Medición de volúmen</label>
        <select name="medicion_volumen" id="select-medicion_volumen" class="form-select {{ bootstrap_isInputInvalid('medicion_volumen', $errors) }}">
            @if( ! $etapa->hasMedicionUnicaVolumen() )
            <option label="" disabled selected></option>
            @endif    
        
            @foreach($etapa->mediciones_volumen as $abbr => $medicion )
            <option value="{{ $abbr }}" {{ toggleSelected($abbr, old('medicion_volumen', $pivot->medicion)) }}>{{ ucfirst($medicion) }}</option>
            @endforeach
        </select>
        @include('@.bootstrap.invalid-input-message', ['name' => 'medicion_volumen'])
    </div>
</div>
