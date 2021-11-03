@extends('app')
@section('content')

@component('@.bootstrap.card', [
    'title' => 'Nuevo cliente'    
])
    <form action="{{ route('clientes.store') }}" method="post" autocomplete="off">
        @include('clientes._save')
        <br>
        <button class="btn btn-primary" type="submit">Guardar cliente</button>
        <a href="{{ route('clientes.index') }}" class="btn btn-outline-secondary">Cancelar</a>
    </form>
@endcomponent
<br>

@endsection
