@extends('app')
@section('content')

@component('@.bootstrap.page-header', [
    'title' => 'Nuevo remitente',
])
@endcomponent

@component('@.bootstrap.card')
    @slot('body')
    <?php $route = $entrada_id ? route('remitentes.store', ['entrada' => $entrada_id]) : route('remitentes.store') ?>
    <form action="{{ $route }}" method="post" autocomplete="off">
        @include('remitentes._save')
        <button type="submit" class="btn btn-success">Guardar remitente</button>
        <a href="{{ route('remitentes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
    @endslot
@endcomponent

@endsection
