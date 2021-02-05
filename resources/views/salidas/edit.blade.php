@extends('app')
@section('content')
<p class="small text-right">
    <span class="text-muted mr-1">Entrada</span>
    <span>{{ $salida->entrada->numero }}</span>
</p>
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
                <a href="{{ route('entradas.show', $salida->entrada) }}" class="btn btn-outline-secondary">Regresar</a>
            </div>
        </form>
    </div>
</div>
@include('salidas._eliminar')
@endsection
