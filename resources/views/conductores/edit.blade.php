@extends('app')
@section('content')
@component('components.card')
    @slot('header_title', 'Editar conductor')
    @slot('body')
        <form action="{{ route('conductores.update', $conductor) }}" method="post" autocomplete="off">
            @method('put')
            @include('conductores._save')
            <br>
            <button class="btn btn-warning">Actualizar conductor</button>
            <a href="{{ route('conductores.index') }}" class="btn btn-secondary">Regresar</a>
        </form>
    @endslot
    @slot('footer')
        @component('partials.modal-confirm-delete', [
            'body'          => "Se eliminará el conductor <span class='d-block fw-bold'>{$conductor->nombre}</span>",
            'route'         => route('conductores.destroy', $conductor),
            'trigger_align' => 'right',
            'trigger_text'  => 'Eliminar conductor',
        ])
        @endcomponent
    @endslot
@endcomponent

@component('partials.section-modifiers', [
    'concept' => $conductor,
])
@endcomponent

@endsection
