@extends('app')
@section('content')

@component('@.bootstrap.header', [
    'title' => 'Nueva salida',
    'pretitle' => "Entrada {$entrada->numero}",
])
@endcomponent

@component('@.bootstrap.card')
    @slot('body')
    <form action="{{ route('salidas.store') }}" method="post" autocomplete="off">
        @include('salidas._save')
        <input type="hidden" name="entrada" value="{{ $entrada->id }}" />
        <div class="text-right">
            <button class="btn btn-success" type="submit">Guardar salida</button>
            <a href="{{ route('entradas.show', $entrada) }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
    @endslot
@endcomponent

@endsection
