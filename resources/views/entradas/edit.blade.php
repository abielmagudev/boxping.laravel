@extends('app')
@section('content')

@component('@.bootstrap.header', [
    'title' => "Editar {$template}"
])
@endcomponent

@component('@.bootstrap.card')
    @slot('body')
    <form action="{{ route('entradas.update', $entrada) }}" method="post" autocomplete="off">
        @method('patch')
        @csrf
        @include('entradas.edit.' . $template)
        <br>
        <button class="btn btn-warning" type="submit" name="actualizar" value="{{ $template }}">Actualizar {{ $template }}</button>
        <a href="{{ route('entradas.show', $entrada) }}" class="btn btn-secondary">Regresar</a>
    </form>
    @endslot

    @slot('footer')
    @component('@.partials.block-modifiers', [
        'model' => $entrada,
    ])
    @endcomponent
    @endslot
@endcomponent
<br>

@if($template === 'entrada')
<div class="text-end">
    @component('@.partials.modal-confirm-delete', [
        'route' => route('entradas.destroy', $entrada),
        'text' => 'Eliminar entrada',
    ])
        @slot('content')
        <p class="lead">¿Deseas eliminar entrada <br> <b>{{ $entrada->numero }}</b>?</p>

        <p class="text-muted">
        @if( ! is_null($entrada->consolidado_id) )
        Consolidado {{ $entrada->consolidado->numero }}

        @else
        Sin consolidar

        @endif
        </p>

        @endslot
    @endcomponent
</div>
@endif
<br>
@endsection
