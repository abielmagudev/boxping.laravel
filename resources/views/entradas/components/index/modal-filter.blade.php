<?php

$component = (object) [
    'form_id' => 'formFiltrarEntradas',
    'modal_id' => 'modalFiltrarEntradas',
    'route' => isset($routes['filter']) ? $routes['filter'] : url()->current(),
    'filters' => [
        'numero',
        'ambitos',
        'clientes',
        'salidas',
        'etapas',
        'tiempos',
        'muestreos',
    ],
    'except' => isset($except['filters']) && is_array($except['filters']) ? $except['filters'] : [],
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
            @foreach($component->filters as $filter)
            @includeUnless(in_array($filter, $component->except),"entradas.components.index.filters.{$filter}")
            @endforeach
            <input type="hidden" name="filter_token" value="<?= csrf_token() ?>">
        </form>
        @endslot
        
        @slot('footer_content')
        <button type="submit" class="btn btn-primary" form="<?= $component->form_id ?>">Filtrar entradas</button>
        @endslot
    @endcomponent
@endpush
