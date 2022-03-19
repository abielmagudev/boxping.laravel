<?php

$modal = (object) [
    'trigger' => [
        'text' => $button['text'] ?? 'Eliminar',
        'classes' => $button['classes'] ?? 'link-danger',
    ],
    'form' => [
        'id' => 'formConfirmDelete',
        'content' => $form ?? null,
        'route' => $route,
    ],
    'destroy' => isset($destroy) && is_bool($destroy) ? $destroy : false, 
    'id' => 'modalDeleteConfirm',
    'message' => $slot ?? '',
];

?>

@component('@.bootstrap.modal-trigger', [
    'classes' => $modal->trigger['classes'],
    'modal_id' => $modal->id,
    'button' => false
])
    <span>{{ $modal->trigger['text'] }}</span>
@endcomponent

@push('modals')
    @component('@.bootstrap.modal', [
        'id' => $modal->id,
        'header' => [
            'title' => 'ATENCION',
            'classes' => 'bg-danger text-white'
        ],
        'footer' => [
            'button_close' => [
                'text' => 'Cancelar'
            ],
        ],
    ])
        @slot('body_content')
        <div class="text-center mt-4 px-4">
            <div>{{ $modal->message }}</div>
            <form action="<?= $modal->form['route'] ?>" method="post" id="<?= $modal->form['id'] ?>">
                @csrf
                @method('delete')
                {{ $modal->form['content'] }}
            </form>

            @if( $modal->destroy )
            <p class="text-danger text-uppercase small mt-5">Eliminación permanente, no es recuperable</p>
            @endif
        </div>

        @endslot

        @slot('footer_content')
        <button class="btn btn-outline-danger" type="submit" form="<?= $modal->form['id'] ?>">Eliminar</button>
        @endslot
    @endcomponent
@endpush
