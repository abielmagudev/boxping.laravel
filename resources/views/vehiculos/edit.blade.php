@extends('app')
@section('content')
@component('components.card')
    @slot('header_title', 'Editar vehículo')
    @slot('body')
    <form action="{{ route('vehiculos.update', $vehiculo) }}" method="post" autocomplete="off">
        @method('put')
        @include('vehiculos._save')
        <br>
        <button class="btn btn-outline-warning" type="submit">Actualizar vehículo</button>
        <a href="{{ route('importacion.index') }}" class="btn btn-secondary">Regresar</a>
    </form>
    @endslot
    @slot('footer')
        @component('partials.modal-confirm-delete', [
            'content'       => "Se eliminará el vehículo <span class='d-block fw-bold'>{$vehiculo->alias}</span>",
            'route'         => route('vehiculos.destroy', $vehiculo),
            'trigger_align' => 'right',
            'trigger_text'  => 'Eliminar vehículo',
        ])
        @endcomponent
    @endslot
@endcomponent

@component('partials.section-modifiers', [
    'created_by' => $vehiculo->creator->name,
    'created_at' => $vehiculo->created_at,
    'updated_by' => $vehiculo->updater->name,
    'updated_at' => $vehiculo->updated_at
])
@endcomponent

@endsection
