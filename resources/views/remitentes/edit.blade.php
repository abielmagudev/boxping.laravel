@extends('app')
@section('content')
<div class="card">
    <div class="card-header">
        <span>Editar destinatario</span>
    </div>
    <div class="card-body">
        <form action="{{ route('remitentes.update', $remitente) }}" method="post">
            @method('put')
            @include('remitentes.includes.save')
            <button type="submit" class="btn btn-warning">Actualizar remitente</button>
            <a href="{{ route('entradas.show', $entrada) }}" class="btn btn-secondary">Regresar</a>
        </form>
    </div>
</div>
@endsection