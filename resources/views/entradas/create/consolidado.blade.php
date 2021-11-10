@extends('app')
@section('content')

@component('@.bootstrap.card', [
    'pretitle' => "CONSOLIDADO {$consolidado->numero}",
    'title' => 'Nueva entrada',
])
    <form action="{{ route('entradas.store') }}" method="post" autocomplete="off">
        @csrf
        <input name="consolidado" value="{{ $consolidado->id }}" type="hidden">

        @include('entradas._save.input-numero')
        @include('entradas._save.read-consolidado-cliente')
        @include('entradas._save.textarea-contenido')
        <br>
        
        <div class="">
            <div class="dropdown d-inline-block">
                <button type="button" class="btn btn-primary dropdown-toggle" id="dropdownMenuButtonSave" data-bs-toggle="dropdown" aria-expanded="false">
                    <span>Guardar entrada</span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButtonSave">
                    <li>
                        <span class="dropdown-header">Posteriormente</span>
                    </li>
                    <li>
                        <button type="submit" class="dropdown-item" name="siguiente" value="agregar">Agregar entrada</button>
                    </li>
                    <li>
                        <button type="submit" class="dropdown-item" name="siguiente" value="finalizar">Finalizar</button>
                    </li>
                </ul>
            </div>
            <a href="{{ route('consolidados.show', $consolidado) }}" class="btn btn-outline-secondary">Cancelar</a>
        </div>
    </form>
@endcomponent

@endsection
