@extends('entradas.edit')
@section('update','entrada')
@section('form_content')
    <div class="form-group">
        <label for="read-consolidado" class="small">Consolidado</label>
        <input type="text" name="consolidado_numero" value="{{ $entrada->consolidado->numero ?? '' }}" placeholder="Sin consolidar" class="form-control">
        <input type="hidden" name="consolidado" value="{{ $entrada->consolidado_id }}">
    </div>

    @if( is_null($entrada->consolidado_id) )
    <div class="form-group">
        <label for="select-cliente" class="small">Cliente</label>
        <select name="cliente" id="select-cliente" class="form-control" required>
            @foreach($clientes as $cliente)
            <option value="{{ $cliente->id }}" {{ selectable(old('cliente', $entrada->cliente_id), $cliente->id) }}>{{ $cliente->nombre }} ({{ $cliente->alias }})</option>
            @endforeach
        </select>
    </div>

    @else
    <div class="form-group">
        <label for="read-cliente" class="small">Cliente</label>
        <div class="form-control bg-light">{{ $entrada->consolidado->cliente->nombre }} ({{ $entrada->consolidado->cliente->alias }})</div>
        <input type="hidden" name="cliente" value="{{ $entrada->consolidado->cliente_id }}">
    </div>

    @endif

    <div class="form-group">
        <label for="input-numero" class="small">Número</label>
        <input type="text" name="numero" value="{{ $entrada->numero }}" id="input-numero" class="form-control" required>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="cliente_alias_numero" value="1" id="cliente-alias-numero" {{ checkable(old('cliente_alias_numero', $entrada->cliente_alias_numero), 1) }}>
        <label class="form-check-label" for="cliente-alias-numero">Alias del cliente al principio del número de entrada.</label>
    </div>
@endsection