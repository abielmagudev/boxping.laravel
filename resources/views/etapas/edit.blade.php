@extends('app')
@section('content')
@include('components.error')
<div class="card">
    <div class="card-header">
        <span>Editar etapa</span>
    </div>
    <div class="card-body">
        <form action="{{ route('etapas.update', $etapa) }}" method="post" autocomplete="off">
            @method('patch')
            @include('etapas._save')
            <button class="btn btn-warning" type="submit">Actualizar etapa</button>
            <a href="{{ route('etapas.show', $etapa) }}" class="btn btn-secondary">Regresar</a>
        </form>
    </div>
</div>
@endsection
