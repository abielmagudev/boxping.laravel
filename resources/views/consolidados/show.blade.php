<?php

$checkbox_prefix = 'checkbox-entrada-';
$checkbox_form = '';
$checker_id = 'checker-entradas';

?>

@extends('app')
@section('content')

@component('@.bootstrap.header')
    @slot('title', $consolidado->numero)
    @slot('pretitle', 'Consolidado')
    @slot('options')
    <a href="{{ route('consolidados.edit', $consolidado) }}" class="btn btn-sm btn-warning">
        <span class="d-inline-block d-md-none">{!! $icons->pencil !!}</span>
        <span class="d-none d-md-inline-block">Editar</span>
    </a>
    <a href="{{ route('printing.consolidado', $consolidado) }}" class="btn btn-sm btn-primary">
        <span class="d-block d-md-none">{!! $svg->printer !!}</span>
        <span class="d-none d-md-block">Imprimir</span>
    </a>
    @endslot
@endcomponent

<div class="row">
    <!-- Column informacion -->
    <div class="col-sm">
        @component('@.bootstrap.card')
            @slot('header', 'Información')
            @slot('body')
            @component('@.bootstrap.table', [
                'borderless' => true
            ])
                @slot('tbody')
                <tr class="text-capitalize">
                    <td class="text-muted small" style="width:1%">Status</td>
                    <td class="fw-bold" style="color:{{ $config_consolidados->status[$consolidado->status]['color'] }}">{{ ucfirst($consolidado->status) }}</td>
                </tr>
                <tr>
                    <td class="text-muted small">Cliente</td>
                    <td>{{ $consolidado->cliente_id ? "{$consolidado->cliente->nombre} ({$consolidado->cliente->alias})" : 'Ninguno' }}</td>
                </tr>
                <tr class="">
                    <td class="text-muted small">Tarimas</td>
                    <td>{{ $consolidado->tarimas }}</td>
                </tr>
                <tr class="">
                    <td class="text-muted small border-0">Notas</td>
                    <td class="border-0">{{ $consolidado->notas }}</td>
                </tr>
                @endslot
            @endcomponent
            @endslot
        @endcomponent
    </div>

    <!-- Column graficas -->
    <div class="col-sm"> 
        @component('@.bootstrap.card')
            @slot('header', 'Graficas')
            @slot('body')
            <p class="text-center">...</p>
            @endslot
        @endcomponent
    </div>
</div>
<br>

@component('@.bootstrap.card-headers')
    <!-- Slot headers  -->
    @slot('header_left')
    <span>Entradas</span>
    <span class="badge bg-dark text-white">{{ $consolidado->entradas->count() }}</span>
    @endslot

    @slot('header_right')

    @component('@.partials.modal-filter-entradas', [
        'route_results' => route('consolidados.show', [$consolidado]),
        'except' => ['ambito', 'cliente','muestreo'],
    ])
    @endcomponent

    <button class="btn btn-sm btn-primary" id="{{ $checker_id }}" type="button">
        <b>{!! $svg->list_checked !!}</b>
    </button>

    @component('@.partials.dropdown-sheets-printing')
    @endcomponent

    @if( $consolidado->status === 'abierto' ) 
    <a href="{{ route('entradas.create', ['consolidado' => $consolidado->id]) }}" class="btn btn-sm btn-primary">
        <span class="d-block d-md-none fw-bold">+</span>
        <span class="d-none d-md-block">Nueva entrada</span>
    </a>
    @endif

    @endslot
    <!-- Endslot headers  -->
    
    <!-- Slot body  -->
    @slot('body')
    @component('@.partials.table-entradas', [   
        'entradas' => $entradas,
        'checkbox_prefix' => $checkbox_prefix,
        'checkbox_form' => 'form-entradas-printing',
        'numero_consolidado' => $consolidado->numero,
    ])
    @endcomponent
    @endslot
    <!-- Endslot body  -->

@endcomponent
<br>

@component('@.partials.script-toggle-checkboxes', [
    'checkbox_prefix' => $checkbox_prefix,
    'checker_id' => $checker_id,
])
@endcomponent

@endsection
