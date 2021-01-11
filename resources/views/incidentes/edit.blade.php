@extends('app')
@section('content')
<div class="card">
    <div class="card-header">
        <span>Editar incidente</span>
    </div>
    <div class="card-body">
        <form action="{{ route('incidentes.update', $incidente) }}" method="post" autocomplete="off">
            @method('put')
            @include('incidentes._save')
            <br>
            <button class="btn btn-warning" type="submit">Actualizar incidente</button>
            <a href="{{ route('incidentes.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@include('incidentes._eliminar')
@endsection
