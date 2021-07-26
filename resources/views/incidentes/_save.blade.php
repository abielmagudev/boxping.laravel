@csrf
<div class="mb-3">
    <label for="text-nombre" class="form-label small">Nombre</label>
    <input id="text-nombre" name="nombre" value="{{ old('nombre', $incidente->nombre) }}" type="text" class="form-control" required>
</div>
<div class="mb-3">
    <label for="textarea-descripcion" class="form-label small">Descripción</label>
    <textarea id="textarea-descripcion" name="descripcion" rows="5" class="form-control">{{ old('descripcion', $incidente->descripcion) }}</textarea>
</div>
