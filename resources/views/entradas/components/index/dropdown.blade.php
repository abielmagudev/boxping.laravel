<?php

$dropdown_all_items = ['crear', 'filtrar', 'imprimir', 'eliminar'];

$dropdown_items = isset($dropdown['except']) && is_array($dropdown['except']) 
                ? array_diff($dropdown_all_items, $dropdown['except'])
                : $dropdown_all_items;

?>

@if( count($dropdown_items) ) 
<div class="dropdown ms-1">
    <button class="btn btn-sm btn-primary dropdown-toggle-arrowless" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
        {!! $graffiti->design('three-dots-vertical')->svg() !!}
    </button>
    <ul class="dropdown-menu border-0 shadow" aria-labelledby="dropdownMenuButton1">
        
        @if( in_array('crear', $dropdown_items) )      
        <!-- Crear nueva entrada -->
        <li>
            <a href="{{ route('entradas.create') }}" class="dropdown-item">
                <span>{!! $graffiti->design('plus-lg')->svg() !!}</span>
                <span class="align-middle ms-1">Nueva</span>
            </a>
        </li>
        @endif

        @if( in_array('filtrar', $dropdown_items) )  
        <!-- Filtrar entradas  -->
        <li>
            @include('entradas.components.modal-filter.trigger', [
                'classes' => 'dropdown-item',
                'text' => $graffiti->design('funnel')->svg() . "<span class='align-middle ms-1'>Filtrar</span>",
            ])
        </li>
        @endif

        @if( in_array('imprimir', $dropdown_items) || in_array('eliminar', $dropdown_items) )      
        <li>
            <hr class="dropdown-divider">
        </li>
        @endif

        @if( in_array('imprimir', $dropdown_items) )      
        <!-- Imprimir entradas -->
        <li>
            <a class="dropdown-item" href="#">
                <span>{!! $graffiti->design('printer')->svg() !!}</span>
                <span class="align-middle ms-1">Imprimir</span>
            </a>
        </li>
        @endif

        @if( in_array('eliminar', $dropdown_items) )      
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
@endif