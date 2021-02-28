@extends('app')
@section('content')

@component('components.card', [
    'header_title' => 'Nuevo remitente',
])
    @slot('body')
    <?php $route = $entrada_id ? route('remitentes.store', ['entrada' => $entrada_id]) : route('remitentes.store') ?>
    <form action="{{ $route }}" method="post" autocomplete="off">
        @include('remitentes._save')
        <button type="submit" class="btn btn-success">Guardar remitente</button>
        <a href="{{ $goback }}" class="btn btn-outline-secondary">Cancelar</a>
    </form>
    @endslot
@endcomponent

@endsection
