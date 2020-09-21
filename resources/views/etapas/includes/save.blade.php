@csrf
<div class="form-group">
    <label for="input-nombre" class="small">Nombre</label>
    <input name="nombre" value="{{ old('nombre', $etapa->nombre) }}" id="input-nombre" type="text" class="form-control" required>
</div>
<div class="form-group">
    <label for="textarea-descripcion" class="small">Descripción</label>
    <textarea name="descripcion" id="textarea-descripcion" cols="30" rows="5" class="form-control">{{ old('descripcion', $etapa->descripcion) }}</textarea>
</div>
<div class="form-group">
    <label class="small">Realiza medición</label>
    <div class="form-check">
        <?php $checked_yes = checkable(1, old('medicion', $etapa->realizar_medicion)) ?>
        <input class="form-check-input" type="radio" id="radio-medicion_yes" name="medicion" value="1" {{ $checked_yes }}>
        <label class="form-check-label" for="radio-medicion_yes">Si, registra y agregar medidas de peso y volúmen a la entrada.</label>
    </div>
    <div class="mb-3 mb-md-0"></div>
    <div class="form-check">
        <?php $checked_no = checkable(0, old('medicion', $etapa->realizar_medicion)) ?>
        <input class="form-check-input" type="radio" id="radio-medicion_no" name="medicion" value="0" {{ $checked_no }}>
        <label class="form-check-label" for="radio-medicion_no">No, solamente registra la entrada.</label>
    </div>
</div>
<br>