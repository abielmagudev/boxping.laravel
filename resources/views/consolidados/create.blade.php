@extends('app')
@section('content')
@include('components.error')
<div class="card">
    <div class="card-header">
        <span>Nuevo consolidado</span>
    </div>
    <div class="card-body">
        <form action="{{ route('consolidados.store') }}" method="post" autocomplete="off">
            @include('consolidados.includes.save')
            <div class="btn-group" role="group">
                <button id="buttonDropdownStoreConsolidado" type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span>Guardar consolidado</span>
                </button>
                <div class="dropdown-menu" aria-labelledby="buttonDropdownStoreConsolidado">
                    <span class="dropdown-header">Posteriomente:</span>
                    <button class="dropdown-item" type="submit" name="guardar" value="2">Agregar entradas al consolidado</button>
                    <button class="dropdown-item" type="submit" name="guardar" value="1">Crear nuevo consolidado</button>
                    <button class="dropdown-item" type="submit" name="guardar" value="0">Terminar</button>
                </div>
            </div>
            <a href="{{ route('consolidados.index') }}" class="btn btn-outline-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection
