<h6>Contenido</h6>
<div class="d-md-flex">
   @foreach($contenidos as $contenido)     
   <div class="mb-3">
      <label class="form-label small">{{ ucfirst($contenido->name) }}</label>

      @foreach($contenido->attributes as $atributo => $etiqueta)
      <?php
         $checkbox_checked = $guia->haveContenido($contenido->name, $atributo) || old("contenido.{$contenido->name}.{$atributo}") === 'yes' ? 'checked' : '';
         $checkbox_name = "contenido[{$contenido->name}][{$atributo}]";
         $checkbox_id = "checkbox-{$contenido->name}-{$atributo}";
      ?>
      <div class="form-check me-5">
         <input class="form-check-input" type="checkbox" id="{{ $checkbox_id }}" name="{{ $checkbox_name }}" value="yes" {{ $checkbox_checked }}>
         <label class="form-check-label" for="{{ $checkbox_id }}">{{ $etiqueta }}</label>
      </div>
      @endforeach

   </div>
   @endforeach
</div>
<br>
