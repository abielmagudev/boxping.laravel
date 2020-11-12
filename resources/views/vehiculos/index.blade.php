@extends('app')
@section('content')
<div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">
        <div>
            <span>Vehículos</span>
            <span class="badge badge-primary">{{ $vehiculos->count() }}</span>
        </div>
        <div class="text-right">
            <a href="{{ route('vehiculos.create') }}" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="left" title="Nuevo vehiculo">
                <b>+</b>
            </a>
        </div>
    </div>
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
