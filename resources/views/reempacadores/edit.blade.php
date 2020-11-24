@extends('app')
@section('content')
<div class="card">
    <div class="card-header">
        <span>Editar reempacador</span>
    </div>
    <div class="card-body">
        <form action="{{ route('reempacadores.update', $reempacador) }}" method="post" autocomplete="off">
            @method('patch')
            @include('reempacadores._save')
            <br>
            <button class="btn btn-warning" type="submit">Actualizar reempacador</button>
            <a href="{{ route('reempacadores.show', $reempacador) }}" class="btn btn-secondary">Regresar</a>
        </form>
    </div>
</div>
@endsection
