@csrf
<div class="form-group">
    <label for="input-nombre">
        <small>Nombre</small>
    </label>
    <input type="text" class="form-control" id="input-nombre" name="nombre" value="{{ old('nombre', $conductor->nombre) }}" required>
</div>
