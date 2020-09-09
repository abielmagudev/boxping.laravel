@extends('entradas.edit')
@section('update', 'cruce')
@section('form_content')
    <div class="form-group">
        <label for="read-entrada-numero" class="small">Número de entrada</label>
        <div class="form-control bg-light">{{ $entrada->alias_numero ?? $entrada->numero }}</div>
    </div>
    <div class="form-group">
        <label for="select-vehiculo" class="small">Vehiculo</label>
        <select name="vehiculo" id="select-vehiculo" class="form-control" required>
            <option disabled selected></option>
            @foreach($vehiculos as $vehiculo)
            <option value="{{ $vehiculo->id }}" {{ selectable($vehiculo->id, old('vehiculo', $entrada->vehiculo_id)) }}>{{ $vehiculo->nombre }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="select-conductor" class="small">Conductor</label>
        <select name="conductor" id="select-conductor" class="form-control" required>
            <option disabled selected></option>
            @foreach($conductores as $conductor)
            <option value="{{ $conductor->id }}" {{ selectable($conductor->id, old('conductor', $entrada->conductor_id)) }}>{{ $conductor->nombre }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="vuelta" class="small">Vuelta</label>
        <input type="number" class="form-control" min="1" step="1" id="vuelta" name="vuelta" value="{{ $entrada->vuelta }}" required>
    </div>
    <div class="form-group">
        <label class="small">Fecha y hora</label>
        <div class="form-row">
            <div class="col-sm">
                <input name="cruce_fecha" value="{{ old('cruce_fecha', $entrada->cruce_fecha) }}" type="date" class="form-control" required>
            </div>
            <div class="col-sm">
                <input name="cruce_hora" value="{{ old('cruce_hora', $entrada->cruce_hora) }}" type="time" step="1" class="form-control" required>
            </div>
        </div>
    </div>
@endsection
