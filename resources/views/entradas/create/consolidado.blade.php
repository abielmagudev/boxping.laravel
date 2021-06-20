@extends('app')
@section('content')

@include('@.partials.page-header', [
    'subtitle' => "Consolidado {$consolidado->numero}",
    'title' => 'Agregar nueva entrada',
])

@component('@.bootstrap.card')
    @slot('body')
    <form action="{{ route('entradas.store') }}" method="post" autocomplete="off">
        @csrf
        <input name="consolidado" value="{{ $consolidado->id }}" type="hidden">
        <div class="mb-1">
            <label for="read-cliente" class="form-label small">Cliente</label>
            <div class="form-control bg-light">{{ $consolidado->cliente->nombre }} ({{ $consolidado->cliente->alias }})</div>
        </div>
        @include('entradas._save.bundle')
        <br>
        
        <div class="">
            <div class="dropdown d-inline-block">
                <button type="button" class="btn btn-success dropdown-toggle" id="dropdownMenuButtonSave" data-bs-toggle="dropdown" aria-expanded="false">
                    <span>Guardar entrada</span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButtonSave">
                    <li>
                        <span class="dropdown-header">Posteriormente</span>
                    </li>
                    <li>
                        <button type="submit" class="dropdown-item" name="siguiente" value="crear">Agregar nueva entrada</button>
                    </li>
                    <li>
                        <button type="submit" class="dropdown-item" name="siguiente" value="terminar">Finalizar</button>
                    </li>
                </ul>
            </div>
            <a href="{{ route('consolidados.show', $consolidado) }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
    @endslot
@endcomponent

@endsection
