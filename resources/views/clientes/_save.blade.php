@csrf
<div class="row">
    <div class="col-sm col-sm-9 form-group">
        <label for="input-nombre" class="small">Nombre</label>
        <input name="nombre" type="text" class="form-control" id="input-nombre" value="{{ old('nombre', $cliente->nombre) }}">
    </div>
    <div class="col-sm form-group">
        <label for="input-alias" class="small">Alias</label>
        <input name="alias" type="text" class="form-control" id="input-alias" value="{{ old('alias', $cliente->alias) }}">
    </div>
</div>
<div class="form-group">
    <label for="input-contacto" class="small">Contacto</label>
    <input name="contacto" type="text" class="form-control" id="input-contacto" value="{{ old('contacto', $cliente->contacto) }}">
</div>
<div class="form-group">
    <label for="input-telefono" class="small">Teléfono</label>
    <input name="telefono" type="text" class="form-control" id="input-telefono" value="{{ old('telefono', $cliente->telefono) }}">
</div>
<div class="form-group">
    <label for="input-corre_electronico" class="small">Correo electrónico</label>
    <input name="correo_electronico" type="email" class="form-control" id="input-corre_electronico" value="{{ old('correo_electronico', $cliente->correo_electronico) }}">   
</div>
<div class="form-group">
    <label for="input-direccion" class="small">Dirección</label>
    <input name="direccion" type="text" class="form-control" id="input-direccion" value="{{ old('direccion', $cliente->direccion) }}">   
</div>
<div class="row">
    <div class="col-sm form-group">
        <label for="input-ciudad" class="small">Ciudad</label>
        <input name="ciudad" type="text" class="form-control" id="input-ciudad" value="{{ old('ciudad', $cliente->ciudad) }}">   
    </div>
    <div class="col-sm form-group">
        <label for="input-estado" class="small">Estado</label>
        <input name="estado" type="text" class="form-control" id="input-estado" value="{{ old('estado', $cliente->estado) }}">   
    </div>
    <div class="col-sm form-group">
        <label for="input-pais" class="small">Pais</label>
        <input name="pais" type="text" class="form-control" id="input-pais" value="{{ old('pais', $cliente->pais) }}">   
    </div>
</div>
<div class="form-group">
    <label for="textarea-notas" class="small">Notas</label>
    <textarea name="notas" id="textarea-notas" cols="30" rows="5" class="form-control">{{ old('notas', $cliente->notas) }}</textarea>
</div>
