@csrf
<div class="form-group">
    <label for="input-nombre" class="small">Nombre</label>
    <input type="text" class="form-control" id="input-nombre" name="nombre" value="{{ old('nombre', $destinatario->nombre) }}" required>
</div>
<div class="form-row">
    <div class="col-sm col-sm-8 form-group">
        <label for="input-direccion" class="small">Direccion</label>
        <input type="text" class="form-control" id="input-direccion" name="direccion" value="{{ old('direccion', $destinatario->direccion) }}" required>
    </div>
    <div class="col-sm form-group">
        <label for="input-codigo-postal" class="small">Código postal</label>
        <input type="text" class="form-control" id="input-codigo-postal" name="codigo_postal" value="{{ old('codigo_postal', $destinatario->codigo_postal) }}" required>
    </div>
</div>
<div class="form-row">
    <div class="col-sm form-group">
        <label for="input-ciudad" class="small">Ciudad</label>
        <input type="text" class="form-control" id="input-ciudad" name="ciudad" value="{{ old('ciudad', $destinatario->ciudad) }}" required>
    </div>
    <div class="col-sm form-group">
        <label for="input-estado" class="small">Estado</label>
        <input type="text" class="form-control" id="input-estado" name="estado" value="{{ old('estado', $destinatario->estado) }}" required>
    </div>
    <div class="col-sm form-group">
        <label for="input-pais" class="small">Pais</label>
        <input type="text" class="form-control" id="input-pais" name="pais" value="{{ old('pais', $destinatario->pais) }}" required>
    </div>
</div>
<div class="form-group">
    <label for="input-referencias" class="small">Referencias</label>
    <textarea name="referencias" id="input-referencias" class="form-control" cols="30" rows="5">{{ old('referencias', $destinatario->referencias) }}</textarea>
</div>
<div class="form-group">
    <label for="input-telefono" class="small">Telefono</label>
    <input type="text" class="form-control" id="input-telefono" name="telefono" value="{{ old('telefono', $destinatario->telefono) }}" required>
</div>

@if( is_integer($destinatario->id) )
<br>
<div class="form-check">
  <input class="form-check-input" type="checkbox" name="verificado" value="1" id="checkbox-verificado" value="1" {{ old('verificado', $destinatario->verificado_at) ? 'checked' : '' }}>
  <label class="form-check-label" for="checkbox-verificado">
    <b class="mr-1">Verificado.</b>
    <span>La informacion del destinatario ha sido confirmada y existente.</span>
  </label>
</div>
@endif

<input type="hidden" name="entrada" value="{{ $entrada->id }}">
<br>
