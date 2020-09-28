@extends('app')
@section('content')
@include('components.error')
<div class="card">
    <div class="card-header">Agregar etapa</div>
    <div class="card-body">
        <form action="{{ route('entrada.etapas.store', $entrada) }}" method="post" autocomplete="off">
            @include('entradas.agregar.etapas._save')
            <button class="btn btn-success" type="submit">Guardar etapa</button>
            <a href="{{ route('entradas.show', $entrada) }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection
