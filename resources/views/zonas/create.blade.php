@extends('app')
@section('content')

@component('@.bootstrap.page-header', [
    'pretitle' => "Etapa {$etapa->nombre}",
    'title' => 'Nueva zona'
])
@endcomponent

@component('@.bootstrap.card')
    @slot('body')
    <form action="{{ route('zonas.store', $etapa) }}" method="post" autocomplete="off">
        @include('zonas._save')
        <br>
        <button class="btn btn-success" type="submit">Guardar zona</button>
        <a href="{{ route('etapas.show', $etapa) }}" class="btn btn-secondary">Cancelar</a>
    </form>
    @endslot
@endcomponent
<br>

@endsection
