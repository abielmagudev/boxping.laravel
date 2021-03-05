<div class="mb-3">
    <label for="read-consolidado-numero" class="form-label small">Número de consolidado</label>
    <div class="form-control bg-light">Sin consolidar</div>
</div>
<div class="mb-1">
    <label for="select-cliente" class="form-label small">Cliente</label>
    <select name="cliente" id="select-cliente" class="form-select" required>
        <option disabled selected></option>
        @foreach($clientes as $cliente)
        <option value="{{ $cliente->id }}" {{ selectable( old('cliente', $entrada->cliente_id), $cliente->id ) }}>{{ $cliente->nombre }} ({{ $cliente->alias }})</option>
        @endforeach
    </select>
</div>
