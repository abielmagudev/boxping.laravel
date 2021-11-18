@extends('app')
@section('content')

@component('@.bootstrap.card', [
    'title' => 'Nuevo incidente',
])
    <form action="{{ route('incidentes.store') }}" method="post" autocomplete="off">
        @include('incidentes._save')
        <br>
        <button class="btn btn-primary" type="submit">Guardar incidente</button>
        <a href="{{ route('incidentes.index') }}" class="btn btn-outline-secondary">Cancelar</a>
    </form>
@endcomponent
<br>

@endsection
