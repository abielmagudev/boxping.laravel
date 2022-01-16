@csrf
<p class="fw-bold">Envio</p> 
<div class="mb-3">
    <label for="select-transportadora" class="form-label small">Transportadora</label>
    <select class="form-select {{ bootstrap_isInputInvalid('transportadora', $errors) }}" id="select-transportadora" name="transportadora">
        @foreach($transportadoras as $transportadora)
        <option value="{{ $transportadora->id }}" {{ toggleSelected($transportadora->id, old('transportadora', $salida->transportadora_id)) }}>{{ $transportadora->nombre }}</option>
        @endforeach
    </select>
    @include('@.bootstrap.invalid-input-message', ['name' => 'transportadora'])
</div>
<div class="mb-3">
    <label for="input-rastreo" class="form-label small">Rastreo</label>
    <input type="text" class="form-control {{ bootstrap_isInputInvalid('rastreo', $errors) }}" id="input-rastreo" name="rastreo" value="{{ old('rastreo', $salida->rastreo) }}">
    @include('@.bootstrap.invalid-input-message', ['name' => 'rastreo'])
</div>
<div class="mb-3">
    <label for="input-confirmacion" class="form-label small">Confirmación</label>
    <input type="text" class="form-control {{ bootstrap_isInputInvalid('confirmacion', $errors) }}" id="input-confirmacion" name="confirmacion" value="{{ old('confirmacion', $salida->confirmacion) }}">
    @include('@.bootstrap.invalid-input-message', ['name' => 'confirmacion'])
</div>
<br>

<p class="fw-bold">Destino</p>
<div class="mb-3">
    <label class="form-label small">Cobertura</label>
    <?php $default_cobertura = old('cobertura', $salida->cobertura) ?? $salida::defaultCobertura() ?>
    @foreach($all_coberturas as $cobertura => $attrs)
    <div class="form-check">
        <input class="form-check-input <?= bootstrap_isInputInvalid('cobertura', $errors) ?>" id="radio-cobertura-<?= $cobertura ?>" name="cobertura" value="<?= $cobertura ?>" type="radio" {{ toggleChecked($cobertura, $default_cobertura) }}>
        <label class="form-check-label" for="radio-cobertura-<?= $cobertura ?>">
            <span class="text-capitalize">{{ $cobertura }}</span>
            <small class="text-muted">({{ $attrs['descripcion'] }})</small>
        </label>
    </div>
    @endforeach
    @include('@.bootstrap.invalid-input-message', ['name' => 'cobertura'])
</div>
<fieldset class="row">
    <div class="col-sm col-sm-8 mb-3">
        <label for="input-ocurre-direccion" class="form-label small">Dirección</label>
        <input type="text" class="form-control {{ bootstrap_isInputInvalid('direccion', $errors) }}" id="input-ocurre-direccion" name="direccion" value="{{ old('direccion', $salida->direccion) }}" placeholder="">
        @include('@.bootstrap.invalid-input-message', ['name' => 'direccion'])
    </div>
    <div class="col-sm mb-3">
        <label for="input-ocurre-postal" class="form-label small">Postal</label>
        <input type="text" class="form-control {{ bootstrap_isInputInvalid('postal', $errors) }}" id="input-ocurre-postal" name="postal" value="{{ old('postal', $salida->postal) }}" placeholder="">
        @include('@.bootstrap.invalid-input-message', ['name' => 'postal'])
    </div>
    <div class="w-100"></div>
    <div class="col-sm mb-3">
        <label for="input-ocurre-ciudad" class="form-label small">Ciudad</label>
        <input type="text" class="form-control {{ bootstrap_isInputInvalid('ciudad', $errors) }}" id="input-ocurre-ciudad" name="ciudad" value="{{ old('ciudad', $salida->ciudad) }}" placeholder="">
        @include('@.bootstrap.invalid-input-message', ['name' => 'ciudad'])
    </div>
    <div class="col-sm mb-3">
        <label for="input-ocurre-estado" class="form-label small">Estado</label>
        <input type="text" class="form-control {{ bootstrap_isInputInvalid('estado', $errors) }}" id="input-ocurre-estado" name="estado" value="{{ old('estado', $salida->estado) }}" placeholder="">
        @include('@.bootstrap.invalid-input-message', ['name' => 'estado'])
    </div>
    <div class="col-sm mb-3">
        <label for="input-ocurre-pais" class="form-label small">Pais</label>
        <input type="text" class="form-control {{ bootstrap_isInputInvalid('pais', $errors) }}" id="input-ocurre-pais" name="pais" value="{{ old('pais', $salida->pais) }}" placeholder="">
        @include('@.bootstrap.invalid-input-message', ['name' => 'pais'])
    </div>
</fieldset>
<br>

@if( $salida->isReal() )
<p class="fw-bold">Proceso</p>
<div class="mb-3">
    <label for="select-status" class="form-label small">Status</label>
    <select class="form-select {{ bootstrap_isInputInvalid('status', $errors) }}" id="select-status" name="status">
        @foreach($all_status as $status => $props)
        <option value="{{ $status }}" {{ toggleSelected($status, old('status', $salida->status)) }}>{{ ucfirst($status) }}</option>
        @endforeach
    </select>
    @include('@.bootstrap.invalid-input-message', ['name' => 'status'])
</div>

@if( $incidentes->count() )
<div class="mb-3">
    <label class="form-label small">
        <span>Incidentes</span>
        <span class="badge bg-dark d-none">{{ $incidentes->count() }}</span>
        <span class="badge bg-primary">{{ $salida->incidentes->count() }}</span>
    </label>
    <div class="border rounded overflow-auto {{ bootstrap_isInputInvalid('incidentes', $errors, 'border-danger') }}" style="height:30vh">
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
    @include('@.bootstrap.invalid-input-message', ['name' => 'incidentes'])
</div>
@endif

<div class="mb-3">
    <label for="textarea-notas" class="form-label small">Notas</label>
    <textarea cols="30" rows="3" class="form-control {{ bootstrap_isInputInvalid('notas', $errors) }}" id="textarea-notas" name="notas">{{ old('notas', $salida->notas) }}</textarea>
    @include('@.bootstrap.invalid-input-message', ['name' => 'notas'])
</div>
<br>
@endif
