@extends('app')
@section('content')
@include('components.error')
<div class="card">
    <div class="card-header">Editar etapa</div>
    <div class="card-body">
        <form action="{{ route('entrada.etapas.update', ['entrada' => $entrada, 'etapa' => $etapa]) }}" method="post" autocomplete="off">
            @method('patch')
            @include('entradas.agregar.etapas._save')
            <button class="btn btn-warning" type="submit">Actualizar etapa</button>
            <a href="{{ route('entradas.show', $entrada) }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
<br>
<div class="float-right">
    @component('components.confirm-delete-bundle')
        @slot('text', 'Eliminar etapa')
        @slot('route', route('entrada.etapas.destroy', [$entrada, $etapa]))
        @slot('content')
        <p class="text-center">Deseas eliminar etapa <b>{{ $etapa->nombre }}</b> de la entrada?</p>
        @endslot
    @endcomponent
</div>
@endsection
