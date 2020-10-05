@csrf
<div class="form-group">
    <label for="input-nombre" class="small">Nombre</label>
    <input name="nombre" value="{{ old('nombre', $etapa->nombre) }}" id="input-nombre" type="text" class="form-control" required>
</div>
<div class="form-group">
    <label class="small">Realiza medición</label>
    <div class="border rounded p-3">
        <div class="form-check">
            <?php $checked_yes = checkable(1, old('realiza_medicion', $etapa->realiza_medicion)) ?>
            <input class="form-check-input" type="radio" id="radio-medicion_yes" name="realiza_medicion" value="1" {{ $checked_yes }}>
            <label class="form-check-label" for="radio-medicion_yes">Si, registra y realizar medición de peso y volúmen a la entrada.</label>
        </div>
        <div class="mb-3 mb-md-1"></div>
        <div class="form-check">
            <?php $checked_no = checkable(0, old('realiza_medicion', $etapa->realiza_medicion)) ?>
            <input class="form-check-input" type="radio" id="radio-medicion_no" name="realiza_medicion" value="0" {{ $checked_no }}>
            <label class="form-check-label" for="radio-medicion_no">No, solamente registra la entrada.</label>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm form-group">
        <label for="select-medida_peso" class="small">Medida de peso</label>
        <select name="medida_peso" id="select-medida_peso" class="form-control">
            <option label="Opcional" selected></option>
            @foreach($medidas_peso as $abbr => $value)
            <option value="{{ $value }}" {{ selectable($value, old('medida_peso', $etapa->medida_peso)) }}>{{ ucfirst($value) }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-sm form-group">
        <label for="select-medida_volumen" class="small">Medida de volúmen</label>
        <select name="medida_volumen" id="select-medida_volumen" class="form-control">
            <option label="Opcional" selected></option>
            @foreach($medidas_volumen as $abbr => $value)
            <option value="{{ $value }}" {{ selectable($value, old('medida_volumen', $etapa->medida_volumen)) }}>{{ ucfirst($value) }}</option>
            @endforeach
        </select>
    </div>
</div>
<br>
