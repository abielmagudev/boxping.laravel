@csrf
<div class="mb-3">
    <label for="input-nombre" class="form-label small">Nombre</label>
    <input type="text" class="form-control {{ bootstrap_isInputInvalid('nombre', $errors) }}" id="input-nombre" name="nombre" value="{{ old('nombre', $reempacador->nombre) }}" required>
    @include('@.bootstrap.invalid-input-message', ['name' => 'nombre'])
</div>
<div class="mb-3">
    <label for="input-clave" class="form-label small">Clave</label>
    <input type="text" class="form-control {{ bootstrap_isInputInvalid('clave', $errors) }}" placeholder="{{ $reempacador->id ? 'Ignorar para mantener misma clave' : '' }}" id="input-clave" name="clave" {{ $reempacador->id ?: 'required' }}>
    <small class="text-muted">Recomendación: Mínimo de 4 digitos</small>
    @include('@.bootstrap.invalid-input-message', ['name' => 'clave'])
</div>
