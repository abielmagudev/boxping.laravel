@extends('app')
@section('content')
@include('components.error')
<div class="card">
    <div class="card-header">
        <span>Nueva alerta</span>
    </div>
    <div class="card-body">
        <form action="{{ route('alertas.store') }}" method="post" autocomplete="off">
            @include('alertas._save')

            <br>
            <button type="submit" class="btn btn-success">Guardar alerta</button>
            <a href="{{ route('alertas.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection
