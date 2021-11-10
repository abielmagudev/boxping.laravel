@extends('app')
@section('content')

@component('@.bootstrap.card', [
    'pretitle' => $entrada->numero,
    'title' => 'Nueva salida',
])
    <form action="{{ route('salidas.store') }}" method="post" autocomplete="off">
        @include('salidas._save')
        <input type="hidden" name="entrada" value="{{ $entrada->id }}" />
        <div class="text-right">
            <button class="btn btn-primary" type="submit">Guardar salida</button>
            <a href="{{ route('entradas.show', $entrada) }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
@endcomponent
<br>

@endsection
