@extends('entradas.create')
@section('form_content')
<div class="form-group">
    <label for="read-consolidado-numero" class="small">Número de consolidado</label>
    <div class="form-control bg-light" id="read-consolidado-numero">{{ $consolidado->numero }}</div>
    <input name="consolidado" value="{{ $consolidado->id }}" type="hidden">
</div>
<div class="form-group">
    <label for="read-cliente" class="small">Cliente</label>
    <div class="form-control bg-light">{{ $consolidado->cliente->nombre }} ({{ $consolidado->cliente->alias }})</div>
</div>
@parent
@endsection
