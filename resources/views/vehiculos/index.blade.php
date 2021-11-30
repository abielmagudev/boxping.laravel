@extends('app')
@section('content')

@component('@.bootstrap.card', [
    'title' => 'Vehículos',
    'counter' => $vehiculos->count(),
])
    @slot('options')
    <a href="{{ route('vehiculos.create') }}" class="btn btn-sm btn-primary">
        <span class="fw-bold">+</span>
    </a>
    @endslot

    @component('@.bootstrap.table', [
        'thead' => ['Nombre','Descripción'],    
    ])
        @foreach($vehiculos as $vehiculo)
        <tr>
            <td>{{ $vehiculo->nombre }}</td>
            <td>{{ $vehiculo->descripcion }}</td>
            <td class="text-nowrap">
                <a href="{{ route('vehiculos.show', $vehiculo) }}" class="btn btn-sm btn-outline-primary">
                    {!! $graffiti->design('eye')->svg() !!}
                </a>
                <a href="{{ route('vehiculos.edit', $vehiculo) }}" class="btn btn-sm btn-outline-warning">
                    {!! $graffiti->design('pencil-fill')->svg() !!}
                </a>
            </td>
        </tr>
        @endforeach
    @endcomponent

@endcomponent
<br>

@endsection
