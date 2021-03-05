<div class="text-muted small mb-4">
    <div class="">Entrada <br> {{ $entrada->alias_numero ?? $entrada->numero }}</div>
</div>
<div class="mb-3">
    <label for="select-codigo-reempacado" class="form-label small">Código de reempacado</label>
    <select name="codigo_reempacado" id="select-codigo-reempacado" class="form-select">
        <option disabled selected></option>
        @foreach($codigosr as $codigor)
        <option value="{{ $codigor->id }}" {{ selectable($codigor->id, old('codigo_reempacado', $entrada->codigor_id)) }}>{{ $codigor->nombre }} - {{ $codigor->descripcion }}</option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label for="select-reempacador" class="form-label small">Reempacador</label>
    <select name="reempacador" id="select-reempacador" class="form-select">
        <option disabled selected></option>
        @foreach($reempacadores as $reempacador)
        <option value="{{ $reempacador->id }}" {{ selectable($reempacador->id, old('reempacador', $entrada->reempacador_id)) }}>{{ $reempacador->nombre }}</option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label class="form-label small">Fecha y hora</label>
    <div class="row">
        <div class="col-sm">
            <input name="reempacado_fecha" value="{{ old('reempacado_fecha', $entrada->reempacado_fecha) }}" type="date" class="form-control">
        </div>
        <div class="col-sm">
            <input name="reempacado_hora" value="{{ old('reempacado_hora', $entrada->reempacado_hora) }}" type="time" step="1" class="form-control">
        </div>
    </div>
</div>
