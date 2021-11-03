@extends('app')
@section('content')

@component('@.bootstrap.card', [
    'title' => 'Clientes',
    'counter' => $clientes->count(),
])
    @slot('options')
    <a href="{{ route('clientes.create') }}" class="btn btn-sm btn-primary">
        <b>+</b>
    </a>
    @endslot

    @component('@.bootstrap.table', [
        'thead' => ['Nombre','Alias','Contacto','Correo electrónico','Teléfono'],
    ])
        @foreach($clientes as $cliente)
        <tr>
            <td class="text-nowrap">{{ $cliente->nombre }}</td>
            <td>{{ $cliente->alias }}</td>
            <td class="text-nowrap">{{ $cliente->contacto }}</td>
            <td class="text-nowrap">{{ $cliente->correo_electronico }}</td>
            <td class="text-nowrap">{{ $cliente->telefono }}</td>
            <td class="text-end">
                <a href="{{ route('clientes.show', $cliente) }}" class="btn btn-sm btn-outline-primary">
                    @include('@.bootstrap.icon', ['icon' => 'eye'])
                </a>
            </td>
        </tr>
        @endforeach
    @endcomponent
@endcomponent
<br>

@endsection
