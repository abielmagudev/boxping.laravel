<div class="mb-3">
    <label for="selectCliente" class="form-label small">Cliente</label>
    <select name="cliente" id="selectCliente" class="form-select {{ bootstrap_isInputInvalid('cliente', $errors) }}" required>
        <option disabled selected></option>
        @foreach($clientes as $cliente)
        <option value="{{ $cliente->id }}" {{ toggleSelected($cliente->id, old('cliente', $entrada->cliente_id)) }}>{{ $cliente->nombre }} ({{ $cliente->alias }})</option>
        @endforeach
    </select>
    @include('@.bootstrap.invalid-input-message', ['name' => 'cliente'])
</div>
