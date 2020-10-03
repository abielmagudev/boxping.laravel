@extends('app')
@section('content')
@include('components.error')
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
    @component('components.confirm-delete-bundle')
        @slot('text', 'Eliminar zona')
        @slot('route', route('zonas.destroy', [$etapa, $zona]))
        @slot('content')
        <p class="text-center">Deseas eliminar la zona <b>{{ $zona->nombre }}</b>?</p>
        @endslot
    @endcomponent
</div>
@endsection