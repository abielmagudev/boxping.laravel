@csrf
<div class="form-group">
    <label for="input-nombre">
        <small>Nombre</small>
    </label>
    <input name="nombre" value="{{ old('nombre', $zona->nombre) }}" type="text" id="input-nombre" class="form-control" required>
</div>
<br>