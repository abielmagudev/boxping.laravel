@extends('app')
@section('content')
<div class="card">
    <div class="card-header">
        <span>Editar vehículo</span>
    </div>
    <div class="card-body">
        <form action="{{ route('vehiculos.update', $vehiculo) }}" method="post" autocomplete="off">
            @method('put')
            @include('vehiculos._save')
            <br>
            <button class="btn btn-warning" type="submit">Actualizar vehículo</button>
            <a href="{{ route('vehiculos.show', $vehiculo) }}" class="btn btn-secondary">Regresar</a>
        </form>
    </div>
</div>
@endsection
