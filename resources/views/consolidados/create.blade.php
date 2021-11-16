@extends('app')
@section('content')

@component('@.bootstrap.card', [
    'title' => 'Nuevo consolidado',
])
    <form action="{{ route('consolidados.store') }}" method="post" autocomplete="off">
        @include('consolidados._save')

        <div class="btn-group" role="group">
            <button type="submit" class="btn btn-primary" name="guardar" value="0">Guardar consolidado</button>
            <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="visually-hidden">Guardar consolidado dropdown</span>
            </button>
            <ul class="dropdown-menu">
                <li>
                    <span class="dropdown-header">Posteriormente...</span>
                </li>
                <li class="d-none">
                    <hr class="dropdown-divider">
                </li>
                <li>
                    <button type="submit" class="dropdown-item" name="guardar" value="2">Agregar entradas al consolidado</button>
                </li>
                <li>
                    <button type="submit" class="dropdown-item" name="guardar" value="1">Crear nuevo consolidado</button>
                </li>
            </ul>
        </div>

        <a href="{{ route('consolidados.index') }}" class="btn btn-outline-secondary d-inline-block">Cancelar</a>
    </form>
@endcomponent
<br>

@endsection
