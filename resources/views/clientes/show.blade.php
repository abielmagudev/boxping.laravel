@extends('app')
@section('content')

@component('components.header', [
    'title' => $cliente->nombre,
    'subtitle' => 'Cliente'
])
    @slot('options')
    <a href="{{ route('clientes.edit', $cliente) }}" class="btn btn-sm btn-warning">Editar</a>
    @endslot
@endcomponent

<div class="row">

    <!-- Column left -->
    <div class="col-sm d-sm-flex flex-column">
    @component('components.card', [
        'classes' => 'flex-grow-1',
        'header_title' => 'Información',
    ])
        @slot('body')
        <p>
            <small class="d-block text-muted">Contacto</small>
            <span>{{ $cliente->contacto }}</span>
        </p>
        <p>
            <small class="d-block text-muted">Teléfono</small>
            <span>{{ $cliente->telefono }}</span>
        </p>
        <p>
            <small class="d-block text-muted">Correo electrónico</small>
            <span>{{ $cliente->correo_electronico }}</span>
        </p>
        <p>
            <small class="d-block text-muted">Localización</small>
            <span class="d-block">{{ $cliente->direccion }}</span>
            <span class="">{{ $cliente->localidad }}</span>
        </p>
        @endslot
    @endcomponent
    </div>

    <!-- Column right -->
    <div class="col-sm d-sm-flex flex-column">
        @component('components.card', [
            'classes' => 'flex-grow-1',
            'header_title' => 'Resúmen',
        ])
            @slot('body')
            <div class="d-flex justify-content-around align-items-center text-center">
                <div>
                    <p class="small mb-1">CONSOLIDADOS</p>
                    <p class="display-6">
                        <a href="#!" class="text-decoration-none">{{ $cliente->consolidados->count() }}</a>
                    </p>
                </div>
                <div>
                    <p class="small mb-1">ENTRADAS</p>
                    <p class="display-6">
                        <a href="#!" class="text-decoration-none">{{ $entradas->count() }}</a>
                    </p>
                </div>
            </div>
            @endslot
        @endcomponent
        @component('components.card', [
            'classes' => 'flex-grow-1',
            'header_title' => 'Notas',
            'body_classes' => '',
        ])
            @slot('body')
            <p>{{ $cliente->notas }}</p>
            @endslot
        @endcomponent
    </div>

</div>

@component('components.card', [
    'header_title' => 'Entradas',
    'header_title_badge' => $entradas->count(),
])
    @slot('body')
    @component('partials.table-summary-entradas', [
        'entradas' => $entradas,
    ])
    @endcomponent
    @endslot
@endcomponent

@endsection
