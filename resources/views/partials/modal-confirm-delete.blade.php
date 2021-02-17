<?php

$aligns = [
    'center' => 'text-center',
    'right'  => 'text-end',
];

$modal = (object) array(
    'content' => isset($content) ? $content : false,
    'route'   => isset($route) && is_string($route) ? $route : false,
    'trigger_align'   => isset($trigger_align, $aligns[$trigger_align]) ? $aligns[$trigger_align] : 'text-start',
    'trigger_display' => isset($trigger_display) && $trigger_display == 'inline' ? 'd-inline-block' : 'd-block',
    'trigger_text'    => isset($trigger_text) && is_string($trigger_text) ? $trigger_text : 'Eliminar',
);

?>

@if( ! is_bool($modal->route) )
<!-- Button trigger modal -->
<div class="{{ $modal->trigger_display }} {{ $modal->trigger_align }}">
    <button
        class='btn btn-sm btn-outline-danger border-0'
        data-bs-toggle='modal'
        data-bs-target='#modalConfirmDelete'
        type='button'>
        {{ $modal->trigger_text }}
    </button>
</div>

<!-- Modal -->
<div class="modal fade" id="modalConfirmDelete" tabindex="-1" aria-labelledby="modalConfirmDeleteLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header border-0">
                <p class="modal-title lead d-none" id="modalConfirmDeleteLabel">
                    <i class="bi bi-exclamation-triangle"></i>
                    <span class="align-middle ms-2">Confirmar</span>
                </p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <p class="display-1 text-danger">
                    <i class="bi bi-exclamation-triangle-fill"></i>
                </p>
                <p class="display-6 mb-5">¿Deseas continuar?</p>
                <form action="{{ $modal->route }}" method="post" id="form-confirm-delete">
                    @csrf
                    @method('delete')
                    @if( ! is_bool($modal->content) )
                    <div class='text-muted lead mb-4'><?= $modal->content ?></div>
                    @endif
                </form>
            </div>
            <div class="modal-footer justify-content-center bg-light">
                <button type="submit" class="btn btn-danger" form="form-confirm-delete">Si, eliminar</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

@else
<p class="text-muted">...ruta de eliminacion?</p>

@endif