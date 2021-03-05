@if( $etapa->realiza_medicion )
<!-- Peso -->
<div class="row mb-3">
    <div class="col-sm">
        <label for="input-peso" class="form-label small">Peso</label>
        <?php $peso_pivot = $etapa->pivot->peso ?? null ?>
        <input name="peso" value="{{ old('peso', $peso_pivot) }}" id="input-peso" type="number" step="0.01" min="0.01" class="form-control">
    </div>
    <div class="col-sm col-sm-3">
        <label for="select-medida_peso" class="form-label small">Medida de peso</label>
        <select name="medida_peso" id="select-medida_peso" class="form-select">
        @if(! $etapa->unica_medida_peso )
            <?php $medida_peso_pivot = $etapa->pivot->medida_peso ?? null ?>
            @foreach($medidas_peso as $m => $medida)
            <option value="{{ $medida }}" {{ selectable(old('medida_peso', $medida_peso_pivot), $medida) }}>{{ ucfirst($medida) }}</option>
            @endforeach

        @else
            <option value="{{ $etapa->unica_medida_peso }}">{{ ucfirst($etapa->unica_medida_peso) }}</option>

        @endif
        </select>
    </div>
</div>

<!-- Volúmen -->
<div class="row mb-3">
    <div class="col-sm">
        <label for="input-ancho" class="form-label small">Ancho</label>
        <?php $ancho_pivot = $etapa->pivot->ancho ?? null ?>
        <input name="ancho" value="{{ old('ancho', $ancho_pivot) }}" id="input-ancho" type="number" step="0.01" min="0.01" class="form-control">
    </div>
    <div class="col-sm">
        <label for="input-altura" class="form-label small">Altura</label>
        <?php $altura_pivot = $etapa->pivot->altura ?? null ?>
        <input name="altura" value="{{ old('altura', $altura_pivot) }}" id="input-altura" type="number" step="0.01" min="0.01" class="form-control">
    </div>
    <div class="col-sm">
        <label for="input-largo" class="form-label small">Largo</label>
        <?php $largo_pivot = $etapa->pivot->largo ?? null ?>
        <input name="largo" value="{{ old('largo', $largo_pivot) }}" id="input-largo" type="number" step="0.01" min="0.01" class="form-control">
    </div>
    <div class="col-sm">
        <label for="select-medida_volumen" class="form-label small">Medida de volúmen</label>
        <select name="medida_volumen" id="select-medida_volumen" class="form-select">
        @if(! $etapa->unica_medida_volumen )
            <?php $medida_volumen_pivot = $etapa->pivot->medida_peso ?? null ?>
            @foreach($medidas_volumen as $m => $medida)
            <option value="{{ $medida }}" {{ selectable(old('medida_volumen', $medida_volumen_pivot), $medida) }}>{{ ucfirst($medida) }}</option>
            @endforeach
        
        @else
            <option value="{{ $etapa->unica_medida_volumen }}">{{ ucfirst($etapa->unica_medida_volumen) }}</option>

        @endif
        </select>
    </div>
</div>
@endif
