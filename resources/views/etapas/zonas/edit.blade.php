@extends('app')
@section('content')
<div class="card">
    <div class="card-header">
        <span>Editar zona</span>
    </div>
    <div class="card-body">
        <form action="{{ route('zonas.update', [$etapa, $zona]) }}" method="post" autocomplete="off">
            @method('patch')
            @include('etapas.zonas._save')
            <button class="btn btn-warning" type="submit">Actualizar zona</button>
            <a href="{{ route('etapas.show', $etapa) }}" class="btn btn-secondary">Regresar</a>
        </form>
    </div>
</div>
<br>
<div class="float-right">
    @component('components.modal-confirm-delete-bundle')
        @slot('text', 'Eliminar zona')
        @slot('route', route('zonas.destroy', [$etapa, $zona]))
        @slot('content')
        <p class="lead text-center m-0">Deseas eliminar zona <b>{{ $zona->nombre }}</b>?</p>
        @endslot
    @endcomponent
</div>
@endsection
