@csrf
<p class="fw-bold">Envio</p> 
<div class="mb-3">
    <label for="select-transportadora" class="form-label small">Transportadora</label>
    <select class="form-select" id="select-transportadora" name="transportadora">
        @foreach($transportadoras as $transportadora)
        <option value="{{ $transportadora->id }}" {{ toggleSelected($transportadora->id, old('transportadora', $salida->transportadora_id)) }}>{{ $transportadora->nombre }}</option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label for="input-rastreo" class="form-label small">Rastreo</label>
    <input type="text" class="form-control" id="input-rastreo" name="rastreo" value="{{ old('rastreo', $salida->rastreo) }}">
</div>
<div class="mb-3">
    <label for="input-confirmacion" class="form-label small">Confirmación</label>
    <input type="text" class="form-control" id="input-confirmacion" name="confirmacion" value="{{ old('confirmacion', $salida->confirmacion) }}">
</div>
<br>

<p class="fw-bold">Destino</p>
<div class="mb-3">
    <label class="form-label small">Cobertura</label>
    @foreach ($all_coberturas as $cobertura => $attrs)
    <div class="form-check form-check-inlinex">
        <input class="form-check-input" type="radio" id="radio-cobertura-{{ $cobertura }}" name="cobertura" value="{{ $cobertura }}" {{ toggleChecked($cobertura, old('cobertura', $salida->cobertura)) }}>
        <label class="form-check-label" for="radio-cobertura-{{ $cobertura }}">
            <span class="text-capitalize">{{ $cobertura }}</span>
            <small class="text-muted">({{ $attrs['descripcion'] }})</small>
        </label>
    </div>
    @endforeach
</div>
<fieldset class="row">
    <div class="col-sm col-sm-8 mb-3">
        <label for="input-ocurre-direccion" class="form-label small">Dirección</label>
        <input type="text" class="form-control" id="input-ocurre-direccion" name="direccion" value="{{ old('direccion', $salida->direccion) }}" placeholder="">
    </div>
    <div class="col-sm mb-3">
        <label for="input-ocurre-postal" class="form-label small">Postal</label>
        <input type="text" class="form-control" id="input-ocurre-postal" name="postal" value="{{ old('postal', $salida->postal) }}" placeholder="">
    </div>
    <div class="w-100"></div>
    <div class="col-sm mb-3">
        <label for="input-ocurre-ciudad" class="form-label small">Ciudad</label>
        <input type="text" class="form-control" id="input-ocurre-ciudad" name="ciudad" value="{{ old('ciudad', $salida->ciudad) }}" placeholder="">
    </div>
    <div class="col-sm mb-3">
        <label for="input-ocurre-estado" class="form-label small">Estado</label>
        <input type="text" class="form-control" id="input-ocurre-estado" name="estado" value="{{ old('estado', $salida->estado) }}" placeholder="">
    </div>
    <div class="col-sm mb-3">
        <label for="input-ocurre-pais" class="form-label small">Pais</label>
        <input type="text" class="form-control" id="input-ocurre-pais" name="pais" value="{{ old('pais', $salida->pais) }}" placeholder="">
    </div>
</fieldset>
<br>

@if( $salida->isReal() )
<p class="fw-bold">Proceso</p>
<div class="mb-3">
    <label for="select-status" class="form-label small">Status</label>
    <select class="form-select" id="select-status" name="status">
        @foreach($all_status as $status => $props)
        <option value="{{ $status }}" {{ toggleSelected($status, old('status', $salida->status)) }}>{{ ucfirst($status) }}</option>
        @endforeach
    </select>
</div>

@if( $incidentes->count() )
<div class="mb-3">
    <label class="form-label small">
        <span>Incidentes</span>
        <span class="badge bg-dark d-none">{{ $incidentes->count() }}</span>
        <span class="badge bg-primary">{{ $salida->incidentes->count() }}</span>
    </label>
    <div class="border rounded overflow-auto" style="height:33vh">
        <ul class="list-group list-group-flush">
            @foreach($incidentes as $incidente)
            <?php $incidente_checkbox_id = "checkbox-incidente-{$incidente->id}" ?>
            <li class="list-group-item list-group-item-action d-flex">
                <div class="me-3">
                    <input class="form-check-input" type="checkbox" id="{{ $incidente_checkbox_id }}" name="incidentes[]" value="{{ $incidente->id }}" {{ $salida->incidentes->firstWhere('id', $incidente->id) ? 'checked' : '' }}>
                </div>
                <div class="">
                    <label for="{{ $incidente_checkbox_id }}"> {{ $incidente->nombre }}</label>
                </div>
            </li>
            @endforeach
        </ul>
    </div>

</div>
@endif

<div class="mb-3">
    <label for="textarea-notas" class="form-label small">Notas</label>
    <textarea cols="30" rows="5" class="form-control" id="textarea-notas" name="notas">{{ old('notas', $salida->notas) }}</textarea>
</div>
<br>
@endif
