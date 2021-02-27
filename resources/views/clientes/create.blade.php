@extends('app')
@section('content')

@component('components.card', [
    'header_title' => 'Nuevo cliente',
])
    @slot('body')
    <form action="{{ route('clientes.store') }}" method="post" autocomplete="off">
        @include('clientes._save')
        <br>
        <button class="btn btn-success" type="submit">Guardar cliente</button>
        <a href="{{ route('clientes.index') }}" class="btn btn-outline-secondary">Cancelar</a>
    </form>
    @endslot
@endcomponent

@endsection
