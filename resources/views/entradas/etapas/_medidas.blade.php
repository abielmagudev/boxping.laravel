@if( $etapa->realiza_medicion )
<!-- Peso -->
<div class="row">
    <div class="col-sm form-group">
        <label for="input-peso">
            <small>Peso</small>
        </label>
        <?php $peso_stored = $etapa->pivot->peso ?? null ?>
        <input name="peso" value="{{ old('peso', $peso_stored) }}" id="input-peso" type="number" step="0.01" min="0.01" class="form-control">
    </div>
    <div class="col-sm col-sm-3 form-group">
        <label for="select-medida_peso">
            <small>Medida de peso</small>
        </label>
        <select name="medida_peso" id="select-medida_peso" class="form-control">
        @if( ! $etapa->medida_peso )
            <?php $medida_peso_stored = $etapa->pivot->medida_peso ?? null ?>
            @foreach($medidas_peso as $abbr => $medida)
            <option value="{{ $medida }}" {{ selectable(old('medida_peso', $medida_peso_stored), $medida) }}>{{ ucfirst($medida) }}</option>
            @endforeach

        @else
            <option value="{{ $etapa->medida_peso }}">{{ ucfirst($etapa->medida_peso) }}</option>

        @endif
        </select>
    </div>
</div>

<!-- Volúmen -->
<div class="row">
    <div class="col-sm form-group">
        <label for="input-ancho">
            <small>Ancho</small>
        </label>
        <?php $ancho_stored = $etapa->pivot->ancho ?? null ?>
        <input name="ancho" value="{{ old('ancho', $ancho_stored) }}" id="input-ancho" type="number" step="0.01" min="0.01" class="form-control">
    </div>
    <div class="col-sm form-group">
        <label for="input-altura">
            <small>Altura</small>
        </label>
        <?php $altura_stored = $etapa->pivot->altura ?? null ?>
        <input name="altura" value="{{ old('altura', $altura_stored) }}" id="input-altura" type="number" step="0.01" min="0.01" class="form-control">
    </div>
    <div class="col-sm form-group">
        <label for="input-largo">
            <small>Largo</small>
        </label>
        <?php $largo_stored = $etapa->pivot->largo ?? null ?>
        <input name="largo" value="{{ old('largo', $largo_stored) }}" id="input-largo" type="number" step="0.01" min="0.01" class="form-control">
    </div>
    <div class="col-sm form-group">
        <label for="select-medida_volumen">
            <small>Medida de volúmen</small>
        </label>
        <select name="medida_volumen" id="select-medida_volumen" class="form-control">
        @if( ! $etapa->medida_volumen )
            <?php $medida_volumen_stored = $etapa->pivot->medida_peso ?? null ?>
            @foreach($medidas_volumen as $abbr => $medida)
            <option value="{{ $medida }}" {{ selectable(old('medida_volumen', $medida_volumen_stored), $medida) }}>{{ ucfirst($medida) }}</option>
            @endforeach
        
        @else
            <option value="{{ $etapa->medida_volumen }}">{{ ucfirst($etapa->medida_volumen) }}</option>

        @endif
        </select>
    </div>
</div>
@endif
