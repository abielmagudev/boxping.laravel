@extends('app')
@section('content')
@component('components.card', [
    'header_title' => 'Nueva zona',
])
    @slot('body')
    <form action="{{ route('zonas.store', $etapa) }}" method="post" autocomplete="off">
        @include('zonas._save')
        <br>
        <button class="btn btn-success" type="submit">Guardar zona</button>
        <a href="{{ route('etapas.show', $etapa) }}" class="btn btn-outline-secondary">Cancelar</a>
    </form>
    @endslot
@endcomponent
@endsection
