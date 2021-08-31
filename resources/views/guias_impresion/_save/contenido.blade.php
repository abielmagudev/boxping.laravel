<h6>Contenido</h6>
<div class="d-md-flex">
   @foreach($contenidos as $contenido => $atributos)     
   <div class="mb-3">
      <label class="form-label small">{{ ucfirst($contenido) }}</label>

      @foreach($atributos as $atributo => $etiqueta)
      <?php
         $checkbox_checked = $guia->haveContenido($contenido, $atributo) || old("contenido.{$contenido}.{$atributo}") === 'yes' ? 'checked' : '';
         $checkbox_name = "contenido[{$contenido}][{$atributo}]";
         $checkbox_id = "checkbox-{$contenido}-{$atributo}";
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
