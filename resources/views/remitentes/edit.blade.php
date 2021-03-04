@extends('app')
@section('content')

@component('components.card', [
    'header_title' => 'Editar remitente',
])
    @slot('body')
    <form action="{{ route('remitentes.update', $remitente) }}" method="post" autocomplete="off">
        @method('patch')
        @include('remitentes._save')
        <button type="submit" class="btn btn-warning">Actualizar remitente</button>
        <a href="{{ $goback }}" class="btn btn-secondary">Regresar</a>
    </form>
    @endslot

    @slot('footer')
        @component('partials.modal-confirm-delete', [
            'route' => route('remitentes.destroy', $remitente),
            'trigger_text' => 'Eliminar remitente',
            'trigger_align' => 'right',
            'body' => "Se eliminará el remitente <span class='fw-bold'>{$remitente->nombre}</span>"
        ])
        @endcomponent
    @endslot
@endcomponent

@component('partials.section-modifiers', [
    'concept' => $remitente,
])
@endcomponent
<br>

@endsection
