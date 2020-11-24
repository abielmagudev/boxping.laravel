@extends('app')
@section('content')
<div class="card">
    <div class="card-header">
        <span>Nuevo reempacador</span>
    </div>
    <div class="card-body">
        <form action="{{ route('reempacadores.store') }}" method="post" autocomplete="off">
            @include('reempacadores._save')
            <br>
            <button class="btn btn-success" type="submit">Guardar reempacador</button>
            <a href="{{ route('reempacadores.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection
