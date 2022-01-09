<?php

$dropdown_all_items = [
    'create',
    'delete',
    'filter',
    'printing',
    'update',
];

$dropdown_settings = (object) [
    'items' => isset($dropdown['except']) && is_array($dropdown['except']) ? array_diff($dropdown_all_items, $dropdown['except']) : $dropdown_all_items,
    'routes' => [
        'create' => isset($dropdown['routes']['create']) && is_string($dropdown['routes']['create']) ? $dropdown['routes']['create'] : route('entradas.create'),
    ],
];

?>

<div class="dropdown ms-1">
    <button class="btn btn-sm btn-outline-primary dropdown-toggle-arrowless" type="button" id="dropdownEntradasTrigger" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
        {!! $graffiti->design('three-dots-vertical')->svg() !!}
    </button>
    <ul class="dropdown-menu border-0 shadow" aria-labelledby="dropdownEntradasTrigger">
        
        @if( in_array('create', $dropdown_settings->items) )      
        <!-- Crear nueva entrada -->
        <li>
            <a href="<?= $dropdown_settings->routes['create'] ?>" class="dropdown-item">
                <span>{!! $graffiti->design('plus-lg')->svg() !!}</span>
                <span class="align-middle ms-1">Nueva</span>
            </a>
        </li>
        @endif

        @if( in_array('filter', $dropdown_settings->items) )  
        <!-- Filtrar entradas  -->
        <li>
            @include('entradas.components.modal-filter.trigger', [
                'classes' => 'dropdown-item',
                'text' => $graffiti->design('funnel')->svg() . "<span class='align-middle ms-1'>Filtrar</span>",
            ])
        </li>
        @endif

        <li>
            <div class="dropdown-divider"></div>
        </li>

        @if( in_array('printing', $dropdown_settings->items) )      
        <!-- Imprimir entradas -->
        <li class="dropstart">
            <a href="#" class="dropdown-item dropdown-toggle-arrowless" id="dropdownGuiasImpresionTrigger" data-bs-toggle="dropdown" aria-expanded="false">
                <span>{!! $graffiti->design('printer')->svg() !!}</span>
                <span class="align-middle ms-1">Imprimir</span>
            </a>
            <ul class="dropdown-menu border-0 shadow" aria-labelledby="dropdownGuiasImpresionTrigger">
                <li>
                    <button class="dropdown-item" type="button" data-action="<?= route('entradas.imprimir.multiple') ?>">Información</button>
                </li>
                <li>
                    <div class="dropdown-divider"></div>
                </li>

                @if( $guias_impresion->count() )          
                <li>
                    <small class="dropdown-header">Guías de impresión</small>
                </li>
                @endif

                @foreach($guias_impresion as $guia)
                <li>
                    <button class="dropdown-item" type="button" data-action="<?= route('entradas.imprimir.multiple', $guia) ?>">{{ $guia->nombre }}</button>
                </li>
                @endforeach
            </ul>
        </li>
        @endif

        @if( in_array('update', $dropdown_settings->items) )      
        <!-- Actualizar entradas -->
        <li>
            <button class="dropdown-item" type="button" data-action="#update">
                <span>{!! $graffiti->design('file-arrow-up')->svg() !!}</span>
                <span class="align-middle ms-1">Actualizar</span>
            </button>
        </li>
        @endif

        @if( in_array('delete', $dropdown_settings->items) )      
        <!-- Eliminar entradas -->
        <li>
            <button class="dropdown-item" type="button" data-action="#delete">
                <span>{!! $graffiti->design('trash')->svg() !!}</span>
                <span class="align-middle ms-1">Eliminar</span>
            </button>
        </li>
        @endif
    </ul>
</div>
