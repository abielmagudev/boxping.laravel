<div class="text-right">
    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#entradaObservacionesModal">
        <span class="mr-1">Observaciones</span>
        <span class="badge badge-light rounded-pill">{{ $entrada->observaciones->count() }}</span>
    </button>
    <button type="button" class="btn btn-primary btn-sm">
        <span>Imprimir</span>
    </button>
</div>
<br>