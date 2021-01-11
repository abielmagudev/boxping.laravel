@csrf
<div class="form-group">
    <label for="text-titulo">Título</label>
    <input id="text-titulo" name="titulo" value="{{ old('titulo', $incidente->titulo) }}" type="text" class="form-control" required>
</div>
<div class="form-group">
    <label for="textarea-">Descripción</label>
    <textarea id="textarea-descripcion" name="descripcion" rows="5" class="form-control">{{ old('descripcion', $incidente->descripcion) }}</textarea>
</div>
