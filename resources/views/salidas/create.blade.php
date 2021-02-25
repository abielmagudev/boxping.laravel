@extends('app')
@section('content')

@component('components.header', [
    'title' => $entrada->numero,
    'subtitle' => 'Entrada',
])
@endcomponent

@component('components.card', [
    'header_title' => 'Nueva salida'
])
    @slot('body')
    <form action="{{ route('salidas.store') }}" method="post" autocomplete="off">
        @include('salidas._save')
        <input type="hidden" name="entrada" value="{{ $entrada->id }}" />
        <div class="text-right">
            <button class="btn btn-success" type="submit">Guardar salida</button>
            <a href="{{ route('entradas.show', $entrada) }}" class="btn btn-outline-secondary">Cancelar</a>
        </div>
    </form>
    @endslot
@endcomponent

@endsection
