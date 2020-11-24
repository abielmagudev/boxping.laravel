@extends('app')
@section('content')
<div class="card">
    @component('components.card-header-with-link', [
        'tooltip' => 'Nuevo vehículo',
        'link' => route('vehiculos.create'),
    ])
        @slot('title')
        <span>Vehículos</span>
        <span class="badge badge-primary">{{ $vehiculos->count() }}</span>
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
                        <th>Alias</th>
                        <th>Descripción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($vehiculos as $vehiculo)
                    <tr>
                        <td class="text-nowrap align-middle">
                            <a href="{{ route('vehiculos.show', $vehiculo) }}">{{ $vehiculo->alias }}</a>
                        </td>
                        <td class="align-middle">{{ $vehiculo->descripcion }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
