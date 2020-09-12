@extends('app')
@section('content')
@include('components.error')
<div class="card">
    <div class="card-header">
        <span>Editar consolidado</span>
    </div>
    <div class="card-body">
        <form action="{{ route('consolidados.update', $consolidado) }}" method="post" autocomplete="off">
            @method('patch')
            @include('consolidados.includes.save')
            <button class="btn btn-warning" type="submit">Actualizar consolidado</button>
            <a href="{{ route('consolidados.show', $consolidado) }}" class="btn btn-outline-secondary">Regresar</a>
        </form>
    </div>
</div>
@endsection
