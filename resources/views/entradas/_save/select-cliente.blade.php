<div class="mb-1">
    <label for="selectCliente" class="form-label small">Cliente</label>
    <select name="cliente" id="selectCliente" class="form-select" required>
        <option disabled selected></option>
        @foreach($clientes as $cliente)
        <option value="{{ $cliente->id }}" {{ toggleSelected($cliente->id, old('cliente', $entrada->cliente_id)) }}>{{ $cliente->nombre }} ({{ $cliente->alias }})</option>
        @endforeach
    </select>
</div>
