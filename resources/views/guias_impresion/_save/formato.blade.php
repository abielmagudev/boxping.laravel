<h6>Formato</h6>
<div class="mb-3 row">
   <div class="col-sm mb-3">
      <label class="form-label small" for="input-formato-ancho">Ancho</label>
      <input type="number" min="0.01" step="0.01" id="input-formato-ancho" class="form-control <?= bootstrap_isInputInvalid('formato.ancho', $errors) ?>" name="formato[ancho]" value="<?= old('formato.ancho', $guia->formato_ancho) ?>" required>
      @include('@.bootstrap.invalid-input-message', ['name' => 'formato.ancho'])
   </div>
   <div class="col-sm mb-3">
      <label class="form-label small" for="input-formato-alto">Alto</label>
      <input type="number" min="0.01" step="0.01" id="input-formato-alto" class="form-control <?= bootstrap_isInputInvalid('formato.alto', $errors) ?>" name="formato[alto]" value="<?= old('formato.alto', $guia->formato_alto) ?>" required>
      @include('@.bootstrap.invalid-input-message', ['name' => 'formato.alto'])
   </div>
   <div class="col-sm col-sm-3">
      <label class="form-label small" for="select-formato-medicion">Medición</label>
      <select id="select-formato-medicion" class="form-select <?= bootstrap_isInputInvalid('formato.medicion', $errors) ?>" name="formato[medicion]" required>
         @foreach($designer::measurements() as $value => $label)
         <option value="<?= $value ?>" <?= toggleSelected($value, old('formato.medicion', $guia->formato_medicion)) ?>>{{ ucfirst($label) }}</option>
         @endforeach
      </select>
      @include('@.bootstrap.invalid-input-message', ['name' => 'formato.medicion'])
   </div>
</div>
@include('@.bootstrap.invalid-input-message', ['name' => 'formato'])
<br>
<br>
