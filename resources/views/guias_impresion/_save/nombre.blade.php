<div class="mb-3">
   <label for="input-nombre" class="form-label small">Nombre</label>
   <input type="text" class="form-control {{ bootstrap_isInputInvalid('nombre', $errors) }}" id="input-nombre" name="nombre" value="{{ old('nombre', $guia->nombre) }}">
   @include('@.bootstrap.invalid-input-message', ['name' => 'nombre'])
</div>
<br>
