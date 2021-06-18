<?php

$old = 1;

if( ! is_null($entrada->id) )
    $old = old('cliente_alias_numero', $entrada->cliente_alias_numero);

?>
<div class="form-check mb-3">
    <input name="cliente_alias_numero" value="1" id="checkbox-cliente-alias-numero" type="checkbox" class="form-check-input" {{ checkable(1, $old) }}>
    <label for="checkbox-cliente-alias-numero" class="form-check-label small">Alias del cliente al comienzo del número de entrada.</label>
</div>
<div class="mb-3">
    <label for="input-numero" class="form-label small">Número</label>
    <input name="numero" value="{{ old('numero', $entrada->numero) }}" id="input-numero" type="text" class="form-control" autofocus required>
</div>
<div class="mb-3">
    <label for="textarea-contenido" class="form-label small">Contenido</label>
    <textarea name="contenido" id="textarea-contenido" cols="30" rows="5" class="form-control">{{ old('contenido', $entrada->contenido) }}</textarea>
</div>
