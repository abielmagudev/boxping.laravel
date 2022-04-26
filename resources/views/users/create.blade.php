@extends('app')
@section('content')
@component('@.bootstrap.card', [
    'title' => 'Nuevo usuario'
])
    <form action="{{ route('usuarios.store') }}" method="post" autocomplete="off">
        @csrf
        @include('users._save')
        <br>

        <button class="btn btn-success">Guardar usuario</button>
        <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endcomponent
@endsection
