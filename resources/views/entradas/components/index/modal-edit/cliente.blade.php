<div class="alert alert-warning mb-3 d-none">
    <label for="select-cliente" class="form-label small">Cliente</label>
    <select name="cliente" id="select-cliente" class="form-select border-warning is-editor-multiple" form="<?= $entradas_form_config->id ?>" autocomplete="off">
        <option disabled selected label="..."></option>
        @foreach($clientes as $cliente)
        <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
        @endforeach
    </select>
</div>
