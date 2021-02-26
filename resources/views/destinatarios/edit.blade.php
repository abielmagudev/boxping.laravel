@extends('app')
@section('content')

@component('components.card', [
    'header_title' => 'Editar destinataio'
])
    @slot('body')
    <form action="{{ route('destinatarios.update', $destinatario) }}" method="post" autocomplete="off">
        @method('patch')
        @include('destinatarios._save')
        <button type="submit" class="btn btn-warning">Actualizar destinatario</button>
        <a href="{{ $goback }}" class="btn btn-secondary">Regresar</a>
    </form>
    @endslot

    @slot('footer')
        @component('partials.modal-confirm-delete', [
            'route' => route('destinatarios.destroy', $destinatario),
            'trigger_text' => 'Eliminar destinatario',
            'trigger_align' => 'right',
            'body' => "Se eliminará el destinatario <span class='fw-bold'>{$destinatario->nombre}</span>"
        ])
        @endcomponent
    @endslot
@endcomponent

@component('partials.section-modifiers', [
    'created_at' => $destinatario->created_at,
    'created_by' => $destinatario->creator->name,
    'updated_at' => $destinatario->updated_at,
    'updated_by' => $destinatario->updater->name,
])
@endcomponent
<br>

@endsection
