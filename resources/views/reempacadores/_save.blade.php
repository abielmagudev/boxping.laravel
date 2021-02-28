@csrf
<div class="mb-3">
    <label for="input-nombre" class="form-label small">Nombre</label>
    <input type="text" class="form-control" id="input-nombre" name="nombre" value="{{ old('nombre', $reempacador->nombre) }}">
</div>
<div class="mb-3">
    <label for="input-clave" class="form-label small">Clave</label>
    <input type="text" class="form-control" placeholder="{{ $reempacador->id ? 'Ignorar para mantener misma clave' : '' }}" id="input-clave" name="clave" {{ $reempacador->id ?: 'required' }}>
    <small class="text-muted">Recomendación: Mínimo de 4 digitos</small>
</div>
