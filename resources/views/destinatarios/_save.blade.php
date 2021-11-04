@csrf
<div class="mb-3">
    <label for="input-nombre" class="form-label small">Nombre</label>
    <input type="text" class="form-control {{ bootstrap_isInputInvalid('nombre', $errors) }}" id="input-nombre" name="nombre" value="{{ old('nombre', $destinatario->nombre) }}" required>
    @include('@.bootstrap.invalid-input-message', ['name' => 'nombre'])
</div>
<div class="row">
    <div class="col-sm col-sm-8 mb-3">
        <label for="input-direccion" class="form-label small">Dirección</label>
        <input type="text" class="form-control {{ bootstrap_isInputInvalid('direccion', $errors) }}" id="input-direccion" name="direccion" value="{{ old('direccion', $destinatario->direccion) }}" required>
        @include('@.bootstrap.invalid-input-message', ['name' => 'direccion'])
    </div>
    <div class="col-sm mb-3">
        <label for="input-postal" class="form-label small">Postal</label>
        <input type="text" class="form-control {{ bootstrap_isInputInvalid('postal', $errors) }}" id="input-postal" name="postal" value="{{ old('postal', $destinatario->postal) }}" required>
        @include('@.bootstrap.invalid-input-message', ['name' => 'postal'])
    </div>
</div>
<div class="row">
    <div class="col-sm mb-3">
        <label for="input-ciudad" class="form-label small">Ciudad</label>
        <input type="text" class="form-control {{ bootstrap_isInputInvalid('ciudad', $errors) }}" id="input-ciudad" name="ciudad" value="{{ old('ciudad', $destinatario->ciudad) }}" required>
        @include('@.bootstrap.invalid-input-message', ['name' => 'ciudad'])
    </div>
    <div class="col-sm mb-3">
        <label for="input-estado" class="form-label small">Estado</label>
        <input type="text" class="form-control {{ bootstrap_isInputInvalid('estado', $errors) }}" id="input-estado" name="estado" value="{{ old('estado', $destinatario->estado) }}" required>
        @include('@.bootstrap.invalid-input-message', ['name' => 'estado'])
    </div>
    <div class="col-sm mb-3">
        <label for="input-pais" class="form-label small">Pais</label>
        <input type="text" class="form-control {{ bootstrap_isInputInvalid('pais', $errors) }}" id="input-pais" name="pais" value="{{ old('pais', $destinatario->pais) }}" required>
        @include('@.bootstrap.invalid-input-message', ['name' => 'pais'])
    </div>
</div>
<div class="mb-3">
    <label for="input-telefono" class="form-label small">Teléfono</label>
    <input type="text" class="form-control {{ bootstrap_isInputInvalid('telefono', $errors) }}" id="input-telefono" name="telefono" value="{{ old('telefono', $destinatario->telefono) }}" required>
    @include('@.bootstrap.invalid-input-message', ['name' => 'telefono'])
</div>
<div class="mb-3">
    <label for="input-referencias" class="form-label small">Referencias</label>
    <textarea name="referencias" id="input-referencias" class="form-control {{ bootstrap_isInputInvalid('referencias', $errors) }}" cols="30" rows="5">{{ old('referencias', $destinatario->referencias) }}</textarea>
    @include('@.bootstrap.invalid-input-message', ['name' => 'referencias'])
</div>
<div class="mb-3">
    <label for="input-notas" class="form-label small">Notas</label>
    <textarea name="notas" id="input-notas" class="form-control {{ bootstrap_isInputInvalid('notas', $errors) }}" cols="30" rows="5">{{ old('notas', $destinatario->notas) }}</textarea>
    @include('@.bootstrap.invalid-input-message', ['name' => 'notas'])
</div>
<br>
