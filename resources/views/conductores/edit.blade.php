@extends('app')
@section('content')
<div class="card">
    <div class="card-header">Editar conductor</div>
    <div class="card-body">
        <form action="{{ route('conductores.update', $conductor) }}" method="post" autocomplete="off">
            @method('put')
            @include('conductores._save')
            <br>
            <button class="btn btn-warning">Actualizar condutor</button>
            <a href="{{ route('conductores.show', $conductor) }}" class="btn btn-secondary">Regresar</a>
        </form>
    </div>
</div>
@endsection
