@extends('app')
@section('content')
@component('components.card')
    @slot('header_title', 'Editar conductor')
    @slot('body')
        <form action="{{ route('conductores.update', $conductor) }}" method="post" autocomplete="off">
            @method('put')
            @include('conductores._save')
            <br>
            <a href="{{ route('importacion.index') }}" class="btn btn-secondary">Regresar</a>
            <button class="btn btn-warning">Actualizar conductor</button>
        </form>
    @endslot

    @slot('footer')
        @component('partials.modal-confirm-delete', [
            'content'       => "Se eliminará el conductor <span class='d-block fw-bold'>{$conductor->nombre}</span>",
            'route'         => route('conductores.destroy', $conductor),
            'trigger_align' => 'right',
            'trigger_text'  => 'Eliminar conductor',
        ])

        @endcomponent
    @endslot
@endcomponent

@component('partials.modifiers', [
    'created_by' => $conductor->creator->name,
    'created_at' => $conductor->created_at,
    'updated_by' => $conductor->updater->name,
    'updated_at' => $conductor->updated_at
])
@endcomponent

@endsection
