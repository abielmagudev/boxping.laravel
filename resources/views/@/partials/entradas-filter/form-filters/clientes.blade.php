<?php $clientes = \App\Cliente::all() ?>
<div class="mb-3">
    <label for="selectFilterCliente" class="form-label small">Cliente</label>
    <select name="cliente" id="selectFilterCliente" class="form-control">
        <option value="cualquier" selected>- Cualquier cliente -</option>
        @foreach ($clientes as $cliente)
        <option value="{{ $cliente->id }}" {{ selectable(request('cliente'), $cliente->id) }}>{{ $cliente->nombre }}</option>
        @endforeach
    </select>
</div>
