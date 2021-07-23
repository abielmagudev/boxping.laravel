<div class="mb-3">
    <label for="input-numero" class="form-label small">Número</label>
    <input name="numero" value="{{ old('numero', $entrada->numero) }}" id="input-numero" type="text" class="form-control" autofocus required>
</div>
<div class="mb-3">
    <label for="textarea-contenido" class="form-label small">Contenido</label>
    <textarea name="contenido" id="textarea-contenido" cols="30" rows="5" class="form-control">{{ old('contenido', $entrada->contenido) }}</textarea>
</div>
