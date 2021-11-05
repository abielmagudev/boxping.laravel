@extends('app')
@section('content')

@component('@.bootstrap.card', [
    'title' => 'Nuevo remitente',    
])
    <form action="{{ route('remitentes.store') }}" method="post" autocomplete="off">
        @include('remitentes._save')
        <button type="submit" class="btn btn-primary">Guardar remitente</button>
        <a href="{{ route('remitentes.index') }}" class="btn btn-outline-secondary">Cancelar</a>
    </form>
@endcomponent

@endsection
