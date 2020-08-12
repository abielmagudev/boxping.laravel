@extends('app')
@section('content')
@include('components.error')
<div class="card">
    <div class="card-header">
        <span>Agregar remitente</span>
    </div>
    <div class="card-body">
        <form action="{{ route('remitentes.store') }}" method="post">
            @include('remitentes.includes.save')
            <button type="submit" class="btn btn-success">Agregar remitente</button>
            <a href="{{ route('entradas.show', $entrada) }}" class="btn btn-secondary">Regresar</a>
        </form>
    </div>
</div>
@endsection