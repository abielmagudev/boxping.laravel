@extends('app')
@section('content')
@include('components.error')
<div class="card">
    <div class="card-header">Editar medida</div>
    <div class="card-body">
        <form action="{{ route('medidas.update', $medida) }}" method="post" autocomplete="off">
            @method('put')
            @include('medidas.includes.save')
            <button class="btn btn-warning" type="submit">Actualizar medida</button>
            <a href="{{ route('entradas.show', $medida->entrada_id) }}" class="btn btn-secondary">Regresar</a>
        </form>
    </div>
</div>
<br>

<form action="{{ route('medidas.destroy', $medida) }}" method="post" class="text-right">
    @method('delete')
    @csrf
    <button class="btn btn-link btn-sm text-danger border-0 p-0" type="submit">Eliminar medida</button>
</form>
@endsection