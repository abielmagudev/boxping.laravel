<div class="alert alert-warning">
    <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" role="switch" id="desactivarSwitchCheckChecked" name="desactivar" value="1" <?= $guia->isActivada() ?: 'checked' ?>>
        <label class="form-check-label" for="desactivarSwitchCheckChecked">Desactivar temporalmente para evitar impresiones de esta guía.</label>
    </div>
</div>
<br>
