@extends('app')
@section('content')
<div class="card">
    <div class="card-header">
        <span>Nuevo incidente</span>
    </div>
    <div class="card-body">
        <form action="{{ route('incidentes.store') }}" method="post" autocomplete="off">
            @include('incidentes._save')
            <br>
            <button class="btn btn-success" type="submit">Guardar incidente</button>
            <a href="{{ route('incidentes.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection
