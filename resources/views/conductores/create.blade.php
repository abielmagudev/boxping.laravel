@extends('app')
@section('content')
<div class="card">
    <div class="card-header">Nuevo conductor</div>
    <div class="card-body">
        <form action="{{ route('conductores.store') }}" method="post" autocomplete="off">
            @include('conductores._save')
            <br>
            <button class="btn btn-success">Guardar condutor</button>
            <a href="{{ route('conductores.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection
