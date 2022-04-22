<h6>Márgenes</h6>
<div class="mb-3 row">
   <div class="col-sm mb-3">
      <label class="form-label small" for="input-margen-arriba">Arriba</label>
      <input type="number" min="0.0" step="0.1" id="input-margen-arriba" class="form-control <?= bootstrap_isInputInvalid('margenes.arriba', $errors) ?>" name="margenes[arriba]" value="<?= old('margenes.arriba', $guia->margen_arriba) ?>" placeholder="Auto">
      @include('@.bootstrap.invalid-input-message', ['name' => 'margenes.arriba'])
   </div>
   <div class="col-sm mb-3">
      <label class="form-label small" for="input-margen-derecha">Derecha</label>
      <input type="number" min="0.0" step="0.1" id="input-margen-derecha" class="form-control <?= bootstrap_isInputInvalid('margenes.derecha', $errors) ?>" name="margenes[derecha]" value="<?= old('margenes.derecha', $guia->margen_derecha) ?>" placeholder="Auto">
      @include('@.bootstrap.invalid-input-message', ['name' => 'margenes.derecha'])
   </div>
   <div class="col-sm mb-3">
      <label class="form-label small" for="input-margen-abajo">Abajo</label>
      <input type="number" min="0.0" step="0.1" id="input-margen-abajo" class="form-control <?= bootstrap_isInputInvalid('margenes.abajo', $errors) ?>" name="margenes[abajo]" value="<?= old('margenes.abajo', $guia->margen_abajo) ?>" placeholder="Auto">
      @include('@.bootstrap.invalid-input-message', ['name' => 'margenes.abajo'])
   </div>
   <div class="col-sm mb-3">
      <label class="form-label small" for="input-margen-izquierda">Izquierda</label>
      <input type="number" min="0.0" step="0.1" id="input-margen-izquierda" class="form-control <?= bootstrap_isInputInvalid('margenes.izquierda', $errors) ?>" name="margenes[izquierda]" value="<?= old('margenes.izquierda', $guia->margen_izquierda) ?>" placeholder="Auto">
      @include('@.bootstrap.invalid-input-message', ['name' => 'margenes.izquierda'])
   </div>
   <div class="col-sm col-sm-3">
      <label class="form-label small" for="select-margen-medicion">Medición</label>
      <select id="select-margen-medicion" class="form-select <?= bootstrap_isInputInvalid('margenes.medicion', $errors) ?>" name="margenes[medicion]">
         @foreach ($designer::measurements() as $value => $label)
         <option value="<?= $value ?>" <?= toggleSelected($value, old('margenes.medicion', $guia->margenes_medicion)) ?>><?= ucfirst($label) ?></option>
         @endforeach
      </select>
      @include('@.bootstrap.invalid-input-message', ['name' => 'margenes.medicion'])
   </div>
</div>
@include('@.bootstrap.invalid-input-message', ['name' => 'margenes'])
<br> 
<br>
