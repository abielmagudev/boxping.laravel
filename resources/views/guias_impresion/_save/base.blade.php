<div class="mb-3">
   <label for="input-nombre" class="form-label small">Nombre</label>
   <input type="text" class="form-control <?= bootstrap_isInputInvalid('nombre', $errors) ?>" id="input-nombre" name="nombre" value="<?= old('nombre', $guia->nombre) ?>" required>
   @include('@.bootstrap.invalid-input-message', ['name' => 'nombre'])
</div>
<div class="mb-3">
   <label for="input-descripcion" class="form-label small">Descripción</label>
   <input type="text" class="form-control <?= bootstrap_isInputInvalid('descripcion', $errors) ?>" id="input-descripcion" name="descripcion" value="<?= old('descripcion', $guia->descripcion) ?>" placeholder="Opcional">
   @include('@.bootstrap.invalid-input-message', ['name' => 'descripcion'])
</div>
<br>
