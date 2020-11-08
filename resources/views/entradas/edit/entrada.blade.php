<div class="form-group">
    <label for="input-consolidado" class="small">Número de consolidado</label>
    <input name="consolidado_numero" value="{{ $consolidado->numero ?? '' }}" placeholder="Sin consolidar" type="text" id="input-consolidado" class="form-control">
</div>
<div class="form-group">
    <label for="select-cliente" class="small">Cliente</label>
    @if( $consolidado )
    <div class="form-control bg-light">
        <span>{{ $entrada->cliente->nombre }} ({{ $entrada->cliente->alias }})</span>
    </div>

    @else
    <select name="cliente" id="select-cliente" class="form-control">
        @foreach($clientes as $cliente)
        <option value="{{ $cliente->id }}" {{ selectable($cliente->id, old('cliente', $entrada->cliente_id)) }}>{{ $cliente->nombre }} ({{ $cliente->alias }})</option>
        @endforeach
    </select>

    @endif
</div>
@include('entradas._save')
