@extends('app')
@section('content')
@component('components.card', [
    'header_title' => 'Nuevo reempacador',
])
    @slot('body')
    <form action="{{ route('reempacadores.store') }}" method="post" autocomplete="off">
        @include('reempacadores._save')
        <br>
        <button class="btn btn-success" type="submit">Guardar reempacador</button>
        <a href="{{ route('reempaque.index') }}" class="btn btn-outline-secondary">Cancelar</a>
    </form>
    @endslot
@endcomponent

@endsection
