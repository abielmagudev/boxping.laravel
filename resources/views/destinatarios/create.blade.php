@extends('app')
@section('content')

@component('components.card', [
    'header_title' => 'Nuevo destinatario',
])
    @slot('body')
    <?php $route = $entrada_id ? route('destinatarios.store', ['entrada' => $entrada_id]) : route('destinatarios.store') ?>
    <form action="{{ $route }}" method="post" autocomplete="off">
        @include('destinatarios._save')
        <button type="submit" class="btn btn-success">Guardar destinatario</button>
        <a href="{{ $goback }}" class="btn btn-outline-secondary">Cancelar</a>
    </form>
    @endslot
@endcomponent

@endsection
