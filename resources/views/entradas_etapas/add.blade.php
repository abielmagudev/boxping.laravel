@extends('app')
@section('content')

@component('@.bootstrap.card', [
    'pretitle' => $entrada->numero,
    'title' => 'Agregar etapa',
])
    <!-- Etapa -->
    <form action="{{ route('entradas.etapas.add', $entrada) }}" method="get">
        <div class="mb-3">
            <label for="select-slug" class="form-label small">Etapas</label>
            <select name="slug" id="select-slug" class="form-select {{ bootstrap_isInputInvalid('slug', $errors) }}" onchange="submit()">
                <option label="Selecciona..." disabled selected></option>
                @foreach($etapas as $stage)
                <option value="{{ $stage->slug }}" {{ toggleSelected($etapa->slug, $stage->slug) }}>{{ $stage->nombre }}</option>
                @endforeach
            </select>
            @include('@.bootstrap.invalid-input-message', ['name' => 'slug'])
        </div>
    </form> 

    <!-- Opciones de etapa -->
    @if( $etapa->isReal() )
    <form action="{{ route('entradas.etapas.store', $entrada) }}" method="post" autocomplete="off">
        @csrf    
        @includeWhen($etapa->hasTarea('peso'),'entradas_etapas._medidas_peso')
        @includeWhen($etapa->hasTarea('volumen'),'entradas_etapas._medidas_volumen')
        @include('entradas_etapas._zonas')
        @include('entradas_etapas._alertas')
        <br>
        <button class="btn btn-primary" type="submit" name="etapa" value="{{ $etapa->id }}">Guardar etapa</button>
        <a href="{{ route('entradas.show', $entrada) }}" class="btn btn-outline-secondary">Cancelar</a>
    </form>
    @endif
@endcomponent

@endsection
