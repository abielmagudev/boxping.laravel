@extends('app')
@section('content')
<div class="card">
    <div class="card-header">
        <span>Nuevo vehículo</span>
    </div>
    <div class="card-body">
        <form action="{{ route('vehiculos.store') }}" method="post" autocomplete="off">
            @include('vehiculos._save')
            <br>
            <button class="btn btn-success" type="submit">Guardar vehículo</button>
            <a href="{{ route('vehiculos.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection
