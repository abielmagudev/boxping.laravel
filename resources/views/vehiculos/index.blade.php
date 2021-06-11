@extends('app')
@section('content')

@component('@.subnavs.importacion')
    @slot('active', 2)
@endcomponent

@component('components.card')
    @slot('header_title')
    <span>Vehículos</span>
    <span class="badge bg-secondary rounded-pill">{{ $vehiculos->count() }}</span>
    @endslot
    @slot('header_options')
    <a href="{{ route('vehiculos.create') }}" class="btn btn-sm btn-outline-primary">Nuevo vehículo</a>
    @endslot
    @slot('body')
    @component('components.table')
        @slot('hover', true)
        @slot('thead', ['Alias','Descripción',''])
        @slot('tbody')
            @foreach($vehiculos as $vehiculo)
            <tr>
                <td style="min-width:288px">{{ $vehiculo->alias }}</td>
                <td style="min-width:288px">{{ $vehiculo->descripcion }}</td>
                <td class="text-nowrap">
                    <a href="{{ route('vehiculos.show', $vehiculo) }}" class="btn btn-sm btn-primary">
                        @component('components.icon', ['icon' => 'eye'])
                        @endcomponent
                    </a>
                    <a href="{{ route('vehiculos.edit', $vehiculo) }}" class="btn btn-sm btn-warning">
                        @component('components.icon', ['icon' => 'pencil'])
                        @endcomponent
                    </a>
                </td>
            </tr>
            @endforeach
        @endslot
    @endcomponent
    @endslot
@endcomponent
@endsection
