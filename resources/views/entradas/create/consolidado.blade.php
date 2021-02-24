<div class="mb-3">
    <label for="read-consolidado-numero" class="form-label small">Número de consolidado</label>
    <div class="form-control bg-light" id="read-consolidado-numero">{{ $consolidado->numero }}</div>
    <input name="consolidado" value="{{ $consolidado->id }}" type="hidden">
</div>
<div class="mb-1">
    <label for="read-cliente" class="form-label small">Cliente</label>
    <div class="form-control bg-light">{{ $consolidado->cliente->nombre }} ({{ $consolidado->cliente->alias }})</div>
</div>
