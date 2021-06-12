@extends('app')
@section('content')

@component('@.bootstrap.header', [
    'title' => 'Clientes',
    'counter' => $clientes->count(),
])
    @slot('options')
    <a href="{{ route('clientes.create') }}" class="btn btn-sm btn-primary">
        <span class="d-block d-md-none fw-bold">+</span>
        <span class="d-none d-md-block">Nuevo cliente</span>
    </a>
    @endslot
@endcomponent

@component('@.bootstrap.card')
    @slot('body')
    @component('@.bootstrap.table', [
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
                <a href="{{ route('clientes.show', $cliente) }}" class="btn btn-sm btn-outline-primary">
                    {!! $svg->eye !!}
                </a>
            </td>
        </tr>
        @endforeach
        @endslot
    @endcomponent
    @endslot
@endcomponent

@endsection
