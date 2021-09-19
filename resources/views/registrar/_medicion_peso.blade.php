<!-- Peso -->
<div class="row mb-3">
    <div class="col-sm">
        <label for="input-peso" class="form-label small">Peso</label>
        <?php $peso_pivot = $etapa->entrada_etapa->peso ?? null ?>
        <input name="peso" value="{{ old('peso', $peso_pivot) }}" id="input-peso" type="number" step="0.01" min="0.01" class="form-control">
    </div>
    <div class="col-sm col-sm-3">
        <label for="select-medida_peso" class="form-label small">Medida de peso</label>
        <select name="medida_peso" id="select-medida_peso" class="form-select">
            @if( ! $etapa->hasMedicionUnicaPeso() )
            <option label="" disabled selected></option>
            @endif

            @foreach($etapa->mediciones_peso as $abbr => $medida)
            <option value="{{ $medida }}" {{ toggleSelected($medida, old('medida_peso')) }}>{{ ucfirst($medida) }}</option>
            @endforeach
        </select>
    </div>
</div>
<br class="my-5">
