@csrf
<div class="mb-3">
    <label for="input-nombre" class="form-label small">Nombre</label>
    <input name="nombre" value="{{ old('nombre', $transportadora->nombre) }}" type="text" class="form-control {{ bootstrap_isInputInvalid('nombre', $errors) }}" required>
    @include('@.bootstrap.invalid-input-message', ['name' => 'nombre'])
</div>
<div class="mb-3">
    <label for="input-web" class="form-label small">Sitio web</label>
    <input name="web" value="{{ old('web', $transportadora->web) }}" id="input-web" type="text" placeholder="Ej. https://dominio.com" class="form-control {{ bootstrap_isInputInvalid('web', $errors) }}">
    @include('@.bootstrap.invalid-input-message', ['name' => 'web'])
</div>
<div class="mb-3">
    <label for="input-telefono" class="form-label small">Teléfono</label>
    <input name="telefono" value="{{ old('telefono', $transportadora->telefono) }}" id="input-telefono" type="text" class="form-control {{ bootstrap_isInputInvalid('telefono', $errors) }}">
    @include('@.bootstrap.invalid-input-message', ['name' => 'telefono'])
</div>
<div class="mb-3">
    <label for="textarea-notas" class="form-label small">Notas</label>
    <textarea name="notas" id="textarea-notas" cols="30" rows="5" class="form-control {{ bootstrap_isInputInvalid('notas', $errors) }}">{{ old('notas', $transportadora->notas) }}</textarea>
    @include('@.bootstrap.invalid-input-message', ['name' => 'notas'])
</div>
