@extends('app')
@section('content')

@component('@.bootstrap.header', [
    'title' => 'Nuevo cliente',
])
@endcomponent

@component('@.bootstrap.card')
    @slot('body')
    <form action="{{ route('clientes.store') }}" method="post" autocomplete="off">
        @include('clientes._save')
        <br>
        <button class="btn btn-success" type="submit">Guardar cliente</button>
        <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
    @endslot
@endcomponent

@endsection
