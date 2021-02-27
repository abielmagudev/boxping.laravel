@csrf
<div class="row">
    <div class="col-sm col-sm-9 mb-3">
        <label for="input-nombre" class="form-label small">Nombre</label>
        <input name="nombre" type="text" class="form-control" id="input-nombre" value="{{ old('nombre', $cliente->nombre) }}">
    </div>
    <div class="col-sm mb-3">
        <label for="input-alias" class="form-label small">Alias</label>
        <input name="alias" type="text" class="form-control" id="input-alias" value="{{ old('alias', $cliente->alias) }}">
    </div>
</div>
<div class="mb-3">
    <label for="input-contacto" class="form-label small">Contacto</label>
    <input name="contacto" type="text" class="form-control" id="input-contacto" value="{{ old('contacto', $cliente->contacto) }}">
</div>
<div class="row">
    <div class="col-md mb-3">
        <label for="input-telefono" class="form-label small">Teléfono</label>
        <input name="telefono" type="text" class="form-control" id="input-telefono" value="{{ old('telefono', $cliente->telefono) }}">
    </div>
    <div class="col-md mb-3">
        <label for="input-corre_electronico" class="form-label small">Correo electrónico</label>
        <input name="correo_electronico" type="email" class="form-control" id="input-corre_electronico" value="{{ old('correo_electronico', $cliente->correo_electronico) }}">   
    </div>
</div>
<div class="mb-3">
    <label for="input-direccion" class="form-label small">Dirección</label>
    <input name="direccion" type="text" class="form-control" id="input-direccion" value="{{ old('direccion', $cliente->direccion) }}">   
</div>
<div class="row">
    <div class="col-sm mb-3">
        <label for="input-ciudad" class="form-label small">Ciudad</label>
        <input name="ciudad" type="text" class="form-control" id="input-ciudad" value="{{ old('ciudad', $cliente->ciudad) }}">   
    </div>
    <div class="col-sm mb-3">
        <label for="input-estado" class="form-label small">Estado</label>
        <input name="estado" type="text" class="form-control" id="input-estado" value="{{ old('estado', $cliente->estado) }}">   
    </div>
    <div class="col-sm mb-3">
        <label for="input-pais" class="form-label small">Pais</label>
        <input name="pais" type="text" class="form-control" id="input-pais" value="{{ old('pais', $cliente->pais) }}">   
    </div>
</div>
<div class="mb-3">
    <label for="textarea-notas" class="form-label small">Notas</label>
    <textarea name="notas" id="textarea-notas" cols="30" rows="5" class="form-control">{{ old('notas', $cliente->notas) }}</textarea>
</div>
