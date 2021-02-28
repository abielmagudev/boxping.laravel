@extends('app')
@section('content')
@component('components.card')
    @slot('header_title', 'Editar vehículo')
    @slot('body')
    <form action="{{ route('vehiculos.update', $vehiculo) }}" method="post" autocomplete="off">
        @method('put')
        @include('vehiculos._save')
        <br>
        <button class="btn btn-warning" type="submit">Actualizar vehículo</button>
        <a href="{{ route('importacion.index') }}" class="btn btn-secondary">Regresar</a>
    </form>
    @endslot
    @slot('footer')
        @component('partials.modal-confirm-delete', [
            'body'          => "Se eliminará el vehículo <span class='d-block fw-bold'>{$vehiculo->alias}</span>",
            'route'         => route('vehiculos.destroy', $vehiculo),
            'trigger_align' => 'right',
            'trigger_text'  => 'Eliminar vehículo',
        ])
        @endcomponent
    @endslot
@endcomponent

@component('partials.section-modifiers', [
    'concept' => $vehiculo
])
@endcomponent

@endsection
