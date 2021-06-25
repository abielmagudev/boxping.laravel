@csrf
<div class="mb-3">
    <label for="input-nombre" class="form-label small">Nombre</label>
    <input name="nombre" value="{{ old('nombre', $transportadora->nombre) }}" type="text" class="form-control" required>
</div>
<div class="mb-3">
    <label for="input-web" class="form-label small">Sitio web</label>
    <input name="web" value="{{ old('web', $transportadora->web) }}" id="input-web" type="text" class="form-control" placeholder="Ej. https://dominio.com">
</div>
<div class="mb-3">
    <label for="input-telefono" class="form-label small">Teléfono</label>
    <input name="telefono" value="{{ old('telefono', $transportadora->telefono) }}" id="input-telefono" type="text" class="form-control">
</div>
<div class="mb-3">
    <label for="textarea-notas" class="form-label small">Notas</label>
    <textarea name="notas" id="textarea-notas" cols="30" rows="5" class="form-control">{{ old('notas', $transportadora->notas) }}</textarea>
</div>
