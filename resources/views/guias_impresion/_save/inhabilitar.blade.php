<div class="alert alert-warning">
    <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" role="switch" id="inhabilitarSwitchCheckChecked" name="inhabilitar" value="0" <?= $guia->isDisponible() ?: 'checked' ?>>
        <label class="form-check-label" for="inhabilitarSwitchCheckChecked">Inhabilitar esta guía temporalmente para evitar impresiones.</label>
    </div>
</div>
<br>
