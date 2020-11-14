@csrf
<div class="form-group">
    <label for="input-alias">
        <small>Alias</small>
    </label>
    <input type="text" class="form-control" id="input-alias" name="alias" value="{{ old('alias', $vehiculo->alias) }}" required>
</div>
<div class="form-group">
    <label for="textarea-descripcion">
        <small>Descripción</small>
    </label>
    <textarea id="textarea-descripcion" cols="30" rows="5" class="form-control" name="descripcion">{{ old('descripcion', $vehiculo->descripcion) }}</textarea>
</div>
