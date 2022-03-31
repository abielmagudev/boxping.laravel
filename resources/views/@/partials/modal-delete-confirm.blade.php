<?php

$modal = (object) [
    'trigger' => [
        'text' => $trigger['text'] ?? 'Eliminar',
        'classes' => $trigger['classes'] ?? 'link-danger',
    ],
    'form' => [
        'id' => 'modalDeleteConfirmForm',
        'inputs' => $form ?? null,
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
        'header_settings' => [
            'title' => 'ATENCION',
            'classes' => 'bg-danger text-white',
        ],
        'footer_settings' => [
            'close' => [
                'text' => 'Cancelar'
            ],
        ],
    ])
        @slot('body')
        <div class="">
            <div id="modalDeleteConfirmMessage">
                {!! $modal->message !!}
            </div>

            <form action="<?= $modal->form['route'] ?>" method="post" id="<?= $modal->form['id'] ?>">
                @csrf
                @method('delete')
                {{ $modal->form['inputs'] }}
            </form>

            @if( $modal->destroy )
            <br>
            <p class="text-center text-danger text-uppercase small m-0">Eliminación permanente, no es recuperable</p>
            @endif
        </div>

        @endslot

        @slot('footer')
        <button class="btn btn-outline-danger" type="submit" form="<?= $modal->form['id'] ?>">Eliminar</button>
        @endslot
    @endcomponent
@endpush
