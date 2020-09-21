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
            @include('etapas.includes.save')
            <button class="btn btn-warning" type="submit">Actualizar etapa</button>
            <a href="{{ route('etapas.index') }}" class="btn btn-secondary">Regresar</a>
        </form>
    </div>
</div>
<br>
<div class="float-right">
    @component('components.confirm-delete-bundle')
        @slot('text', 'Eliminar etapa')
        @slot('route', route('etapas.destroy', $etapa))
        @slot('content')
        <p class="lead text-center">Deseas eliminar la etapa con nombre <b>"{{ $etapa->nombre }}"</b>?</p>
        @endslot
    @endcomponent
</div>

@endsection
