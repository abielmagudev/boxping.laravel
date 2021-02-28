@csrf
<div class="mb-3">
    <label for="input-nombre" class="form-label small">Nombre</label>
    <input type="text" class="form-control" id="input-nombre" name="nombre" value="{{ old('nombre', $codigor->nombre) }}" required>
</div>
<div class="mb-3">
    <label for="textarea-descripcion" class="form-label small">Descripción</label>
    <textarea cols="30" rows="5" class="form-control" id="textarea-descripcion" name="descripcion">{{ old('descripcion', $codigor->descripcion) }}</textarea>
</div>
