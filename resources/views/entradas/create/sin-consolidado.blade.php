@extends('entradas.create')
@section('form_content')
<div class="form-group">
    <label for="read-consolidado-numero" class="small">Número de consolidado</label>
    <div class="form-control bg-light">Sin consolidar</div>
</div>
<div class="form-group">
    <label for="select-cliente" class="small">Cliente</label>
    <select name="cliente" id="select-cliente" class="form-control" required>
        <option disabled selected></option>
        @foreach($clientes as $cliente)
        <option value="{{ $cliente->id }}" {{ selectable( old('cliente', $entrada->cliente_id), $cliente->id ) }}>{{ $cliente->nombre }} ({{ $cliente->alias }})</option>
        @endforeach
    </select>
</div>
@parent
@endsection
