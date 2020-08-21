@csrf
@if( is_object($consolidado) )
<div class="form-group">
    <label for="read-consolidado" class="small">Consolidado</label>
    <div class="form-control bg-light">{{ $consolidado->numero }}</div>
</div>
<div class="form-group">
    <label for="read-cliente" class="small">Cliente</label>
    <div class="form-control bg-light">{{ $consolidado->cliente->nombre }} ({{ $consolidado->cliente->alias }})</div>
</div>
<input type="hidden" name="consolidado" value="{{ $consolidado->id }}">
<input type="hidden" name="cliente" value="{{ $consolidado->cliente_id }}">

@else
<div class="form-group">
    <label for="select-cliente" class="small">Cliente</label>
    <select name="cliente" id="select-cliente" class="form-control" required>
        <option disabled selected></option>
        @foreach($clientes as $cliente)
        <option value="{{ $cliente->id }}">{{ $cliente->nombre }} ({{ $cliente->alias }})</option>
        @endforeach
    </select>
</div>

@endif

<div class="form-group">
    <label for="input-numero" class="small">Número</label>
    <input type="text" name="numero" id="input-numero" class="form-control" required>
</div>
<div class="form-check">
    <input class="form-check-input" type="checkbox" name="cliente_alias_numero" value="1" id="cliente-alias-numero">
    <label class="form-check-label" for="cliente-alias-numero">Número con alias del cliente al principio.</label>
</div>
