@extends('app')
@section('content')

@component('@.bootstrap.card', [
    'pretitle' => $entrada->numero,
    'title' => 'Editar importado',    
])
    <form action="{{ route('entradas.update', $entrada) }}" method="post" autocomplete="off">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="select-conductor" class="form-label small">Conductor</label>
            <select name="conductor" id="select-conductor" class="form-select" required>
                <option disabled selected></option>
                @foreach($conductores as $conductor)
                <option value="{{ $conductor->id }}" {{ toggleSelected($conductor->id, old('conductor', $entrada->conductor_id)) }}>{{ $conductor->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="select-vehiculo" class="form-label small">Vehiculo</label>
            <select name="vehiculo" id="select-vehiculo" class="form-select" required>
                <option disabled selected></option>
                @foreach($vehiculos as $vehiculo)
                <option value="{{ $vehiculo->id }}" {{ toggleSelected($vehiculo->id, old('vehiculo', $entrada->vehiculo_id)) }}>{{ $vehiculo->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="input-numero_cruce" class="form-label small">Número de cruce</label>
            <input type="number" class="form-control" min="1" step="1" id="input-numero_cruce" name="numero_cruce" value="{{ $entrada->numero_cruce }}" required>
        </div>
        <div class="mb-3">
            <label class="small">Fecha y hora</label>
            <div class="row">
                <div class="col-sm">
                    <input name="importado_fecha" value="{{ old('importado_fecha', $entrada->getFechaImportado(false)) }}" type="date" class="form-control" required>
                </div>
                <div class="col-sm">
                    <input name="importado_hora" value="{{ old('importado_hora', $entrada->getHoraImportado(false)) }}" type="time" step="1" class="form-control" required>
                </div>
            </div>
        </div>
        <br>

        <button class="btn btn-warning" type="submit" name="actualizar" value="importacion">Actualizar importado</button>
        <a href="{{ route('entradas.show', $entrada) }}" class="btn btn-secondary">Regresar</a>
    </form>
@endcomponent
<br>

@endsection
