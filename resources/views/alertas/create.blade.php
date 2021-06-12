@extends('app')
@section('content')

@component('@.bootstrap.header', [
    'title' => 'Nueva alerta'
])
@endcomponent

@component('@.bootstrap.card')
    @slot('body')
    <form action="{{ route('alertas.store') }}" method="post" autocomplete="off">
        @include('alertas._save')
        <br>
        <button type="submit" class="btn btn-success">Guardar alerta</button>
        <a href="{{ route('alertas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
    @endslot
@endcomponent

@endsection
