@csrf
<div class="mb-3">
    <label for="text-titulo" class="form-label small">Título</label>
    <input id="text-titulo" name="titulo" value="{{ old('titulo', $incidente->titulo) }}" type="text" class="form-control" required>
</div>
<div class="mb-3">
    <label for="textarea-descripcion" class="form-label small">Descripción</label>
    <textarea id="textarea-descripcion" name="descripcion" rows="5" class="form-control">{{ old('descripcion', $incidente->descripcion) }}</textarea>
</div>
