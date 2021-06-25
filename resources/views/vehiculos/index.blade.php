@extends('app')
@section('content')

@component('@.subnavs.importacion')
    @slot('active', 2)
@endcomponent

@component('@.bootstrap.page-header', [
    'title' => 'Vehículos',
    'counter' => $vehiculos->count(),
])
    @slot('options')
    <a href="{{ route('vehiculos.create') }}" class="btn btn-sm btn-primary">
        <span class="d-block d-md-none fw-bold">+</span>
        <span class="d-none d-md-block">Nuevo vehículo</span>
    </a>
    @endslot
@endcomponent

@component('@.bootstrap.card')
    @slot('body')
    @component('@.bootstrap.table')
        @slot('thead', ['Alias','Descripción'])
        @slot('tbody')
            @foreach($vehiculos as $vehiculo)
            <tr>
                <td>{{ $vehiculo->alias }}</td>
                <td>{{ $vehiculo->descripcion }}</td>
                <td class="text-nowrap">
                    <a href="{{ route('vehiculos.show', $vehiculo) }}" class="btn btn-sm btn-outline-primary">
                        {!! $svg->eye !!}
                    </a>
                    <a href="{{ route('vehiculos.edit', $vehiculo) }}" class="btn btn-sm btn-outline-warning">
                        {!! $svg->pencil !!}
                    </a>
                </td>
            </tr>
            @endforeach
        @endslot
    @endcomponent
    @endslot

@endcomponent
<br>

@endsection
