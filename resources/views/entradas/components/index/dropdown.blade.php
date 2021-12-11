<?php

$dropdown_all_items = [
    'create',
    'delete',
    'filtering',
    'printing',
];

$dropdown_settings = (object) [
    'items' => isset($dropdown['except']) && is_array($dropdown['except']) ? array_diff($dropdown_all_items, $dropdown['except']) : $dropdown_all_items,
    'route_create' => isset($consolidado) && is_a($consolidado, App\Consolidado::class) ? route('entradas.create', ['consolidado' => $consolidado->id]) : route('entradas.create'),
];

?>

<div class="dropdown ms-1">
    <button class="btn btn-sm btn-primary dropdown-toggle-arrowless" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
        {!! $graffiti->design('three-dots-vertical')->svg() !!}
    </button>
    <ul class="dropdown-menu border-0 shadow" aria-labelledby="dropdownMenuButton1">
        
        @if( in_array('create', $dropdown_settings->items) )      
        <!-- Crear nueva entrada -->
        <li>
            <a href="<?= $dropdown_settings->route_create ?>" class="dropdown-item">
                <span>{!! $graffiti->design('plus-lg')->svg() !!}</span>
                <span class="align-middle ms-1">Nueva</span>
            </a>
        </li>
        @endif

        @if( in_array('filtering', $dropdown_settings->items) )  
        <!-- Filtrar entradas  -->
        <li>
            @include('entradas.components.modal-filter.trigger', [
                'classes' => 'dropdown-item',
                'text' => $graffiti->design('funnel')->svg() . "<span class='align-middle ms-1'>Filtrar</span>",
            ])
        </li>
        @endif

        @if( in_array('printing', $dropdown_settings->items) || in_array('delete', $dropdown_settings->items) )      
        <li>
            <hr class="dropdown-divider">
        </li>
        @endif

        @if( in_array('printing', $dropdown_settings->items) )      
        <!-- Imprimir entradas -->
        <li>
            <a class="dropdown-item" href="#">
                <span>{!! $graffiti->design('printer')->svg() !!}</span>
                <span class="align-middle ms-1">Imprimir</span>
            </a>
        </li>
        @endif

        @if( in_array('delete', $dropdown_settings->items) )      
        <!-- Eliminar entradas -->
        <li>
            <a class="dropdown-item" href="#">
                <span>{!! $graffiti->design('trash')->svg() !!}</span>
                <span class="align-middle ms-1">Eliminar</span>
            </a>
        </li>
        @endif
    </ul>
</div>
