<?php
$settings = (object) array(
    'route'   => isset($route) && is_string($route) ? $route : null,
    'content' => isset($content) ? $content : null,
);
?>
<div class="modal fade" id="confirmDeleteModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ $settings->route }}" method="post" class="text-center">
                    @method('delete')
                    @csrf
                    {{ $settings->content }}
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-outline-danger btn-sm border-0">Si, confirmo eliminar</button>
                </form>
            </div>
            <div class="modal-footer d-none">
            </div>
        </div>
    </div>
</div>