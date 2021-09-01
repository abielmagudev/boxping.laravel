<?php $route_back_from_print = isset($entrada) ? route('entradas.show', $entrada) : url()->previous() ?>
<div class="d-print-none sticky-top mb-3 py-1 bg-secondary text-center">
    <a href="{{ $route_back_from_print }}" class="btn btn-secondary">Regresar</a>
</div>
