<div class="">
   <label for="input-informacion_final" class="form-label small">Información final</label>
   <input type="text" class="form-control <?= bootstrap_isInputInvalid('informacion_final', $errors) ?>" id="textarea-informacion_final" name="informacion_final" value="<?= old('informacion_final', $guia->informacion_final) ?>" placeholder="Opcional">
   <small class="form-text">Contenido extra al final de la página impresa.</small>
   @include('@.bootstrap.invalid-input-message', ['name' => 'informacion_final'])
</div>
<br>
<br>
