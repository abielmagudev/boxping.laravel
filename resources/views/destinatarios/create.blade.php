@extends('app')
@section('content')

@component('@.bootstrap.header')
    @slot('title', 'Nuevo destinatario')
@endcomponent

@component('@.bootstrap.card')
    @slot('body')
    <?php $route = $entrada_id ? route('destinatarios.store', ['entrada' => $entrada_id]) : route('destinatarios.store') ?>
    <form action="{{ $route }}" method="post" autocomplete="off">
        @include('destinatarios._save')
        <button type="submit" class="btn btn-success">Guardar destinatario</button>
        <a href="{{ route('destinatarios.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
    @endslot
@endcomponent

@endsection
