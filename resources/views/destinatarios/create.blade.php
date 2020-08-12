@extends('app')
@section('content')
<div class="card">
    <div class="card-header">
        <span>Agregar destinatario</span>
    </div>
    <div class="card-body">
        <form action="{{ route('destinatarios.store') }}" method="post">
            @include('destinatarios.includes.save')
            <button type="submit" class="btn btn-success">Agregar destinatario</button>
            <a href="{{ route('entradas.show', $entrada) }}" class="btn btn-secondary">Regresar</a>
        </form>
    </div>
</div>
@endsection