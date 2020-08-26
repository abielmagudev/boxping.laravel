@extends('app')
@section('content')
@include('components.error')
<div class="card">
    <div class="card-header">
        <span>Editar remitente</span>
    </div>
    <div class="card-body">
        <form action="{{ route('remitentes.update', $remitente) }}" method="post" autocomplete="off">
            @method('patch')
            @include('remitentes.includes.save')
            <button type="submit" class="btn btn-warning">Actualizar remitente</button>
            <a href="{{ route('remitentes.show', $remitente) }}" class="btn btn-secondary">Regresar</a>
        </form>
    </div>
</div>
@endsection