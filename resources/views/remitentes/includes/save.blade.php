@csrf
<div class="form-group">
    <label for="read-entrada" class="small">Entrada</label>
    <div class="alert alert-secondary" id="read-entrada">{{ $entrada->numero }}</div>
</div>
<div class="form-group">
    <label for="input-nombre" class="small">Nombre</label>
    <input type="text" class="form-control" id="input-nombre" name="nombre" value="{{ old('nombre', $remitente->nombre) }}" required>
</div>
<div class="row">
    <div class="col-sm col-sm-8 form-group">
        <label for="input-direccion" class="small">Dirección</label>
        <input type="text" class="form-control" id="input-direccion" name="direccion" value="{{ old('direccion', $remitente->direccion) }}" required>
    </div>
    <div class="col-sm form-group">
        <label for="input-codigo-postal" class="small">Código postal</label>
        <input type="text" class="form-control" id="input-codigo-postal" name="codigo_postal" value="{{ old('codigo_postal', $remitente->codigo_postal) }}" placeholder="Opcional">
    </div>
</div>
<div class="row">
    <div class="col-sm form-group">
        <label for="input-ciudad" class="small">Ciudad</label>
        <input type="text" class="form-control" id="input-ciudad" name="ciudad" value="{{ old('ciudad', $remitente->ciudad) }}" required>
    </div>
    <div class="col-sm form-group">
        <label for="input-estado" class="small">Estado</label>
        <input type="text" class="form-control" id="input-estado" name="estado" value="{{ old('estado', $remitente->estado) }}" required>
    </div>
    <div class="col-sm form-group">
        <label for="input-pais" class="small">Pais</label>
        <input type="text" class="form-control" id="input-pais" name="pais" value="{{ old('pais', $remitente->pais) }}" required>
    </div>
</div>
<div class="form-group">
    <label for="input-telefono" class="small">Teléfono</label>
    <input type="text" class="form-control" id="input-telefono" name="telefono" value="{{ old('telefono', $remitente->telefono) }}" placeholder="Opcional">
</div>
<input type="hidden" name="entrada" value="{{ $entrada->id }}">
<br>
