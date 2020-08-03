<?php
$settings = (object) array(
    'route'   => isset($route) && is_string($route) ? $route : null,
    'content' => isset($content) ? $content : null,
    'button'  => isset($button) && is_string($button) ? $button : 'Si, confirmo eliminar', 
);
?>
<div class="modal fade" id="confirmDeleteModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <p class="modal-title" id="confirmDeleteModalLabel">ALERTA!</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ $settings->route }}" method="post" class="text-center">
                    @method('delete')
                    @csrf
                    <br>
                    <div class="lead">{{ $settings->content }}</div>
                    <br>
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-outline-danger border-0">{{ $settings->button }}</button>
                </form>
            </div>
            <div class="modal-footer d-none">
            </div>
        </div>
    </div>
</div>