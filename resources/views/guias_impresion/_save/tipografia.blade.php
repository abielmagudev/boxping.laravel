<h6>Tipografía</h6>
<div class="mb-3 row">
   <div class="col-sm">
      <?php $tipografia_fuente = $guia->tipografia->fuente ?? null ?>
      <label class="form-label small" for="select-fuente">Fuente</label>
      <select id="select-fuente" class="form-select <?= bootstrap_isInputInvalid('tipografia.fuente', $errors) ?>" name="tipografia[fuente]" required>
         @foreach ($pagina->tipografia->fuentes as $value => $tag)
         <option value="<?= $value ?>" <?= toggleSelected($value, old('tipografia.fuente', $tipografia_fuente)) ?>>{{ $tag }}</option>
         @endforeach
      </select>
      @include('@.bootstrap.invalid-input-message', ['name' => 'tipografia.fuente'])
   </div>
   <div class="col-sm">
      <?php $tipografia_tamano = $guia->tipografia->tamano ?? 12 ?>
      <label class="form-label small" for="input-fuente-tamano">Tamaño</label>
      <input type="number" min="0.0" step="0.1" id="input-fuente-tamano" class="form-control <?= bootstrap_isInputInvalid('tipografia.tamano', $errors) ?>" name="tipografia[tamano]" value="<?= old('tipografia.tamano', $tipografia_tamano) ?>" required>
      @include('@.bootstrap.invalid-input-message', ['name' => 'tipografia.tamano'])
   </div>
   <div class="col-sm">
      <?php $tipografia_medicion = $guia->tipografia->medicion ?? null ?>
      <label class="form-label small" for="select-fuente-medicion">Medición</label>
      <select id="select-fuente-medicion" class="form-select <?= bootstrap_isInputInvalid('tipografia.medicion', $errors) ?>" name="tipografia[medicion]" required>
         @foreach ($pagina->tipografia->mediciones as $value => $tag)
         <option value="<?= $value ?>" <?= toggleSelected($value, old('tipografia.medicion', $tipografia_medicion)) ?>>{{ $tag }}</option>
         @endforeach
      </select>
      @include('@.bootstrap.invalid-input-message', ['name' => 'tipografia.medicion'])
   </div>
</div>
@include('@.bootstrap.invalid-input-message', ['name' => 'tipografia'])
<br>
