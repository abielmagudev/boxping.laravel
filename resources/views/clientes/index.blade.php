@extends('app')
@section('content')
<div class="card">
    @component('components.card-header-with-link', [
        'tooltip' => 'Nuevo cliente',
        'link' => route('clientes.create'),
    ])
        @slot('title')
        <span>Clientes</span>
        <span class="badge badge-primary">{{ $clientes->count() }}</span>
        @endslot

        @slot('content')
        <b>+</b>
        @endslot
    @endcomponent
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="small">
                    <tr>
                        <th>Nombre</th>
                        <th>Alias</th>
                        <th>Contacto</th>
                        <th>Correo electrónico</th>
                        <th>Teléfono</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clientes as $cliente)
                    <tr>
                        <td>
                            <a href="{{ route('clientes.show', $cliente) }}">{{ $cliente->nombre }}</a>
                        </td>
                        <td>{{ $cliente->alias }}</td>
                        <td>{{ $cliente->contacto }}</td>
                        <td>{{ $cliente->correo_electronico }}</td>
                        <td>{{ $cliente->telefono }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
