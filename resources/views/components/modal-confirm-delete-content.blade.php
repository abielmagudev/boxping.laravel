<?php

$settings = (object) [
    'route' => isset($route) && is_string($route) ? $route : '#!',
    'content' => isset($content) ? $content : null,
];

?>

<div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <p class="modal-title" id="confirmDeleteModalLabel">
                    <b>CONFIRMAR</b>
                </p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ $settings->route }}" method="post" id="form-confirm_delete">
                    @method('delete')
                    @csrf
                    <br>

                    @if( ! is_null($settings->content) )
                    {{ $settings->content }}

                    @else
                    <p class="lead text-center">Deseas continuar con el proceso de eliminación?...</p>
                    
                    @endif
                </form>
                <br>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-outline-danger border-0" form="form-confirm_delete">Si, eliminar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
