<?php 

$settings = (object) [
    'has_route' => isset($route) && is_string($route),
    'content' => $content ?? null,
    'route' => $route ?? null,
    'text' => $text ?? 'Eliminar',
    'modal_id' => 'modalConfirmDelete',
];

$modal_delete_id = 'modalDelete';

?>

@if( $settings->has_route )

    <!-- Modal confirm delete trigger -->
    <div class="text-end">
        @component('@.bootstrap.modal-trigger', [
            'is_link' => true,
            'classes' => 'link-danger',
            'modal' => $settings->modal_id,
            'text' => $settings->text,
        ])
        @endcomponent
    </div>

    <!-- Modal confirm delete -->
    @component('@.bootstrap.modal')
        @slot('id', $settings->modal_id)
        @slot('body')
        <div class="text-center"> 
            <p class="text-danger">{!! $svg->exclamation_circle_fill !!}</p>
            <form action="{{ $settings->route }}" method="post" id="form-confirm-delete">
                @csrf
                @method('delete')
                {!! $settings->content !!}
                <br>
                <button type="submit" class="btn btn-outline-danger">Si, eliminar</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            </form>
        </div>
        <br>
        @endslot
    @endcomponent

@endif
