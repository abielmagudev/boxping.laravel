<h6>Contenido</h6>
<div class="d-md-flex border rounded p-3 {{ bootstrap_isInputInvalid('contenido', $errors, 'border-danger') }}">
   @foreach($contenidos as $name => $model)     
   <div class="mb-3">
      <label class="form-label small">{{ ucfirst($name) }}</label>
      @foreach($model::contentForPrintingGuide() as $attr => $tag)
      <?php
         $checkbox_checked = $guia->hasContenido($name, $attr) || old("contenido.{$name}.{$attr}") === 'yes' ? 'checked' : '';
         $checkbox_name = "contenido[{$name}][{$attr}]";
         $checkbox_id = "checkbox-{$name}-{$attr}";
      ?>
      <div class="form-check me-5">
         <input class="form-check-input" type="checkbox" id="{{ $checkbox_id }}" name="{{ $checkbox_name }}" value="yes" {{ $checkbox_checked }}>
         <label class="form-check-label" for="{{ $checkbox_id }}">{{ $tag }}</label>
      </div>
      @endforeach
   </div>
   @endforeach
</div>
@include('@.bootstrap.invalid-input-message', ['name' => 'contenido'])
<br>
