@extends('app')
@section('content')

@component('@.bootstrap.card', [
    'title' => 'Nuevo vehículo',    
])
    <form action="{{ route('vehiculos.store') }}" method="post" autocomplete="off">
        @include('vehiculos._save')
        <br>
        <button class="btn btn-primary" type="submit">Guardar vehículo</button>
        <a href="{{ route('vehiculos.index') }}" class="btn btn-outline-secondary">Cancelar</a>
    </form>
@endcomponent
<br>

@endsection
