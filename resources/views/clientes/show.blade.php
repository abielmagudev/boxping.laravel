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
    <div class="col-sm">
    @component('components.card', [
        'header_title' => 'Información',
    ])
        @slot('body')
        <p>
            <span>{{ $cliente->contacto }}</span>
            <small class="d-block text-muted">Contacto</small>
        </p>
        <p>
            <span>{{ $cliente->telefono }}</span>
            <small class="d-block text-muted">Teléfono</small>
        </p>
        <p>
            <span>{{ $cliente->telefono }}</span>
            <small class="d-block text-muted">Correo electrónico</small>
        </p>
        <p>
            <span>{{ $cliente->direccion }}</span>
            <span class="d-block">{{ $cliente->localidad }}</span>
            <small class="d-block text-muted">Localización</small>
        </p>
        @endslot
    @endcomponent
    </div>

    <!-- Column right -->
    <div class="col-sm d-sm-flex flex-column">
        @component('components.card', [
            'classes' => 'flex-grow-1',
            'header_title' => 'Notas',
        ])
            @slot('body')
            <p>{{ $cliente->notas ?? 'Ninguna' }}</p>
            @endslot
        @endcomponent

        @component('components.card', [
            'classes' => 'flex-grow-1',
            'header_title' => 'Resúmen',
        ])
            @slot('body')
            <div class="d-flex justify-content-around align-items-center text-center">
                <div>
                    <p class="small">CONSOLIDADOS</p>
                    <p class="display-6">
                        <a href="#!" class="text-decoration-none">{{ $cliente->consolidados->count() }}</a>
                    </p>
                </div>
                <div>
                    <p class="small">ENTRADAS</p>
                    <p class="display-6">
                        <a href="#!" class="text-decoration-none">{{ $entradas->count() }}</a>
                    </p>
                </div>
            </div>
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
