<?php

$modal = (object) [
    'id' => 'modalDeleteMultiple',
    'content_id' => 'modalDeleteMultipleContent',
];

?>

@component('@.bootstrap.modal-trigger', [
    'modal_id' => $modal->id,
    'classes' => 'dropdown-item trigger-count-checked-entradas',
])
    <span>{!! $graffiti->design('trash')->svg() !!}</span>
    <span class='align-middle ms-1'>Eliminar</span>
@endcomponent

@push('modals')
    @component('@.bootstrap.modal', [
        'id' => $modal->id,
        'header_settings' => [
            'title' => 'ATENCION',
            'classes' => 'bg-danger text-black-50'
        ],
        'footer_settings' => [
            'close' => [
                'text' => 'Cancelar'
            ],
        ],
    ])
        @slot('body')
        <div id='<?= $modal->content_id ?>' class="px-4 mt-4 text-center">
            <p class="text-muted lead">Se eliminarán procesos, etapas, salidas <br> y un total de entradas</p>
            <p class="h3">
                <span class="show-count-checked-entradas">0</span>
            </p>
            <p class="text-danger text-uppercase small mt-5">Eliminación permanente, no es recuperable</p>
        </div>
        @endslot

        @slot('footer')
        <button class="btn btn-outline-danger" type="button" data-entradas-form-action="<?= route('entradas.destroy.multiple') ?>" data-entradas-form-verb="delete">Eliminar</button>
        @endslot
    @endcomponent
@endpush
