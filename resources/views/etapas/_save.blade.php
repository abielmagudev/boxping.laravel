@csrf
<div class="mb-3">
    <label for="input-nombre" class="form-label small">Nombre</label>
    <input name="nombre" value="{{ old('nombre', $etapa->nombre) }}" id="input-nombre" type="text" class="form-control" required>
</div>    
<div class="mb-3">
    <label for="input-orden" class="form-label small">Orden</label>
    <input name="orden" value="{{ old('orden', $etapa->orden) }}" id="input-orden" type="number" min="1" step="1" class="form-control" required>
</div>  
<div class="mb-3">
    <label class="form-label small">Realiza medición</label>
    <div class="border rounded p-3">
        <div class="form-check">
            <input class="form-check-input" type="radio" id="radio-medicion_yes" name="realiza_medicion" value="1" checked>
            <label class="form-check-label" for="radio-medicion_yes">Si, registra y realizar medición de peso y volúmen a la entrada.</label>
        </div>
        <div class="mb-3 mb-md-1"></div>
        <div class="form-check">
            <?php $checked_no = toggleChecked(0, old('realiza_medicion', $etapa->realiza_medicion)) ?>
            <input class="form-check-input" type="radio" id="radio-medicion_no" name="realiza_medicion" value="0" {{ $checked_no }}>
            <label class="form-check-label" for="radio-medicion_no">No, solamente registra la entrada.</label>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm">
        <div class="mb-3">
            <label for="select-medida_peso" class="form-label small">Medida de peso</label>
            <select name="unica_medida_peso" id="select-medida_peso" class="form-select">
                <option label="Opcional" selected></option>
                @foreach($medidas_peso as $abbr => $value)
                <option value="{{ $value }}" {{ toggleSelected($value, old('medida_peso', $etapa->unica_medida_peso)) }}>{{ ucfirst($value) }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-sm">
        <div class="mb-3">
            <label for="select-medida_volumen" class="form-label small">Medida de volúmen</label>
            <select name="unica_medida_volumen" id="select-medida_volumen" class="form-select">
                <option label="Opcional" selected></option>
                @foreach($medidas_volumen as $abbr => $value)
                <option value="{{ $value }}" {{ toggleSelected($value, old('medida_volumen', $etapa->unica_medida_volumen)) }}>{{ ucfirst($value) }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
<br>
