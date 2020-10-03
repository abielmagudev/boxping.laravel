@extends('app')
@section('content')
@include('components.error')
<div class="card">
    <div class="card-header">
        <span>Nueva zona</span>
    </div>
    <div class="card-body">
        <form action="{{ route('zonas.store', $etapa) }}" method="post" autocomplete="off">
            @include('etapas.zonas._save')
            <button class="btn btn-success" type="submit">Guardar zona</button>
            <a href="{{ route('etapas.show', $etapa) }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection