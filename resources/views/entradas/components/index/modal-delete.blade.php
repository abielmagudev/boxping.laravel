<?php

$component = (object) [
    'modal_content_id' => 'modalDeleteMultipleContent',
    'modal_id' => 'modalDeleteMultiple',
];

?>

@component('@.bootstrap.modal-trigger', [
    'modal_id' => $component->modal_id,
    'classes' => 'dropdown-item trigger-count-checked-entradas',
])
    <span>{!! $graffiti->design('trash')->svg() !!}</span>
    <span class='align-middle ms-1'>Eliminar</span>
@endcomponent

@push('modals')
    @component('@.bootstrap.modal', [
        'id' => $component->modal_id,
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
        <div id='<?= $component->modal_content_id ?>'>
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
