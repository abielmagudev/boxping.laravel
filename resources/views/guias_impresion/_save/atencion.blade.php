<div class="alert alert-warning">
    <p class="alert-heading fw-bold">ATENCION!</p>
    <div class="form-check form-switch mb-2">
        <input class="form-check-input" type="checkbox" role="switch" id="resetearSwitchCheckChecked" name="resetear" value="1">
        <label class="form-check-label" for="resetearSwitchCheckChecked">Resetear el contador de intentos de impresion a cero. <small class="fw-bold">({{ $guia->intentos_impresion }} intentos de impresión actualmente)</small></label>
    </div>
    <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" role="switch" id="desactivarSwitchCheckChecked" name="desactivar" value="0" <?= $guia->isActivada() ? '' : 'checked' ?>>
        <label class="form-check-label" for="desactivarSwitchCheckChecked">Desactivar temporalmente esta guía para evitar impresiones.</label>
    </div>
</div>
<br>
