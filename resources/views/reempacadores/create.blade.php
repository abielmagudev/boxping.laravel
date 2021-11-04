@extends('app')
@section('content')

@component('@.bootstrap.card', [
    'title' => 'Nuevo reempacador',
])
    <form action="{{ route('reempacadores.store') }}" method="post" autocomplete="off">
        @include('reempacadores._save')
        <br>
        <button class="btn btn-primary" type="submit">Guardar reempacador</button>
        <a href="{{ route('reempacadores.index') }}" class="btn btn-outline-secondary">Cancelar</a>
    </form>
@endcomponent
<br>

@endsection
