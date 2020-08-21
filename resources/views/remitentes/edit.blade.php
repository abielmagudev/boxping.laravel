@extends('app')
@section('content')
@include('components.error')
<p class="text-info text-right small">
    <b>{{ $entrada->alias_numero ?? $entrada->numero }}</b>
</p>
<div class="card">
    <div class="card-header">
        <span>Editar remitente</span>
    </div>
    <div class="card-body">
        <form action="{{ route('remitentes.update', $remitente) }}" method="post" autocomplete="off">
            @method('put')
            @include('remitentes.includes.save')
            <button type="submit" class="btn btn-warning">Actualizar remitente</button>
            <a href="{{ route('entradas.show', $entrada) }}" class="btn btn-secondary">Regresar</a>
        </form>
    </div>
</div>
@endsection