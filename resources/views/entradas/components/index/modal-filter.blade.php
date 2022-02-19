<?php

$component = (object) [
    'form_id' => 'formFiltrarEntradas',
    'modal_id' => 'modalFiltrarEntradas',
    'route' => isset($route) && is_string($route) ? $route : url()->current(),
];

?>

@component('@.bootstrap.modal-trigger', [
    'classes' => 'btn btn-sm btn-outline-primary',
    'modal_id' => $component->modal_id,
])    
    {!! $graffiti->design('funnel')->svg() !!}
@endcomponent

@push('modals')
    @component('@.bootstrap.modal', [
        'id' => $component->modal_id,
        'header' => [
            'title' => 'Filtrar entradas',
        ],
        'footer' => [
            'classes' => 'bg-light',
            'button_close' => [
                'classes' => 'btn btn-outline-secondary',
                'text' => 'Cancelar'
            ],
        ],
    ])
        @slot('body_content')
        <form action="<?= $component->route ?>" id="<?= $component->form_id ?>" autocomplete="off">
            @include("entradas.components.index.modal-filter.all")
            <input type="hidden" name="filter_token" value="<?= csrf_token() ?>">
        </form>
        @endslot
        
        @slot('footer_content')
        <button type="submit" class="btn btn-primary" form="<?= $component->form_id ?>">Filtrar entradas</button>
        @endslot
    @endcomponent
@endpush
