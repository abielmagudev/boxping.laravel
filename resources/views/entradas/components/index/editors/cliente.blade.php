<div class="mb-3 d-none">
    <label for="select-cliente" class="form-label small d-none">Selecciona cliente</label>
    <select name="cliente" id="select-cliente" class="form-select border-warning is-editor-multiple" form="<?= $efc->id ?>">
        <option disabled selected label="Selecciona cliente..."></option>
        @foreach($clientes as $cliente)
        <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
        @endforeach
    </select>
</div>
