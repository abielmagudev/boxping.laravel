@csrf
<div class="mb-3">
    <label for="input-alias" class="form-label small">Alias</label>
    <input type="text" class="form-control" id="input-alias" name="alias" value="{{ old('alias', $vehiculo->alias) }}" required>
</div>
<div class="mb-3">
    <label for="textarea-descripcion" class="form-label small">Descripción</label>
    <textarea id="textarea-descripcion" cols="30" rows="5" class="form-control" name="descripcion">{{ old('descripcion', $vehiculo->descripcion) }}</textarea>
</div>
