@csrf
<div class="form-group">
    <label for="input-nombre" class="small">Nombre</label>
    <input type="text" class="form-control" id="input-nombre" name="nombre" value="{{ old('nombre', $reempacador->nombre) }}">
</div>
<div class="form-group">
    <label for="input-clave" class="small">Clave</label>
    <input type="text" class="form-control" placeholder="{{ $reempacador->id ? 'Mantener la misma clave, ignorar este campo' : '' }}" id="input-clave" name="clave" {{ $reempacador->id ?: 'required' }}>
    <small class="text-muted">Recomendación: Mínimo de 4 digitos</small>
</div>
