@extends('app')
@section('content')

@component('@.bootstrap.header')
    @slot('title', 'Nueva transportadora')
@endcomponent
@component('@.bootstrap.card')
    @slot('body')
    <form action="{{ route('transportadoras.store') }}" method="post" autocomplete="off">
        @include('transportadoras._save')
        <br>
        <button type="submit" class="btn btn-success">Guardar transportadora</button>
        <a href="{{ route('transportadoras.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
    @endslot
@endcomponent
@endsection
