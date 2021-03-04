@extends('app')
@section('content')
@component('components.card', [
    'header_title' => 'Nueva alerta',
])
    @slot('body')
    <form action="{{ route('alertas.store') }}" method="post" autocomplete="off">
        @include('alertas._save')
        <br>
        <button type="submit" class="btn btn-success">Guardar alerta</button>
        <a href="{{ route('alertas.index') }}" class="btn btn-outline-secondary">Cancelar</a>
    </form>
    @endslot
@endcomponent
@endsection
