@extends('app')
@section('content')

@component('@.bootstrap.card', [
    'title' => 'Editar incidente',    
])
    <form action="{{ route('incidentes.update', $incidente) }}" method="post" autocomplete="off">
        @method('put')
        @include('incidentes._save')
        @component('@.bootstrap.grid-left-right')
            @slot('left')
            <button class="btn btn-warning" type="submit">Actualizar incidente</button>
            <a href="{{ route('incidentes.index') }}" class="btn btn-secondary">Regresar</a>
            @endslot

            @slot('right')
                @component('@.partials.modal-delete-confirm', [
                    'route' => route('incidentes.destroy', $incidente),
                    'destroy' => true,
                ])
                    <div class="text-center">
                        <p class="m-0 lead text-muted">Se eliminará incidente</p>
                        <p class="m-0 lead fw-bold">{{ $incidente->nombre }}</p>
                        <p class="m-0 px-5 small fst-italic">{{ $incidente->descripcion }}</p>
                    </div>
                @endcomponent
            @endslot
        @endcomponent
    </form>
@endcomponent
<br>

@include('@.partials.block-modifiers', ['model' => $incidente])

@endsection
