@csrf
<div class="mb-3">
    <label for="input-nombre" class="form-label small">Nombre</label>
    <input type="text" class="form-control {{ bootstrap_isInputInvalid('nombre', $errors) }}" id="input-nombre" name="nombre" value="{{ old('nombre', $vehiculo->nombre) }}" required>
    @include('@.bootstrap.invalid-input-message', ['name' => 'nombre'])
</div>
<div class="mb-3">
    <label for="textarea-descripcion" class="form-label small">Descripción</label>
    <textarea id="textarea-descripcion" cols="30" rows="5" class="form-control {{ bootstrap_isInputInvalid('descripcion', $errors) }}" name="descripcion">{{ old('descripcion', $vehiculo->descripcion) }}</textarea>
    @include('@.bootstrap.invalid-input-message', ['name' => 'descripcion'])
</div>
