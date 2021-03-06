@extends('app')
@section('content')

@component('components.header', [
    'title' => $salida->entrada->numero,
    'subtitle' => 'Entrada',
    'goback' => route('entradas.show', $salida->entrada_id)
])
@endcomponent

@component('components.card', [
    'header_title' => 'Editar salida'
])
    @slot('body')
    <form action="{{ route('salidas.update', $salida) }}" method="post" autocomplete="off">
        @method('put')
        @include('salidas._save')
        <div class="text-right">
            <button class="btn btn-warning" type="submit">Actualizar salida</button>
            <a href="{{ route('entradas.show', $salida->entrada) }}" class="btn btn-secondary">Regresar</a>
        </div>
    </form>
    @endslot

    @slot('footer')
    @component('partials.modal-confirm-delete', [
        'route' => route('salidas.destroy', $salida),
        'trigger_text' => 'Eliminar salida',
        'trigger_align' => 'right',
    ])
        @slot('body')
        <p>Se eliminará la <span class="fw-bold">salida</span> de la entrada <br><b>{{ $salida->entrada->numero }}</b></p>
        @endslot
    @endcomponent
    @endslot
@endcomponent

@component('partials.section-modifiers', [
    'concept' => $salida,
])
@endcomponent

@endsection
