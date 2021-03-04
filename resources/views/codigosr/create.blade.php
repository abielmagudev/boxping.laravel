@extends('app')
@section('content')
@component('components.card', [
    'header_title' => 'Nuevo código'
])
    @slot('body')
    <form action="{{ route('codigosr.store') }}" method="post" autocomplete="off">
        @include('codigosr._save')
        <br>
        <button class="btn btn-success" type="submit">Guardar código</button>
        <a href="{{ route('codigosr.index') }}" class="btn btn-outline-secondary">Cancelar</a>
    </form>
    @endslot
@endcomponent
@endsection
