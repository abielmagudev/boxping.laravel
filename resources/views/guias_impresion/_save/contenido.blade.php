<h6>Contenido</h6>
<div class="row border rounded mx-1 py-3 {{ bootstrap_isInputInvalid('contenido', $errors, 'border-danger') }}">
   @foreach($contenidos as $name => $model)
   <?php $content = $model::contentForPrintingGuide() ?>
   <div class="col-sm">
      <label class="form-label fw-bold small">{{ ucfirst($name) }}</label>
      <div class="input-group input-group-sm mb-3">
         <span class="input-group-text text-secondary small" id="input-orden">ORDEN</span>
         <input type="number" class="form-control" step="1" min="1" max="100" name="contenido[<?= $name ?>][orden]" value="<?= $guia->hasContenido($name, 'orden') ? old("contenido.{$name}.orden", $guia->getContenidoOrden($name)) : $loop->iteration ?>" id="input-orden">
      </div>
      @foreach($content as $attr => $label)
      @continue( $attr == 'orden' )     
      <?php
         $checkbox_checked = $guia->hasContenido($name, $attr) || old("contenido.{$name}.{$attr}") === 'yes' ? 'checked' : '';
         $checkbox_name = "contenido[{$name}][{$attr}]";
         $checkbox_id = "checkbox-{$name}-{$attr}";
      ?>
      <div class="form-check">
         <input class="form-check-input" type="checkbox" id="<?= $checkbox_id ?>" name="<?= $checkbox_name ?>" value="yes" <?= $checkbox_checked ?>>
         <label class="form-check-label" for="<?= $checkbox_id ?>">{{ $label }}</label>
      </div>
      @endforeach
   </div>
   @endforeach
</div>
@include('@.bootstrap.invalid-input-message', ['name' => 'contenido'])
<br>
