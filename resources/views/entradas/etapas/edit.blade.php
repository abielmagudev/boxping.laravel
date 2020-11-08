@extends('app')
@section('content')
<div class="card">
    <div class="card-header">Editar etapa</div>
    <div class="card-body">
        <!-- Entrada -->
        <div class="form-group">
            <label for="">
                <small>Entrada</small>
            </label>
            <div class="form-control bg-light">{{ $entrada->numero }}</div>
        </div>

        <!-- Etapa -->
        <div class="form-group">
            <label for="">
                <small>Etapa</small>
            </label>
            <div class="form-control bg-light">{{ $etapa->nombre }}</div>
        </div>
        
        <form action="{{ route('entrada.etapas.update', [$entrada, $etapa]) }}" method="post" autocomplete="off">
            @method('patch')
            @csrf
            @include('entradas.etapas._medidas')
            @include('entradas.etapas._zonas')
            @include('entradas.etapas._alertas')
            <br>
            <button class="btn btn-warning" type="submit" name="etapa" value="{{ $etapa->id }}">Actualizar etapa</button>
            <a href="{{ route('entradas.show', $entrada) }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
<br>
<div class="float-right">
    @component('components.modal-confirm-delete-bundle')
        @slot('text', 'Eliminar etapa')
        @slot('route', route('entrada.etapas.destroy', [$entrada, $etapa]))
        @slot('content')
        <p class="lead text-center m-0">Deseas eliminar etapa <b>{{ $etapa->nombre }}</b> de la entrada?</p>
        @endslot
    @endcomponent
</div>
<br>
@endsection
