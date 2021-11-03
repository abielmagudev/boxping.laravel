@csrf
<div class="row">
    <div class="col-sm col-sm-8 mb-3">
        <label for="input-nombre" class="form-label small">Nombre</label>
        <input id="input-nombre" class="form-control {{ bootstrap_isInputInvalid('nombre', $errors) }}" type="text"  name="nombre" value="{{ old('nombre', $cliente->nombre) }}" required>
        @include('@.bootstrap.invalid-input-message', ['name' => 'nombre'])
    </div>
    <div class="col-sm mb-3">
        <label for="input-alias" class="form-label small">Alias</label>
        <input name="alias" type="text" class="form-control {{ bootstrap_isInputInvalid('alias', $errors) }}" id="input-alias" value="{{ old('alias', $cliente->alias) }}" required>
        @include('@.bootstrap.invalid-input-message', ['name' => 'alias'])
    </div>
</div>
<div class="mb-3">
    <label for="input-contacto" class="form-label small">Contacto</label>
    <input name="contacto" type="text" class="form-control {{ bootstrap_isInputInvalid('contacto', $errors) }}" id="input-contacto" value="{{ old('contacto', $cliente->contacto) }}" required>
    @include('@.bootstrap.invalid-input-message', ['name' => 'contacto'])
</div>
<div class="row">
    <div class="col-md mb-3">
        <label for="input-telefono" class="form-label small">Teléfono</label>
        <input name="telefono" type="text" class="form-control {{ bootstrap_isInputInvalid('telefono', $errors) }}" id="input-telefono" value="{{ old('telefono', $cliente->telefono) }}" required>
        @include('@.bootstrap.invalid-input-message', ['name' => 'telefono'])
    </div>
    <div class="col-md mb-3">
        <label for="input-corre_electronico" class="form-label small">Correo electrónico</label>
        <input name="correo_electronico" type="email" class="form-control {{ bootstrap_isInputInvalid('correo_electronico', $errors) }}" id="input-corre_electronico" value="{{ old('correo_electronico', $cliente->correo_electronico) }}" required>   
        @include('@.bootstrap.invalid-input-message', ['name' => 'correo_electronico'])
    </div>
</div>
<div class="mb-3">
    <label for="input-direccion" class="form-label small">Dirección</label>
    <input name="direccion" type="text" class="form-control {{ bootstrap_isInputInvalid('direccion', $errors) }}" id="input-direccion" value="{{ old('direccion', $cliente->direccion) }}" required>   
    @include('@.bootstrap.invalid-input-message', ['name' => 'direccion'])
</div>
<div class="row">
    <div class="col-sm mb-3">
        <label for="input-ciudad" class="form-label small">Ciudad</label>
        <input name="ciudad" type="text" class="form-control {{ bootstrap_isInputInvalid('ciudad', $errors) }}" id="input-ciudad" value="{{ old('ciudad', $cliente->ciudad) }}" required>   
        @include('@.bootstrap.invalid-input-message', ['name' => 'ciudad'])
    </div>
    <div class="col-sm mb-3">
        <label for="input-estado" class="form-label small">Estado</label>
        <input name="estado" type="text" class="form-control {{ bootstrap_isInputInvalid('estado', $errors) }}" id="input-estado" value="{{ old('estado', $cliente->estado) }}" required>   
        @include('@.bootstrap.invalid-input-message', ['name' => 'estado'])
    </div>
    <div class="col-sm mb-3">
        <label for="input-pais" class="form-label small">Pais</label>
        <input name="pais" type="text" class="form-control {{ bootstrap_isInputInvalid('pais', $errors) }}" id="input-pais" value="{{ old('pais', $cliente->pais) }}" required>   
        @include('@.bootstrap.invalid-input-message', ['name' => 'pais'])
    </div>
</div>
<div class="mb-3">
    <label for="textarea-notas" class="form-label small">Notas</label>
    <textarea name="notas" id="textarea-notas" cols="30" rows="5" class="form-control {{ bootstrap_isInputInvalid('notas', $errors) }}">{{ old('notas', $cliente->notas) }}</textarea>
    @include('@.bootstrap.invalid-input-message', ['name' => 'notas'])
</div>
