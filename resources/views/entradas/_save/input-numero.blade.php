<div class="mb-3">
    <label for="input-numero" class="form-label small">Número</label>
    <input name="numero" value="{{ old('numero', $entrada->numero) }}" id="input-numero" type="text" class="form-control {{ bootstrap_isInputInvalid('numero', $errors) }}" autofocus required>
    @include('@.bootstrap.invalid-input-message', ['name' => 'numero'])
</div>
