@extends('app')
@section('content')
@component('components.card')
    @slot('header_title', 'Nuevo vehículo')
    @slot('body')
    <form action="{{ route('vehiculos.store') }}" method="post" autocomplete="off">
        @include('vehiculos._save')
        <br>
        <button class="btn btn-success" type="submit">Guardar vehículo</button>
        <a href="{{ route('importacion.index') }}" class="btn btn-outline-secondary">Cancelar</a>
    </form>
    @endslot
@endcomponent
@endsection
