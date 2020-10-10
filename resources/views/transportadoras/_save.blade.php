@csrf
<div class="form-group">
    <label for="input-nombre">
        <small>Nombre</small>
    </label>
    <input name="nombre" value="{{ old('nombre', $transportadora->nombre) }}" type="text" class="form-control" required>
</div>
<div class="form-group">
    <label for="input-web">
        <small>Sitio web</small>
    </label>
    <input name="web" value="{{ old('web', $transportadora->web) }}" id="input-web" type="text" class="form-control" placeholder="Ejemplo: https://dominio.com">
</div>
<div class="form-group">
    <label for="input-telefono">
        <small>Teléfono</small>
    </label>
    <input name="telefono" value="{{ old('telefono', $transportadora->telefono) }}" id="input-telefono" type="text" class="form-control">
</div>
<div class="form-group">
    <label for="textarea-notas">
        <small>Notas</small>
    </label>
    <textarea name="notas" id="textarea-notas" cols="30" rows="5" class="form-control">{{ old('notas', $transportadora->notas) }}</textarea>
</div>
<br>
