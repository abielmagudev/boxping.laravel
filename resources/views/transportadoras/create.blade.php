@extends('app')
@section('content')
@component('components.card', [
    'header_title' => 'Nueva transportadora',
])
    @slot('body')
    <form action="{{ route('transportadoras.store') }}" method="post" autocomplete="off">
        @include('transportadoras._save')
        <br>
        <button type="submit" class="btn btn-success">Guardar transportadora</button>
        <a href="{{ route('transportadoras.index') }}" class="btn btn-outline-secondary">Cancelar</a>
    </form>
    @endslot
@endcomponent
@endsection
