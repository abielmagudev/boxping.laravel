<h6>Márgenes</h6>
<div class="mb-3 row">
   <div class="col-sm">
      <?php $margenes_arriba = $guia->margenes->arriba ?? null ?>
      <label class="form-label small" for="input-margen-arriba">Arriba</label>
      <input type="number" min="0.0" step="0.1" id="input-margen-arriba" class="form-control {{ bootstrap_isInputInvalid('margenes.arriba', $errors) }}" name="margenes[arriba]" value="{{ old('margenes.arriba', $margenes_arriba) }}">
      @include('@.bootstrap.invalid-input-message', ['name' => 'margenes.arriba'])
   </div>
   <div class="col-sm">
      <?php $margenes_derecha = $guia->margenes->derecha ?? null ?>
      <label class="form-label small" for="input-margen-derecha">Derecha</label>
      <input type="number" min="0.0" step="0.1" id="input-margen-derecha" class="form-control {{ bootstrap_isInputInvalid('margenes.derecha', $errors) }}" name="margenes[derecha]" value="{{ old('margenes.derecha', $margenes_derecha) }}">
      @include('@.bootstrap.invalid-input-message', ['name' => 'margenes.derecha'])
   </div>
   <div class="col-sm">
      <?php $margenes_abajo = $guia->margenes->abajo ?? null ?>
      <label class="form-label small" for="input-margen-abajo">Abajo</label>
      <input type="number" min="0.0" step="0.1" id="input-margen-abajo" class="form-control {{ bootstrap_isInputInvalid('margenes.abajo', $errors) }}" name="margenes[abajo]" value="{{ old('margenes.abajo', $margenes_abajo) }}">
      @include('@.bootstrap.invalid-input-message', ['name' => 'margenes.abajo'])
   </div>
   <div class="col-sm">
      <?php $margenes_izquierda = $guia->margenes->izquierda ?? null ?>
      <label class="form-label small" for="input-margen-izquierda">Izquierda</label>
      <input type="number" min="0.0" step="0.1" id="input-margen-izquierda" class="form-control {{ bootstrap_isInputInvalid('margenes.izquierda', $errors) }}" name="margenes[izquierda]" value="{{ old('margenes.izquierda', $margenes_izquierda) }}">
      @include('@.bootstrap.invalid-input-message', ['name' => 'margenes.izquierda'])
   </div>
   <div class="col-sm col-sm-4">
      <?php $margenes_medicion = $guia->margenes->medicion ?? null ?>
      <label class="form-label small" for="select-margen-medicion">Medición</label>
      <select id="select-margen-medicion" class="form-select {{ bootstrap_isInputInvalid('margenes.medicion', $errors) }}" name="margenes[medicion]">
         @foreach ($mediciones['longitud'] as $value => $tag)
         <option value="{{ $value }}" {{ toggleSelected($value, old('margenes.medicion', $margenes_medicion)) }}>{{ ucfirst($tag) }}</option>
         @endforeach
      </select>
      @include('@.bootstrap.invalid-input-message', ['name' => 'margenes.medicion'])
   </div>
</div>
<br> 
