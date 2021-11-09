@csrf
<div class="mb-3">
    <label for="cliente" class="form-label small">Cliente</label>
    <select name="cliente" id="cliente" class="form-select {{ bootstrap_isInputInvalid('cliente', $errors) }}" required>
        <option disabled selected label=""></option>
        @foreach($clientes as $cliente)
        <?php $selected = toggleSelected($cliente->id, old('cliente', $consolidado->cliente_id)) ?>
        <option value="{{ $cliente->id }}" {{ $selected }}>{{ $cliente->nombre }} ({{ $cliente->alias }})</option>
        @endforeach
    </select>
    @include('@.bootstrap.invalid-input-message', ['name' => 'cliente'])
</div>

<div class="mb-3">
    <label for="numero" class="form-label small">Número</label>
    <input type="text" class="form-control {{ bootstrap_isInputInvalid('numero', $errors) }}" id="numero" name="numero" value="{{ old('numero', $consolidado->numero) }}" required>
    @include('@.bootstrap.invalid-input-message', ['name' => 'numero'])
</div>

<div class="mb-3">
    <label for="tarimas" class="form-label small">Tarimas</label>
    <input type="number" class="form-control {{ bootstrap_isInputInvalid('tarimas', $errors) }}" id="tarimas" name="tarimas" value="{{ old('tarimas', $consolidado->tarimas) ?? 1 }}" step="1" min="1" required>
    @include('@.bootstrap.invalid-input-message', ['name' => 'tarimas'])
</div>

<div class="mb-3">
    <label for="notas" class="form-label small">Notas</label>
    <textarea name="notas" id="notas" cols="30" rows="5" class="form-control {{ bootstrap_isInputInvalid('notas', $errors) }}">{{ old('notas', $consolidado->notas) }}</textarea>
    @include('@.bootstrap.invalid-input-message', ['name' => 'notas'])
</div>

@if( $consolidado->isReal() )
<div class="mb-3">
    <label for="select-status" class="form-label small">Status</label>
    <select name="status" id="select-status" class="form-select {{ bootstrap_isInputInvalid('status', $errors) }}">
        @foreach($all_status as $status => $attrs )
        <option value="{{ $status }}" {{ toggleSelected($status, old('status', $consolidado->status)) }}>{{ ucfirst($status) }} - {{ $attrs['descripcion'] }}</option>
        @endforeach
    </select>
    @include('@.bootstrap.invalid-input-message', ['name' => 'status'])
</div>
@endif
<br>
