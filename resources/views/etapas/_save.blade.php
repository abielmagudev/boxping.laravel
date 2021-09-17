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
    <label class="form-label small">Mediciones</label>
    <div class="border rounded p-3">
        <div class="form-check">
            <?php $checked = toggleChecked(2, old('mediciones', $etapa->mediciones)) ?>
            <input class="form-check-input" type="radio" id="radio-mediciones_peso_volumen" name="mediciones" value="2" {{ $checked }}>
            <label class="form-check-label" for="radio-mediciones_peso_volumen">{{ ucfirst($etapa->conceptoMedicion(2)) }}</label>
        </div>
        <div class="mb-3 mb-md-1"></div>
        <div class="form-check">
            <?php $checked = toggleChecked(1, old('mediciones', $etapa->mediciones)) ?>
            <input class="form-check-input" type="radio" id="radio-mediciones_peso" name="mediciones" value="1" {{ $checked }}>
            <label class="form-check-label" for="radio-mediciones_peso">{{ ucfirst($etapa->conceptoMedicion(1)) }}</label>
        </div>
        <div class="mb-3 mb-md-1"></div>
        <div class="form-check">
            <?php $checked = toggleChecked(0, old('mediciones', $etapa->mediciones)) ?>
            <input class="form-check-input" type="radio" id="radio-mediciones_registro" name="mediciones" value="0" {{ $checked }}>
            <label class="form-check-label" for="radio-mediciones_registro">{{ ucfirst($etapa->conceptoMedicion(0)) }}</label>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm">
        <div class="mb-3">
            <label for="select-medicion_peso" class="form-label small">Medición de peso</label>
            <select name="medicion_peso" id="select-medicion_peso" class="form-select">
                <option label="Cuaquiera" selected></option>
                @foreach($etapa->todas_mediciones_peso as $abbr => $value)
                <option value="{{ $abbr }}" {{ toggleSelected($abbr, old('medicion_peso', $etapa->medicion_peso)) }}>{{ ucfirst($value) }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-sm">
        <div class="mb-3">
            <label for="select-medicion_volumen" class="form-label small">Medición de volúmen</label>
            <select name="medicion_volumen" id="select-medicion_volumen" class="form-select">
                <option label="Cualquiera" selected></option>
                @foreach($etapa->todas_mediciones_volumen as $abbr => $value)
                <option value="{{ $abbr }}" {{ toggleSelected($abbr, old('medicion_volumen', $etapa->medicion_volumen)) }}>{{ ucfirst($value) }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
<br>
