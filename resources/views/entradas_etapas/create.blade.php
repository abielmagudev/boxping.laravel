@extends('app')
@section('content')

<p class="text-secondary">
    <span class="me-1">Entrada</span>
    <b>{{ $entrada->numero }}</b>
</p>

@component('@.bootstrap.card', [
    'title' => 'Agregar etapa',
])
    <!-- Etapa -->
    <form action="{{ route('entradas.etapas.create', $entrada) }}" method="get" class="mb-3">
        <label for="select-slug" class="form-label small">Etapas</label>
        <select name="slug" id="select-slug" class="form-select {{ bootstrap_isInputInvalid('slug', $errors) }}" onchange="submit()">
            <option label="Selecciona..." disabled selected></option>
            @foreach($etapas as $item)
            <option value="{{ $item->slug }}" {{ toggleSelected($etapa->slug, $item->slug) }}>{{ $item->nombre }}</option>
            @endforeach
        </select>
        @include('@.bootstrap.invalid-input-message', ['name' => 'slug'])
    </form> 

    <!-- Opciones de etapa -->
    @if( $etapa->isReal() )
    <form action="{{ route('entradas.etapas.store', $entrada) }}" method="post" autocomplete="off">
        @csrf

        {{-- Medidas de peso --}}
        @includeWhen($etapa->hasTarea('peso'),'entradas_etapas._medidas_peso')

        {{-- Medidas de volumen --}}
        @includeWhen($etapa->hasTarea('volumen'),'entradas_etapas._medidas_volumen')

        {{-- Zonas --}}
        @include('entradas_etapas._zonas')

        {{-- Alertas --}}
        @include('entradas_etapas._alertas')
        <br>
        
        <button class="btn btn-primary" type="submit" name="etapa" value="{{ $etapa->id }}">Guardar etapa</button>
        <a href="{{ route('entradas.show', [$entrada,'etapas']) }}" class="btn btn-secondary">Cancelar</a>
    </form>
    @endif
@endcomponent

@endsection
