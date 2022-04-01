@extends('app')
@section('content')

@component('@.bootstrap.card', [
    'title' => 'Editar consolidado',
])
    <form action="{{ route('consolidados.update', $consolidado) }}" method="post" autocomplete="off">
        @method('patch')
        @include('consolidados._save')

        @component('@.bootstrap.grid-left-right')
            @slot('left')
            <button class="btn btn-warning" type="submit">Actualizar consolidado</button>
            <a href="{{ route('consolidados.index') }}" class="btn btn-secondary">Regresar</a>
            @endslot

            @slot('right')
            @component('@.partials.modal-delete-confirm', [
                'route' => route('consolidados.destroy', $consolidado),
                'destroy' => true,
            ])
                <div class="text-center mb-4">
                    <p class="text-secondary lead m-0">Se eliminará consolidado con número</p>
                    <p class="fw-bold lead m-0">{{ $consolidado->numero }}</p>
                    <p class="small m-0"><b>{{ $consolidado->cliente->nombre }}</b> (<b>{{ $consolidado->cliente->alias }}</b>)</p>
                </div>

                @if( $consolidado->hasEntradas() )
                @slot('form')
                <div class="alert alert-warning">
                    <p class="text-center">Este consolidado contiene <b>{{ $consolidado->entradas->count() }} entradas</b><br> que serán afectadas por las siguientes opciones:</p>

                    <div class="d-flex flex-column px-5">
                        <div class="form-check mb-1">
                            <input class="form-check-input" type="radio" name="eliminar_entradas" value="no" id="radioMantenerEntradas" checked>
                            <label class="form-check-label small" for="radioMantenerEntradas">Mantener entradas con cliente actual</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="eliminar_entradas" value="yes" id="radioEliminarEntradas">
                            <label class="form-check-label small" for="radioEliminarEntradas">Eliminar entradas permanentemente</label>
                        </div>
                    </div>
                </div>
                @endslot
                @endif
            @endcomponent
            @endslot
        @endcomponent
    </form>
@endcomponent
<br>

@include('@.partials.block-modifiers', ['model' => $consolidado])

@endsection
