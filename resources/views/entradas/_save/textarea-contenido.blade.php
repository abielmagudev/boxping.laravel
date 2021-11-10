<div class="mb-3">
    <label for="textarea-contenido" class="form-label small">Contenido</label>
    <textarea name="contenido" id="textarea-contenido" cols="30" rows="5" class="form-control {{ bootstrap_isInputInvalid('contenido', $errors) }}">{{ old('contenido', $entrada->contenido) }}</textarea>
    @include('@.bootstrap.invalid-input-message', ['name' => 'contenido'])
</div>
