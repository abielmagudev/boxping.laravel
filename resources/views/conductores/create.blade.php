@extends('app')
@section('content')

@component('@.bootstrap.header', [
    'title' => 'Nuevo conductor'
])
@endcomponent

@component('@.bootstrap.card')
    @slot('body')
    <form action="{{ route('conductores.store') }}" method="post" autocomplete="off">
        @include('conductores._save')
        <br>
        <button class="btn btn-success">Guardar conductor</button>
        <a href="{{ route('conductores.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
    @endslot
@endcomponent
@endsection
