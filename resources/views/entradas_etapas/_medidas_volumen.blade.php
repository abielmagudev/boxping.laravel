<?php

$ancho_pivot = $etapa->entrada_etapa->ancho ?? null;
$altura_pivot = $etapa->entrada_etapa->altura ?? null;
$largo_pivot = $etapa->entrada_etapa->largo ?? null;
$medicion_volumen_pivot = $etapa->entrada_etapa->medicion_volumen ?? null;

?>
<!-- Volúmen -->
<div class="row mb-3">
    <div class="col-sm">
        <label for="input-ancho" class="form-label small">Ancho</label>
        <input name="ancho" value="{{ old('ancho', $ancho_pivot) }}" id="input-ancho" type="number" step="0.01" min="0.01" class="form-control">
    </div>
    <div class="col-sm">
        <label for="input-altura" class="form-label small">Altura</label>
        <input name="altura" value="{{ old('altura', $altura_pivot) }}" id="input-altura" type="number" step="0.01" min="0.01" class="form-control">
    </div>
    <div class="col-sm">
        <label for="input-largo" class="form-label small">Largo</label>
        <input name="largo" value="{{ old('largo', $largo_pivot) }}" id="input-largo" type="number" step="0.01" min="0.01" class="form-control">
    </div>
    <div class="col-sm">
        <label for="select-medicion_volumen" class="form-label small">Medición de volúmen</label>
        <select name="medicion_volumen" id="select-medicion_volumen" class="form-select">
            @if( ! $etapa->hasMedicionUnicaVolumen() )
            <option label="" disabled selected></option>
            @endif    
        
            @foreach($etapa->mediciones_volumen as $abbr => $medicion )
            <option value="{{ $abbr }}" {{ toggleSelected($abbr, old('medicion_volumen', $medicion_volumen_pivot)) }}>{{ ucfirst($medicion) }}</option>
            @endforeach
        </select>
    </div>
</div>
