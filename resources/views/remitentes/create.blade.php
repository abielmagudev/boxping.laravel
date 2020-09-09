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
            @if( $entrada )
            <input type="hidden" name="entrada" value="{{ $entrada }}">
            @endif
            <button type="submit" class="btn btn-success">Agregar remitente</button>
            <a href="{{ $route_cancel }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection