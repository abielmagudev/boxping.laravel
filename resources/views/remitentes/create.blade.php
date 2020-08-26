@extends('app')
@section('content')
@include('components.error')
<div class="card">
    <div class="card-header">
        <span>Agregar remitente</span>
    </div>
    <div class="card-body">
        <form action="{{ route('remitentes.store') }}" method="post" autocomplete="off">
            @include('remitentes.includes.save')
            <button type="submit" class="btn btn-success">Agregar remitente</button>
            <a href="{{ route('remitentes.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection