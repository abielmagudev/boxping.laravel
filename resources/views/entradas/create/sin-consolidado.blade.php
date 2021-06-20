@extends('app')
@section('content')

@include('@.partials.page-header', [
    'subtitle' => 'Sin consolidado',
    'title' => 'Nueva entrada',
])

@component('@.bootstrap.card')
    @slot('body')
    <form action="{{ route('entradas.store') }}" method="post" autocomplete="off">
        @csrf
        
        @include('entradas._save.input-numero')
        @include('entradas._save.select-cliente')
        @include('entradas._save.checkbox-cliente-alias')
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
                        <button type="submit" class="dropdown-item" name="siguiente" value="crear">Crear entrada</button>
                    </li>
                    <li>
                        <button type="submit" class="dropdown-item" name="siguiente" value="finalizar">Finalizar</button>
                    </li>
                </ul>
            </div>
            <a href="{{ route('entradas.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
    @endslot
@endcomponent

@endsection
