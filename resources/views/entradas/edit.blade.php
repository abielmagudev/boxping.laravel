@extends('app')
@section('content')

@component('@.bootstrap.header', [
    'title' => "Editar {$template}"
])
@endcomponent

@component('@.bootstrap.card')
    @slot('body')
    <form action="{{ route('entradas.update', $entrada) }}" method="post" autocomplete="off">
        @csrf
        @method('patch')
        @include('entradas.edit.' . $template)
        <br>
        <button class="btn btn-warning" type="submit" name="actualizar" value="{{ $template }}">Actualizar {{ $template }}</button>
        <a href="{{ route('entradas.show', $entrada) }}" class="btn btn-secondary">Regresar</a>
    </form>
    @endslot

    @slot('footer')
    @include('@.partials.modifiers-block', ['model' => $entrada])
    @endslot
@endcomponent
<br>

@if($template === 'entrada')
<div class="text-end">
    @component('@.partials.confirm-delete.bundle', [
        'route' => route('entradas.destroy', $entrada),
        'text' => 'Eliminar entrada',
    ]) 
        @slot('content')
        <p class="lead m-0">¿Deseas eliminar entrada <br><b>{{ $entrada->numero }}</b>?</p>

        @if( ! is_null($entrada->consolidado_id) )
        <p class="text-muted small">Consolidado {{ $entrada->consolidado->numero }}</p>

        @else
        <p class="text-muted small">Sin consolidar</p>

        @endif
        @endslot
    @endcomponent
</div>
<br>
@endif

@endsection
