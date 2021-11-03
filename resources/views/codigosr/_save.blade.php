@csrf
<div class="mb-3">
    <label for="input-nombre" class="form-label small">Nombre</label>
    <input type="text" class="form-control {{ bootstrap_isInputInvalid('nombre', $errors) }}" id="input-nombre" name="nombre" value="{{ old('nombre', $codigor->nombre) }}" required>
    @include('@.bootstrap.invalid-input-message', ['name' => 'nombre'])
</div>
<div class="mb-3">
    <label for="textarea-descripcion" class="form-label small">Descripción</label>
    <textarea cols="30" rows="5" class="form-control {{ bootstrap_isInputInvalid('descripcion', $errors) }}" id="textarea-descripcion" name="descripcion">{{ old('descripcion', $codigor->descripcion) }}</textarea>
    @include('@.bootstrap.invalid-input-message', ['name' => 'descripcion'])
</div>
