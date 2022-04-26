@csrf
<div class="mb-3">
    <label for="inputNombre" class="form-label small">Nombre</label>
    <input type="text" name="nombre" id="inputNombre" class="form-control {{ bootstrap_isInputInvalid('nombre', $errors) }}" value="{{ old('nombre', $user->name) }}" required>
    @include('@.bootstrap.invalid-input-message', ['name' => 'nombre'])
</div>
<div class="mb-3">
    <label for="inputEmail" class="form-label small">Email</label>
    <input type="text" name="email" id="inputEmail" class="form-control {{ bootstrap_isInputInvalid('email', $errors) }}" value="{{ old('email', $user->email) }}" required>
    @include('@.bootstrap.invalid-input-message', ['name' => 'email'])
</div>
<div class="mb-3">
    <label for="inputClave" class="form-label small">Clave</label>
    <input type="password" name="clave" id="inputClave" class="form-control {{ bootstrap_isInputInvalid('clave', $errors) }}">
    @include('@.bootstrap.invalid-input-message', ['name' => 'clave'])
</div>
<div class="mb-3">
    <label for="inputConfirmarClave" class="form-label small">Confirmar clave</label>
    <input type="password" name="clave_confirmation" id="inputConfirmarClave" class="form-control {{ bootstrap_isInputInvalid('clave', $errors) }}">
    @include('@.bootstrap.invalid-input-message', ['name' => 'clave', 'rule' => 'confirmed'])
</div>
