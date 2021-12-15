<h6>Formato</h6>
<div class="mb-3 row">
   <div class="col-sm">
      <?php $formato_ancho = $guia->formato->ancho ?? null ?>
      <label class="form-label small" for="input-formato-ancho">Ancho</label>
      <input type="number" min="0.01" step="0.01" id="input-formato-ancho" class="form-control <?= bootstrap_isInputInvalid('formato.ancho', $errors) ?>" name="formato[ancho]" value="<?= old('formato.ancho', $formato_ancho) ?>">
      @include('@.bootstrap.invalid-input-message', ['name' => 'formato.ancho'])
   </div>
   <div class="col-sm">
      <?php $formato_altura = $guia->formato->altura ?? null ?>
      <label class="form-label small" for="input-formato-altura">Altura</label>
      <input type="number" min="0.01" step="0.01" id="input-formato-altura" class="form-control <?= bootstrap_isInputInvalid('formato.altura', $errors) ?>" name="formato[altura]" value="<?= old('formato.altura', $formato_altura) ?>">
      @include('@.bootstrap.invalid-input-message', ['name' => 'formato.altura'])
   </div>
   <div class="col-sm">
      <?php $formato_medicion = $guia->formato->medicion ?? null ?>
      <label class="form-label small" for="select-formato-medicion">Medición</label>
      <select id="select-formato-medicion" class="form-select <?= bootstrap_isInputInvalid('formato.medicion', $errors) ?>" name="formato[medicion]" required>
         @foreach($pagina->mediciones as $value => $tag)
         <option value="<?= $value ?>" <?= toggleSelected($value, old('formato.medicion', $formato_medicion)) ?>>{{ ucfirst($tag) }}</option>
         @endforeach
      </select>
      @include('@.bootstrap.invalid-input-message', ['name' => 'formato.medicion'])
   </div>
</div>
@include('@.bootstrap.invalid-input-message', ['name' => 'formato'])
<br>
