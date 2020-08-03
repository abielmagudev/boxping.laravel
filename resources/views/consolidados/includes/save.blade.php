@csrf
<div class="form-group">
    <label for="cliente">Cliente</label>
    <select name="cliente" id="cliente" class="form-control" required>
        <option disabled selected label="..."></option>
        <?php $consolido_cliente_id    = is_object($consolidado->cliente) ? $consolidado->cliente->id : null ?>
        @foreach($clientes as $cliente)
        <option value="{{ $cliente->id }}" {{ $cliente->id == old('cliente', $consolido_cliente_id) ? 'selected' : '' }}>{{ $cliente->nombre }}</option>
        @endforeach
    </select>
    @error('cliente')
    <span class="invalid-feedback d-block" role="alert">Selecciona el cliente</span>
    @enderror
</div>

<div class="form-group">
    <label for="numero">Número</label>
    <input type="text" class="form-control" id="numero" name="numero" value="{{ old('numero', $consolidado->numero) }}" required>
    @error('numero')
    <span class="invalid-feedback d-block" role="alert">Escribe el numero de consolidado</span>
    @enderror
</div>

<div class="form-group">
    <label for="tarimas">Tarimas</label>
    <input type="number" class="form-control" id="tarimas" name="tarimas" value="{{ old('tarimas', $consolidado->tarimas) ?? 1 }}" step="1" min="1" required>
    @error('tarimas')
    <span class="invalid-feedback d-block" role="alert">Escribe la cantidad de tarimas</span>
    @enderror
</div>

<div class="form-group">
    <label for="tarimas">Notas</label>
    <textarea name="notas" id="notas" cols="30" rows="5" class="form-control"></textarea>
</div>
<br>

@if(! is_null($consolidado->cerrado) )
<div class="form-group">
    <input type="checkbox" class="d-inline-block mr-1" id="checkbox-cerrado" name="cerrado" value="1" {{ $consolidado->cerrado ? 'checked' : '' }}>
    <label for="checkbox-cerrado">
        <span class="text-danger font-weight-bold">CERRAR CONSOLIDADO</span>
        <span class=""> - No sera posible agregar más entradas.</span>
    </label>
</div>
@endif
