@extends('app')
@section('content')

@component('@.bootstrap.card', [
    'title' => 'Nueva etapa'    
])
    <form action="{{ route('etapas.store') }}" method="post" autocomplete="off">
        @include('etapas._save')
        <button class="btn btn-success" type="submit">Guardar etapa</button>
        <a href="{{ route('etapas.index') }}" class="btn btn-outline-secondary">Cancelar</a>
    </form>
@endcomponent
<br>

@endsection
