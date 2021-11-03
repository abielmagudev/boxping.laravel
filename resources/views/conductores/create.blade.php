@extends('app')
@section('content')

@component('@.bootstrap.card', [
    'title' => 'Nuevo conductor',
])
    <form action="{{ route('conductores.store') }}" method="post" autocomplete="off">
        @include('conductores._save')
        <br>
        <button class="btn btn-primary">Guardar conductor</button>
        <a href="{{ route('conductores.index') }}" class="btn btn-outline-secondary">Cancelar</a>
    </form>
@endcomponent
<br>

@endsection
