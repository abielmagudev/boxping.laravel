@extends('app')
@section('content')
<div class="card">
    <div class="card-header">
        <span>Editar remitente</span>
    </div>
    <div class="card-body">
        <form action="{{ route('remitentes.update', $remitente) }}" method="post" autocomplete="off">
            @method('patch')
            @include('remitentes._save')
            <button type="submit" class="btn btn-warning">Actualizar remitente</button>
            <a href="{{ $returning }}" class="btn btn-secondary">Regresar</a>
        </form>
    </div>
</div>
@endsection
