<div class="text-muted small mb-4">
    <div class="">Entrada <br> {{ $entrada->alias_numero ?? $entrada->numero }}</div>
</div>
<div class="mb-3">
    <label for="select-conductor" class="form-label small">Conductor</label>
    <select name="conductor" id="select-conductor" class="form-select" required>
        <option disabled selected></option>
        @foreach($conductores as $conductor)
        <option value="{{ $conductor->id }}" {{ selectable($conductor->id, old('conductor', $entrada->conductor_id)) }}>{{ $conductor->nombre }}</option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label for="select-vehiculo" class="form-label small">Vehiculo</label>
    <select name="vehiculo" id="select-vehiculo" class="form-select" required>
        <option disabled selected></option>
        @foreach($vehiculos as $vehiculo)
        <option value="{{ $vehiculo->id }}" {{ selectable($vehiculo->id, old('vehiculo', $entrada->vehiculo_id)) }}>{{ $vehiculo->alias }}</option>
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
            <input name="importado_fecha" value="{{ old('importado_fecha', $entrada->importado_fecha) }}" type="date" class="form-control" required>
        </div>
        <div class="col-sm">
            <input name="importado_hora" value="{{ old('importado_hora', $entrada->importado_hora) }}" type="time" step="1" class="form-control" required>
        </div>
    </div>
</div>
