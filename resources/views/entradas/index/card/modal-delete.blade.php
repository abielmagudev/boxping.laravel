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
        'header' => [
            'title' => 'Eliminar entradas',
            'classes' => 'bg-danger text-white'
        ],
        'footer' => [
            'button_close' => [
                'text' => 'Cancelar'
            ],
        ],
    ])
        @slot('body_content')
        <div id='<?= $modal->content_id ?>'>
            <div class="row my-3 px-5 align-items-center" >
                <div class="col-sm">
                    <div class="text-center text-danger">
                        {!! $graffiti->design('exclamation-octagon-fill', ['width' => 112, 'height' => 112])->svg() !!}
                    </div>
                </div>
                <div class="col-sm">
                    <div class="text-center text-secondary lead">
                        <p class="mb-0">Se eliminarán</p>
                        <p class="h4">
                            <span class="show-count-checked-entradas">0</span>
                            <span>entradas</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        @endslot

        @slot('footer_content')
        <button class="btn btn-outline-danger" type="button" data-entradas-form-action="<?= route('entradas.destroy.multiple') ?>" data-entradas-form-verb="delete">Eliminar</button>
        @endslot
    @endcomponent
@endpush
