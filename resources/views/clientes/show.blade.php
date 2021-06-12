@extends('app')
@section('content')

@component('@.bootstrap.header', [
    'title' => "{$cliente->nombre} ({$cliente->alias})",
    'pretitle' => 'Cliente',
    'goback' => route('clientes.index'),
])
    @slot('options')
    <a href="{{ route('clientes.edit', $cliente) }}" class="btn btn-sm btn-warning">
        <span class="d-block d-md-none">{!! $svg->pencil_fill !!}</span>
        <span class="d-none d-md-block">Editar</span>
    </a>
    @endslot
@endcomponent

<div class="row">
    <!-- Column informacion -->
    <div class="col-sm">
    @component('@.bootstrap.card')
        @slot('header', 'Información')
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
        <p>
            <small class="d-block text-muted">Notas</small>
            <span>{{ $cliente->notas }}</span>
        </p>
        @endslot
    @endcomponent
    </div>

    <!-- Column graficas -->
    <div class="col-sm">
        @component('@.bootstrap.card')
            @slot('header', 'Contadores')
            @slot('body')
            <div class="row align-items-center text-center">
                <div class="col">
                    <p class="small mb-1">CONSOLIDADOS</p>
                    <a class="display-6 text-decoration-none" href="#!">{{ $cliente->consolidados->count() }}</a>
                </div>
                <div class="col">
                    <p class="small mb-1">ENTRADAS</p>
                    <a class="display-6 text-decoration-none" href="#!">{{ $entradas->count() }}</a>
                </div>
            </div>
            @endslot
        @endcomponent
    </div>
</div>
<br>

@component('@.bootstrap.card')
    @slot('header', 'Entradas recientes')
    @slot('body')
    @component('@.partials.table-entradas', [
        'entradas' => $entradas,
    ])
    @endcomponent
    @endslot
@endcomponent

@endsection
