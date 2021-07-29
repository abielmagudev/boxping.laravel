@csrf
<div class="mb-3">
    <label for="input-nombre" class="form-label small">Nombre</label>
    <input type="text" class="form-control" id="input-nombre" name="nombre" value="{{ old('nombre', $destinatario->nombre) }}" required>
</div>
<div class="row">
    <div class="col-sm col-sm-8 mb-3">
        <label for="input-direccion" class="form-label small">Dirección</label>
        <input type="text" class="form-control" id="input-direccion" name="direccion" value="{{ old('direccion', $destinatario->direccion) }}" required>
    </div>
    <div class="col-sm mb-3">
        <label for="input-postal" class="form-label small">Postal</label>
        <input type="text" class="form-control" id="input-postal" name="postal" value="{{ old('postal', $destinatario->postal) }}" required>
    </div>
</div>
<div class="row">
    <div class="col-sm mb-3">
        <label for="input-ciudad" class="form-label small">Ciudad</label>
        <input type="text" class="form-control" id="input-ciudad" name="ciudad" value="{{ old('ciudad', $destinatario->ciudad) }}" required>
    </div>
    <div class="col-sm mb-3">
        <label for="input-estado" class="form-label small">Estado</label>
        <input type="text" class="form-control" id="input-estado" name="estado" value="{{ old('estado', $destinatario->estado) }}" required>
    </div>
    <div class="col-sm mb-3">
        <label for="input-pais" class="form-label small">Pais</label>
        <input type="text" class="form-control" id="input-pais" name="pais" value="{{ old('pais', $destinatario->pais) }}" required>
    </div>
</div>
<div class="mb-3">
    <label for="input-referencias" class="form-label small">Referencias</label>
    <textarea name="referencias" id="input-referencias" class="form-control" cols="30" rows="5">{{ old('referencias', $destinatario->referencias) }}</textarea>
</div>
<div class="mb-3">
    <label for="input-telefono" class="form-label small">Teléfono</label>
    <input type="text" class="form-control" id="input-telefono" name="telefono" value="{{ old('telefono', $destinatario->telefono) }}" required>
</div>
<div class="mb-3">
    <label for="input-notas" class="form-label small">Notas</label>
    <textarea name="notas" id="input-notas" class="form-control" cols="30" rows="5">{{ old('notas', $destinatario->notas) }}</textarea>
</div>
<br>
