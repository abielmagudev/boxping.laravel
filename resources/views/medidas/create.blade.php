@extends('app')
@section('content')
@include('components.error')
<div class="card">
    <div class="card-header">Agregar medida</div>
    <div class="card-body">
        <form action="{{ route('medidas.store') }}" method="post" autocomplete="off">
            @include('medidas.includes.save')
            <input type="hidden" name="entrada" value="{{ $entrada->id }}">
            <button class="btn btn-success" type="submit">Guardar medida</button>
            <a href="{{ route('entradas.show', $entrada) }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection