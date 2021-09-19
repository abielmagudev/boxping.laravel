<!-- Volúmen -->
<div class="row mb-3">
    <div class="col-sm">
        <label for="input-ancho" class="form-label small">Ancho</label>
        <?php $ancho_pivot = $etapa->entrada_etapa->ancho ?? null ?>
        <input name="ancho" value="{{ old('ancho', $ancho_pivot) }}" id="input-ancho" type="number" step="0.01" min="0.01" class="form-control">
    </div>
    <div class="col-sm">
        <label for="input-altura" class="form-label small">Altura</label>
        <?php $altura_pivot = $etapa->entrada_etapa->altura ?? null ?>
        <input name="altura" value="{{ old('altura', $altura_pivot) }}" id="input-altura" type="number" step="0.01" min="0.01" class="form-control">
    </div>
    <div class="col-sm">
        <label for="input-largo" class="form-label small">Largo</label>
        <?php $largo_pivot = $etapa->entrada_etapa->largo ?? null ?>
        <input name="largo" value="{{ old('largo', $largo_pivot) }}" id="input-largo" type="number" step="0.01" min="0.01" class="form-control">
    </div>
    <div class="col-sm">
        <label for="select-medida_volumen" class="form-label small">Medida de volúmen</label>
        <select name="medida_volumen" id="select-medida_volumen" class="form-select">
            @if( ! $etapa->hasMedicionUnicaVolumen() )
            <option label="" disabled selected></option>
            @endif    
        
            @foreach($etapa->mediciones_volumen as $abbr => $medida )
            <option value="{{ $medida }}" {{ toggleSelected($medida, old('medida_volumen')) }}>{{ ucfirst($medida) }}</option>
            @endforeach
        </select>
    </div>
</div>
<br class="my-5">
