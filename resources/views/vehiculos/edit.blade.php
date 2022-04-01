@extends('app')
@section('content')

@component('@.bootstrap.card', [
    'title' => 'Editar vehículo',    
])
    <form action="{{ route('vehiculos.update', $vehiculo) }}" method="post" autocomplete="off">
        @method('put')
        @include('vehiculos._save')
        <br>
        @component('@.bootstrap.grid-left-right')
            @slot('left')
            <button class="btn btn-warning" type="submit">Actualizar vehículo</button>
            <a href="{{ route('vehiculos.index') }}" class="btn btn-secondary">Regresar</a>
            @endslot

            @slot('right')
                @component('@.partials.modal-delete-confirm', [
                    'route' => route('vehiculos.destroy', $vehiculo),
                ])
                    <div class="text-center">
                        <p class="m-0 lead text-muted">Se eliminará vehículo</p>
                        <p class="m-0 lead fw-bold">{{ $vehiculo->nombre }}</p>
                        <p class="m-0 px-5 small text-muted fst-italic">{{ $vehiculo->descripcion }}</p>
                    </div>
                @endcomponent
            @endslot
        @endcomponent
    </form>
@endcomponent
<br>

@include('@.partials.block-modifiers.content', ['model' => $vehiculo])

@endsection
