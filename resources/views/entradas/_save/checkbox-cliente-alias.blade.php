<div class="form-check mb-3">
    <input id="checkboxClienteAliasNumero" class="form-check-input" name="cliente_alias_numero" value="1" type="checkbox" {{ toggleChecked(1, old('cliente_alias_numero', $entrada->cliente_alias_numero)) }}>
    <label for="checkboxClienteAliasNumero" class="form-check-label small">Alias del cliente al comienzo del número de entrada.</label>
</div>
