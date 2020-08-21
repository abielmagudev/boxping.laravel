@extends('app')
@section('content')
@include('components.error')
<div class="alert alert-info">Número de entrada: <b>{{ $entrada->numero }}</b></div>
<div class="card">
    <div class="card-header">
        <span>Editar destinatario</span>
    </div>
    <div class="card-body">
        <form action="{{ route('destinatarios.update', $destinatario) }}" method="post" autocomplete="off">
            @method('put')
            @include('destinatarios.includes.save')
            <button type="submit" class="btn btn-warning">Actualizar destinatario</button>
            <a href="{{ route('entradas.show', $entrada) }}" class="btn btn-secondary">Regresar</a>
        </form>
    </div>
</div>
@endsection