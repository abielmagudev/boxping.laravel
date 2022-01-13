<div class="alert alert-warning">
    <p class="alert-heading fw-bold">Atención</p>
    <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" role="switch" id="desactivarSwitchCheckChecked" name="desactivar" value="0" <?= $guia->isActivada() ?: 'checked' ?>>
        <label class="form-check-label" for="desactivarSwitchCheckChecked">Desactivar temporalmente esta guía para evitar impresiones.</label>
    </div>
</div>
<br>
