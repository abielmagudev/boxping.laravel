@extends('app')
@section('content')
@include('components.error')
<div class="card">
    <div class="card-header">
        <span>Nueva entrada</span>
    </div> 
    <div class="card-body">
        <form action="{{ route('entradas.store') }}" method="post" autocomplete="off">
            @yield('form_content')
            @include('entradas._save')
            <br>
            <div class="btn-group">
                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-1">Guardar entrada</span>
                </button>
                <div class="dropdown-menu">
                    <div class="text-muted small dropdown-item-text">Posteriormente:</div>
                    <div class="d-none dropdown-divider"></div>
                    <button name="siguiente" value="agregar" type="submit" class="dropdown-item">Agregar nueva entrada</button>
                    <button name="siguiente" value="terminar" type="submit" class="dropdown-item">Terminar</button>
                </div>
            </div>
            <a href="{{ $route_cancel }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection
