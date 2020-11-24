@csrf
<div class="form-group">
    <label for="input-nombre" class="small">Nombre</label>
    <input type="text" class="form-control" id="input-nombre" name="nombre" value="{{ old('nombre', $codigor->nombre) }}" required>
</div>
<div class="form-group">
    <label for="textarea-descripcion" class="small">Descripción</label>
    <textarea cols="30" rows="5" class="form-control" id="textarea-descripcion" name="descripcion">{{ old('descripcion', $codigor->descripcion) }}</textarea>
</div>
