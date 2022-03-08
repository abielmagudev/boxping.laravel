<?php

$component = (object) [
    'routes' => [
        'create' => $routes['create'] ?? route('entradas.create')
    ],
];

?>

<div class="btn-group" role="group">
    {{-- Filtrar --}}
    @include('entradas.components.index.modal-filter')

    {{-- Guias de impresión --}}
    <div class="btn-group btn-group-sm" role="group" id="wrapperDropdownImprimirMultiple">
        <button id="buttonDropdownImprimirMultiple" type="button" class="btn btn-sm btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <span>{!! $graffiti->design('printer')->svg() !!}</span>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownImprimirMultiple">
            <li>
                <button type="button" class="dropdown-item" data-entradas-form-action="<?= route('entradas.imprimir.multiple') ?>">Información</button>
            </li>
    
            @if( $guias_impresion->count() )
            <li>
                <hr class="dropdown-divider">
                <h6 class="dropdown-header">Guías de impresión</h6>
            </li>
    
            @foreach($guias_impresion as $guia)
            <li>
                <button type="button" class="dropdown-item" data-entradas-form-action="<?= route('entradas.imprimir.multiple', $guia) ?>">{{ $guia->nombre }}</button>
            </li>
            @endforeach
    
            @endif
        </ul>
    </div>

    {{-- Acciones --}}
    <div class="btn-group btn-group-sm" role="group" id="wrapperDropdownActions">
        <button id="buttonDropdownActions" type="button" class="btn btn-sm btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <span>{!! $graffiti->design('list')->svg() !!}</span>
        </button>
        <ul class="dropdown-menu" aria-labelledby="buttonDropdownActions">
            <li>
                <a class="dropdown-item" href="<?= $component->routes['create'] ?>">
                    <span>{!! $graffiti->design('plus-lg')->svg() !!}</span>
                    <span class="align-middle ms-1">Nueva</span>
                </a>
            </li>
            <li>
                @include('entradas.components.index.modal-edit')
            </li>
            <li>
                @include('entradas.components.index.modal-delete')
            </li>
        </ul>
    </div>

</div>
