@csrf
<div class="mb-3">
    <label for="input-nombre" class="form-label small">Nombre</label>
    <input type="text" class="form-control" id="input-nombre" name="nombre" value="{{ old('nombre', $remitente->nombre) }}" required>
</div>
<div class="row">
    <div class="col-sm col-sm-8 mb-3">
        <label for="input-direccion" class="form-label small">Dirección</label>
        <input type="text" class="form-control" id="input-direccion" name="direccion" value="{{ old('direccion', $remitente->direccion) }}" required>
    </div>
    <div class="col-sm mb-3">
        <label for="input-codigo-postal" class="form-label small">Código postal</label>
        <input type="text" class="form-control" id="input-codigo-postal" name="codigo_postal" value="{{ old('codigo_postal', $remitente->codigo_postal) }}" placeholder="Opcional">
    </div>
</div>
<div class="row">
    <div class="col-sm mb-3">
        <label for="input-ciudad" class="form-label small">Ciudad</label>
        <input type="text" class="form-control" id="input-ciudad" name="ciudad" value="{{ old('ciudad', $remitente->ciudad) }}" placeholder="Opcional">
    </div>
    <div class="col-sm mb-3">
        <label for="input-estado" class="form-label small">Estado</label>
        <input type="text" class="form-control" id="input-estado" name="estado" value="{{ old('estado', $remitente->estado) }}" placeholder="Opcional">
    </div>
    <div class="col-sm mb-3">
        <label for="input-pais" class="form-label small">Pais</label>
        <input type="text" class="form-control" id="input-pais" name="pais" value="{{ old('pais', $remitente->pais) }}" required>
    </div>
</div>
<div class="mb-3">
    <label for="input-telefono" class="form-label small">Teléfono</label>
    <input type="text" class="form-control" id="input-telefono" name="telefono" value="{{ old('telefono', $remitente->telefono) }}" placeholder="Opcional">
</div>
<br>
