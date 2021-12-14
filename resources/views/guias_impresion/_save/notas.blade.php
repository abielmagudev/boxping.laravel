<div class="mb-3">
   <label for="input-nombre" class="form-label small">Notas</label>
   <textarea class="form-control {{ bootstrap_isInputInvalid('nombre', $errors) }}" id="textarea-notas" name="notas">{{ old('notas', $guia->notas) }}</textarea>
   <small class="form-text">Si se requiere imprimir información extra al final de la guía de impresión.</small>
   @include('@.bootstrap.invalid-input-message', ['name' => 'notas'])
</div>
<br>
