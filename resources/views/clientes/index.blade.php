@extends('app')
@section('content')

@component('components.card', [
    'header_title' => 'Clientes',
    'header_title_badge' => $clientes->count(),
])
    @slot('header_options')
    <a href="{{ route('clientes.create') }}" class="btn btn-sm btn-outline-primary">Nuevo cliente</a>
    @endslot

    @slot('body')
    @component('components.table', [
        'thead' => ['Nombre','Alias','Contacto','Correo electrónico','Teléfono',''],
    ])
        @slot('tbody')
        @foreach($clientes as $cliente)
        <tr>
            <td class="text-nowrap">{{ $cliente->nombre }}</td>
            <td>{{ $cliente->alias }}</td>
            <td class="text-nowrap">{{ $cliente->contacto }}</td>
            <td class="text-nowrap">{{ $cliente->correo_electronico }}</td>
            <td class="text-nowrap">{{ $cliente->telefono }}</td>
            <td class="text-end">
                <a href="{{ route('clientes.show', $cliente) }}" class="btn btn-sm btn-primary">
                    {!! $icons->eye !!}
                </a>
            </td>
        </tr>
        @endforeach
        @endslot
    @endcomponent
    @endslot
@endcomponent

@endsection
