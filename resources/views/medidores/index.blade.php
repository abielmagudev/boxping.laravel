@extends('app')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <span>Medidores</span>
                <span class="badge badge-primary">{{ $medidores->count() }}</span>
            </div>
            <div>
                <a href="{{ route('medidores.create') }}" class="btn btn-primary btn-sm">Nuevo</a>
            </div>
        </div>
    </div>
    <div class="card-body p-0">
        <table class="table table-hover">
            <thead>
                <tr class="small">
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th></th>
                </tr>
            </thead>    
            <tbody>
                @foreach($medidores as $medidor)
                <tr>
                    <td class="align-middle">{{ $medidor->nombre }}</td>
                    <td class="align-middle">{{ $medidor->descripcion }}</td>
                    <td class="text-right">
                        <a href="{{ route('medidores.edit', $medidor) }}" class="btn btn-warning btn-sm">e</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection