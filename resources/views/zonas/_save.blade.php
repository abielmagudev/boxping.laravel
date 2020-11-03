@csrf
<div class="form-group">
    <label for="input-nombre">
        <small>Nombre</small>
    </label>
    <input name="nombre" value="{{ old('nombre', $zona->nombre) }}" type="text" id="input-nombre" class="form-control" required>
</div>
<div class="form-group">
    <label for="textarea-descripcion">
        <small>Descripción</small>
    </label>
    <textarea name="descripcion" id="textarea-descripcion" cols="30" rows="5" class="form-control">{{ old('descripcion', $zona->descripcion) }}</textarea>
</div>
<br>
