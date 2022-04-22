<h6>Tipografía</h6>
<div class="mb-3 row">
   <div class="col-sm mb-3">
      <label class="form-label small" for="select-fuente">Alineación</label>
      <select id="select-fuente" class="form-select <?= bootstrap_isInputInvalid('tipografia.alineacion', $errors) ?>" name="tipografia[alineacion]" required>
         @foreach ($designer::alignments() as $value => $label)
         <option value="<?= $value ?>" <?= toggleSelected($value, old('tipografia.alineacion', $guia->tipografia_alineacion)) ?>>{{ $label }}</option>
         @endforeach
      </select>
      @include('@.bootstrap.invalid-input-message', ['name' => 'tipografia.alineacion'])
   </div>
   <div class="col-sm mb-3">
      <label class="form-label small" for="select-fuente">Fuente</label>
      <select id="select-fuente" class="form-select <?= bootstrap_isInputInvalid('tipografia.fuente', $errors) ?>" name="tipografia[fuente]" required>
         @foreach ($designer::fonts() as $value => $label)
         <option value="<?= $value ?>" <?= toggleSelected($value, old('tipografia.fuente', $guia->tipografia_fuente)) ?>>{{ $label }}</option>
         @endforeach
      </select>
      @include('@.bootstrap.invalid-input-message', ['name' => 'tipografia.fuente'])
   </div>
   <div class="col-sm mb-3">
      <label class="form-label small" for="input-fuente-tamano">Tamaño</label>
      <input type="number" min="0.0" step="0.1" id="input-fuente-tamano" class="form-control <?= bootstrap_isInputInvalid('tipografia.tamano', $errors) ?>" name="tipografia[tamano]" value="<?= old('tipografia.tamano', $guia->tipografia_tamano) ?>" required>
      @include('@.bootstrap.invalid-input-message', ['name' => 'tipografia.tamano'])
   </div>
   <div class="col-sm">
      <label class="form-label small" for="select-fuente-medicion">Medición</label>
      <select id="select-fuente-medicion" class="form-select <?= bootstrap_isInputInvalid('tipografia.medicion', $errors) ?>" name="tipografia[medicion]" required>
         @foreach ($designer::fontMeasurements() as $value => $label)
         <option value="<?= $value ?>" <?= toggleSelected($value, old('tipografia.medicion', $guia->tipografia_medicion)) ?>>{{ $label }}</option>
         @endforeach
      </select>
      @include('@.bootstrap.invalid-input-message', ['name' => 'tipografia.medicion'])
   </div>
</div>
@include('@.bootstrap.invalid-input-message', ['name' => 'tipografia'])
<br>
<br>
