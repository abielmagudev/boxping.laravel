@extends('app')
@section('content')

@component('@.bootstrap.card', [
    'title' => 'Nueva transportadora'    
])
    <form action="{{ route('transportadoras.store') }}" method="post" autocomplete="off">
        @include('transportadoras._save')
        <br>
        <button type="submit" class="btn btn-primary">Guardar transportadora</button>
        <a href="{{ route('transportadoras.index') }}" class="btn btn-outline-secondary">Cancelar</a>
    </form>
@endcomponent

@endsection
