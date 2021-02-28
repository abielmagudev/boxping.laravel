@extends('app')
@section('content')
@component('components.card', [
    'header_title' => 'Nueva etapa'
])
    @slot('body')
    <form action="{{ route('etapas.store') }}" method="post" autocomplete="off">
        @include('etapas._save')
        <button class="btn btn-success" type="submit">Guardar etapa</button>
        <a href="{{ route('etapas.index') }}" class="btn btn-outline-secondary">Cancelar</a>
    </form>
    @endslot
@endcomponent
@endsection
