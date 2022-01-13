<div class="">
   <label for="input-texto_final" class="form-label small">Texto final</label>
   <input type="text" class="form-control <?= bootstrap_isInputInvalid('texto_final', $errors) ?>" id="textarea-texto_final" name="texto_final" value="<?= old('texto_final', $guia->texto_final) ?>" placeholder="Opcional">
   <small class="form-text">Información extra al final de la página impresa.</small>
   @include('@.bootstrap.invalid-input-message', ['name' => 'texto_final'])
</div>
<br>
<br>
