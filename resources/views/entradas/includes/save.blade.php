<div class="form-group mb-0">
    <label for="input-numero" class="small">Número</label>
    <input name="numero" value="{{ old('numero', $entrada->numero) }}" id="input-numero" type="text" class="form-control" required>
</div>
<div class="form-check">
    <input name="cliente_alias_numero" value="1" id="checkbox-cliente-alias-numero" type="checkbox" class="form-check-input" {{ checkable(1, old('cliente_alias_numero', $entrada->cliente_alias_numero)) }}>
    <label for="checkbox-cliente-alias-numero" class="form-check-label small">Alias del cliente al comienzo del número de entrada.</label>
</div>
@csrf
