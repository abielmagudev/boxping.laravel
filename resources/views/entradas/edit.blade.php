@extends('app')
@section('content')

@component('components.card')
    @slot('header_title',"Editar {$template}")
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

    @if($template === 'entrada')
    @slot('footer')

    @component('partials.modal-confirm-delete')
        @slot('route', route('entradas.destroy', $entrada))
        @slot('trigger_text', 'Eliminar entrada')
        @slot('trigger_align', 'right')
        @slot('body')
        <p class="m-0">Se eliminará entrada</p>
        <p class="lead fw-bold">{{ $entrada->numero }}</p>
        @endslot
    @endcomponent

    @endslot
    @endif
@endcomponent

@component('partials.section-modifiers', [
    'created_by' => $entrada->creator->name,
    'created_at' => $entrada->created_at,
    'updated_by' => $entrada->updater->name,
    'updated_at' => $entrada->updated_at,
])
@endcomponent

@endsection
