@extends('app')
@section('content')

@include('@.bootstrap.page-header', [
    'pretitle' => 'Cliente',
    'title' => $cliente->nombre,
])

<div class="row">
    <!-- Column Informacion Cliente -->
    <div class="col-sm col-sm-4">
    @component('@.bootstrap.card', [
        'title' => 'Información',
    ])
        <p>
            <small class="d-block text-muted">Alias</small>
            <span>{{ $cliente->alias }}</span>
        </p>
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
        <hr class="text-secondary">
        <p class="m-0">
            <small class="d-block text-muted">Totales</small>
        </p>
        @component('@.bootstrap.table')
            <tr>
                <td class="ps-1">Consolidados</td>
                <td class="text-end">
                    <a class="link-primary text-decoration-none" href="{{ route('consolidados.index') }}">{{ $cliente->consolidados->count() }}</a>
                </td>
            </tr>
            <tr>
                <td class="ps-1">Entradas</td>
                <td class="text-end">
                    <a class="link-primary text-decoration-none" href="{{ route('entradas.index') }}">{{ $entradas->count() }}</a>
                </td>
            </tr>
        @endcomponent

    @endcomponent
    </div>

    <!-- Column Entradas -->
    <div class="col-sm">
        @component('@.bootstrap.card', [
            'title' => 'Entradas recientes',
        ])
            @include('entradas.components.index.table', [
                'entradas' => $entradas,
                'cliente' => $cliente,
                'checkboxes' => false,
            ])
        @endcomponent
    </div>
</div>
<br>

@endsection
