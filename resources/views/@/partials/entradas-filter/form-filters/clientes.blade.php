<?php $clientes = \App\Cliente::all() ?>
<div class="mb-3">
    <label for="selectFilterCliente" class="form-label small">Cliente</label>
    <select name="cliente" id="selectFilterCliente" class="form-control">
        <option value="cualquier" selected>- Cualquier cliente -</option>
        @foreach ($clientes as $cliente)
        <option value="{{ $cliente->id }}" {{ toggleSelected($cliente->id, request('cliente')) }}>{{ $cliente->nombre }}</option>
        @endforeach
    </select>
</div>
