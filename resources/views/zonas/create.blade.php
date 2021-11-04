@extends('app')
@section('content')
    
@component('@.bootstrap.card', [
        'pretitle' => "Etapa {$etapa->nombre}",
        'title' => 'Nueva zona'
])
    <form action="{{ route('zonas.store', $etapa) }}" method="post" autocomplete="off">
        @include('zonas._save')
        <br>
        <button class="btn btn-primary" type="submit">Guardar zona</button>
        <a href="{{ route('etapas.show', $etapa) }}" class="btn btn-outline-secondary">Cancelar</a>
    </form>
@endcomponent
<br>

@endsection
