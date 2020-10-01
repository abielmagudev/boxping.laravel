@csrf
<div class="form-group">
    <label for="input-nombre" class="small">Nombre</label>
    <input name="nombre" value="{{ old('nombre', $etapa->nombre) }}" id="input-nombre" type="text" class="form-control" required>
</div>
<div class="form-group">
    <label for="textarea-descripcion" class="small">Descripción</label>
    <textarea name="descripcion" id="textarea-descripcion" cols="30" rows="4" class="form-control">{{ old('descripcion', $etapa->descripcion) }}</textarea>
</div>
<div class="form-group">
    <label class="small">Realiza medición</label>
    <div class="border rounded p-3">
        <div class="form-check">
            <?php $checked_yes = checkable(1, old('realizar_medicion', $etapa->realizar_medicion)) ?>
            <input class="form-check-input" type="radio" id="radio-medicion_yes" name="realizar_medicion" value="1" {{ $checked_yes }}>
            <label class="form-check-label" for="radio-medicion_yes">Si, registra y realizar medición de peso y volúmen a la entrada.</label>
        </div>
        <div class="mb-3 mb-md-1"></div>
        <div class="form-check">
            <?php $checked_no = checkable(0, old('realizar_medicion', $etapa->realizar_medicion)) ?>
            <input class="form-check-input" type="radio" id="radio-medicion_no" name="realizar_medicion" value="0" {{ $checked_no }}>
            <label class="form-check-label" for="radio-medicion_no">No, solamente registra la entrada.</label>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm form-group">
        <label for="select-peso_en" class="small">Peso en</label>
        <select name="peso_en" id="select-peso_en" class="form-control">
            <option selected></option>
            @foreach($options_peso_en as $abbr => $value)
            <option value="{{ $value }}" {{ selectable($value, old('peso_en', $etapa->peso_en)) }}>{{ ucfirst($value) }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-sm form-group">
        <label for="select-volumen_en" class="small">Volúmen en</label>
        <select name="volumen_en" id="select-volumen_en" class="form-control">
            <option selected></option>
            @foreach($options_volumen_en as $abbr => $value)
            <option value="{{ $value }}" {{ selectable($value, old('volumen_en', $etapa->volumen_en)) }}>{{ ucfirst($value) }}</option>
            @endforeach
        </select>
    </div>
</div>
<br>
