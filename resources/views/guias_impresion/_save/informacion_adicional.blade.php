<div class="">
   <label for="input-informacion_adicional" class="form-label small">Información adicional</label>
   <input type="text" class="form-control <?= bootstrap_isInputInvalid('informacion_adicional', $errors) ?>" id="textarea-informacion_adicional" name="informacion_adicional" value="<?= old('informacion_adicional', $guia->informacion_adicional) ?>" placeholder="Opcional">
   <small class="form-text ms-2">Texto personalizado al final de la página impresa.</small>
   @include('@.bootstrap.invalid-input-message', ['name' => 'informacion_adicional'])
</div>
<br>
<br>
