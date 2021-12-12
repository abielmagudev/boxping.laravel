<div class="mb-3">
    <label for="inputFilterMostrar" class="form-label small">Por página</label>
    <input type="number" class="form-control" step="1" min="1" max="100" name="mostrar" value="<?= request('mostrar', 25) ?>" id="inputFilterMostrar" required>
</div>
<div class="mb-3">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="mostrar_completo" value="1" id="radioFilterMostrarCompleto">
        <label class="form-check-label" for="radioFilterMostrarCompleto">
            <span class="">Mostrar filtrado en una sola página.</span>
            <small class="d-block text-danger"><b>*</b> Puede tardar varios segundos para mostrarse.</small>
        </label>
    </div>
</div>
