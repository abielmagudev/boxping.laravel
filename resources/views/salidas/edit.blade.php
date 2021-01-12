@extends('app')
@section('content')
<div class="card">
    <div class="card-header">
        <span>Editar salida</span>
    </div>
    <div class="card-body">
        <form action="{{ route('salidas.update', $salida) }}" method="post" autocomplete="off">
            @method('put')
            @include('salidas._save')
            <div class="text-right">
                <button class="btn btn-warning" type="submit">Actualizar salida</button>
                <a href="{{ route('salidas.show', $salida) }}" class="btn btn-outline-secondary">Regresar</a>
            </div>
        </form>
    </div>
</div>
@include('salidas._eliminar')
@endsection
