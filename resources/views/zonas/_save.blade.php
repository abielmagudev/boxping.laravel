@csrf
<div class="mb-3">
    <label for="input-nombre" class="form-label small">Nombre</label>
    <input name="nombre" value="{{ old('nombre', $zona->nombre) }}" type="text" id="input-nombre" class="form-control {{ bootstrap_isInputInvalid('nombre', $errors) }}" autofocus required>
    @include('@.bootstrap.invalid-input-message', ['name' => 'nombre'])
</div>
<div class="mb-3">
    <label for="textarea-descripcion" class="form-label small">Descripción</label>
    <textarea name="descripcion" id="textarea-descripcion" cols="30" rows="5" class="form-control {{ bootstrap_isInputInvalid('descripcion', $errors) }}">{{ old('descripcion', $zona->descripcion) }}</textarea>
    @include('@.bootstrap.invalid-input-message', ['name' => 'descripcion'])
</div>
