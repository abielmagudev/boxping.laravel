@extends('app')
@section('content')

@component('@.bootstrap.card')
    @slot('header')
    <b>Registrar</b>
    @endslot

    @slot('body')
    <form action="{{ route('registrar.index') }}" method="get" autocomplete="off">
        <div class="mb-3">
            <label class="form-label small" for="select-etapa">Etapa</label>
            <select id="select-etapa" class="form-select" name="etapa" onchange="submit()" required>
                <option selected disabled label="..."></option>
                @foreach ($etapas as $e)
                <option value="{{ $e->slug }}" <?= toggleSelected($e->slug, old('etapa', $etapa->slug)) ?>>{{ $e->nombre }}</option>
                @endforeach
            </select>
        </div>
    </form>
    <br class="my-5">

    @if( $etapa->isReal() ) 
    <form action="{{ route('registrar.update') }}" method="post" autocomplete="off">
        @csrf
        @method('put')
        @include('registrar._etapa')
        @include('registrar._entrada')
        @includeWhen($etapa->hasTarea('peso'), 'registrar._medicion_peso')
        @includeWhen($etapa->hasTarea('volumen'), 'registrar._medicion_volumen')
        @include('registrar._zonas')
        @include('registrar._alertas')
        <br>
        <div class="text-center">
            <button class="btn btn-success" type="submit">Guardar registrar</button>
        </div>
    </form>
    @endif
    @endslot
@endcomponent

@endsection
