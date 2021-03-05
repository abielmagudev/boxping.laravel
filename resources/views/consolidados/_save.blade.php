@csrf
<div class="mb-3">
    <label for="cliente" class="form-label small">Cliente</label>
    <select name="cliente" id="cliente" class="form-select" required>
        <option disabled selected label=""></option>
        @foreach($clientes as $cliente)
        <?php $selected = selectable( $cliente->id, old('cliente', $consolidado->cliente_id)) ?>
        <option value="{{ $cliente->id }}" {{ $selected }}>{{ $cliente->nombre }} ({{ $cliente->alias }})</option>
        @endforeach
    </select>
    @error('cliente')
    <span class="invalid-feedback d-block" role="alert">Selecciona el cliente</span>
    @enderror
</div>

<div class="mb-3">
    <label for="numero" class="form-label small">Número</label>
    <input type="text" class="form-control" id="numero" name="numero" value="{{ old('numero', $consolidado->numero) }}" required>
    @error('numero')
    <span class="invalid-feedback d-block" role="alert">Escribe el numero de consolidado</span>
    @enderror
</div>

<div class="mb-3">
    <label for="tarimas" class="form-label small">Tarimas</label>
    <input type="number" class="form-control" id="tarimas" name="tarimas" value="{{ old('tarimas', $consolidado->tarimas) ?? 1 }}" step="1" min="1" required>
    @error('tarimas')
    <span class="invalid-feedback d-block" role="alert">Escribe la cantidad de tarimas</span>
    @enderror
</div>

<div class="mb-3">
    <label for="notas" class="form-label small">Notas</label>
    <textarea name="notas" id="notas" cols="30" rows="5" class="form-control">{{ old('notas', $consolidado->notas) }}</textarea>
</div>

@if( ! is_null($consolidado->status) )
<div class="mb-3">
    <label for="select-status" class="form-label small">Status</label>
    <select name="status" id="select-status" class="form-select">
        @foreach( $config_consolidados->status as $status => $props )
        <option value="{{ $status }}" {{ $consolidado->status <> $status ?: 'selected' }}>{{ ucfirst($status) }} - {{ $config_consolidados->status[$status]['descripcion'] }}</option>
        @endforeach
    </select>
</div>
@endif
<br>