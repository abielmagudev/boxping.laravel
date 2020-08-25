@csrf
<div class="form-group">
    <label for="input-nombre" class="small">Nombre</label>
    <input name="nombre" value="{{ old('nombre', $medidor->nombre) }}" id="input-nombre" type="text" class="form-control" required>
</div>
<div class="form-group">
    <label for="textarea-descripcion" class="small">Descripción</label>
    <textarea name="descripcion" id="textarea-descripcion" cols="30" rows="5" class="form-control">{{ old('descripcion', $medidor->descripcion) }}</textarea>
</div>
<br>