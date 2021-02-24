<?php

$aligns = [
    'center' => 'text-center',
    'right'  => 'text-end',
];

$modal = (object) array(
    'body' => isset($body) ? $body : false,
    'route' => isset($route) && is_string($route) ? $route : false,
    'trigger_align' => isset($trigger_align, $aligns[$trigger_align]) ? $aligns[$trigger_align] : 'text-start',
    'trigger_display' => isset($trigger_display) && $trigger_display == 'inline' ? 'd-inline-block' : 'd-block',
    'trigger_text' => isset($trigger_text) && is_string($trigger_text) ? $trigger_text : 'Eliminar',
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

@component('components.modal', [
    'id' => 'modalConfirmDelete',
    'centered' => true,
])
    @slot('body_classes', 'text-center')
    @slot('body')
    <p class="display-1 text-danger">
        <i class="bi bi-exclamation-triangle-fill"></i>
    </p>
    <p class="display-6 mb-5">¿Deseas continuar?</p>
    <form action="{{ $modal->route }}" method="post" id="form-confirm-delete">
        @csrf
        @method('delete')
        @if( ! is_bool($modal->body) )
        <div class='text-muted mb-4'>{!! $modal->body !!}</div>
        @endif
    </form>
    @endslot

    @slot('footer_classes', 'bg-light justify-content-center')
    @slot('footer')
    <button type="submit" class="btn btn-danger" form="form-confirm-delete">Si, eliminar</button>
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
    @endslot

@endcomponent

@endif
