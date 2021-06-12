@extends('app')
@section('content')

@component('@.bootstrap.header', [
    'title' => 'Nuevo vehículo',
])
@endcomponent

@component('@.bootstrap.card')
    @slot('body')
    <form action="{{ route('vehiculos.store') }}" method="post" autocomplete="off">
        @include('vehiculos._save')
        <br>
        <button class="btn btn-success" type="submit">Guardar vehículo</button>
        <a href="{{ route('vehiculos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
    @endslot
@endcomponent
@endsection
