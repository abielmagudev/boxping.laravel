<?php
$settings = (object) array(
    'trigger_text'  => isset($trigger_text) ? $trigger_text : 'Eliminar',
    'trigger_align' => isset($trigger_align) ? $trigger_align : 'text-left',
    'button_text'   => isset($button_text) ? $button_text : 'Si, confirmo eliminar', 
    'action'        => $action,
    'warning'       => $warning,
);
?>

<p class="{{ $settings->trigger_align }}">
    <button data-toggle="modal" data-target="#confirmDeleteModal" class="btn btn-link btn-sm text-danger p-0">{{ $settings->trigger_text }}</button>
</p>

<div class="modal fade" id="confirmDeleteModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <p class="modal-title" id="confirmDeleteModalLabel"><b>ATENCION</b></p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ $settings->action }}" method="post" class="text-center">
                    @method('delete')
                    @csrf
                    <br>
                    <div class="lead">{{ $settings->warning }}</div>
                    <br>
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-outline-danger border-0">{{ $settings->button_text }}</button>
                </form>
            </div>
            <div class="modal-footer d-none">
            </div>
        </div>
    </div>
</div>