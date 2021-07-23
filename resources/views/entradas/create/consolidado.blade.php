@extends('app')
@section('content')

@include('@.bootstrap.page-header', [
    'subtitle' => "Consolidado {$consolidado->numero}",
    'title' => 'Nueva entrada',
])

@component('@.bootstrap.card')
    @slot('body')
    <form action="{{ route('entradas.store') }}" method="post" autocomplete="off">
        @csrf
        <input name="consolidado" value="{{ $consolidado->id }}" type="hidden">

        @include('entradas._save.input-numero')
        @include('entradas._save.read-consolidado-cliente')
        @include('entradas._save.textarea-contenido')
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
                        <button type="submit" class="dropdown-item" name="siguiente" value="agregar">Agregar entrada</button>
                    </li>
                    <li>
                        <button type="submit" class="dropdown-item" name="siguiente" value="finalizar">Finalizar</button>
                    </li>
                </ul>
            </div>
            <a href="{{ route('consolidados.show', $consolidado) }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
    @endslot
@endcomponent

@endsection
