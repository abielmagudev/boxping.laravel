@extends('app')
@section('content')

@component('@.bootstrap.page-header', [
    'pretitle' => 'Entrada ' . $entrada->numero,
    'title' => 'Agregar etapa',
])
@endcomponent

@component('@.bootstrap.card')
    @slot('body')

    <!-- Etapa -->
    <form action="{{ route('entradas.etapas.create', $entrada) }}" method="get">
        <div class="mb-3">
            <label for="select-slug" class="form-label small">Etapas</label>
            <select name="slug" id="select-slug" class="form-select" onchange="submit()">
                <option label="Selecciona..." disabled selected></option>
                @foreach($etapas as $stage)
                <option value="{{ $stage->slug }}" {{ toggleSelected($etapa->slug, $stage->slug) }}>{{ $stage->nombre }}</option>
                @endforeach
            </select>
        </div>
    </form> 

    <!-- Opciones de etapa -->
    @if( ! is_null($etapa->id) )
    <form action="{{ route('entradas.etapas.store', $entrada) }}" method="post" autocomplete="off">
        @csrf    
        @include('entradas.etapas._medidas')
        @include('entradas.etapas._zonas')
        @include('entradas.etapas._alertas')
        <br>
        <button class="btn btn-success" type="submit" name="etapa" value="{{ $etapa->id }}">Guardar etapa</button>
        <a href="{{ route('entradas.show', $entrada) }}" class="btn btn-secondary">Cancelar</a>
    </form>
    @endif

    @endslot
@endcomponent

@endsection
