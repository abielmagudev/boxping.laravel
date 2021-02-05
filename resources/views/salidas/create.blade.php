@extends('app')
@section('content')
<p class="small text-right">
    <span class="text-muted mr-1">Entrada</span>
    <span>{{ $entrada->numero }}</span>
</p>
<div class="card">
    <div class="card-header">
        <span>Crear salida</span>
    </div>
    <div class="card-body">
        <form action="{{ route('salidas.store') }}" method="post" autocomplete="off">
            @include('salidas._save')
            <input type="hidden" name="entrada" value="{{ $entrada->id }}" />
            <div class="text-right">
                <button class="btn btn-success" type="submit">Guardar salida</button>
                <a href="{{ route('entradas.show', $entrada) }}" class="btn btn-outline-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection
