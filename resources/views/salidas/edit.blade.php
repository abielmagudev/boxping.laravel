@extends('app')
@section('content')

<p class="small">
    <a href="{{ route('salidas.index') }}" class="link-primary text-decoration-none">&laquo; Salidas</a>
</p>

@component('@.bootstrap.card', [
    'pretitle' => $salida->entrada->numero,
    'title' => 'Editar salida',
])
    <form action="{{ route('salidas.update', $salida) }}" method="post" autocomplete="off">
        @method('put')
        @include('salidas._save')
        @component('@.bootstrap.grid-left-right')
            @slot('left')
            <button class="btn btn-warning" type="submit">Actualizar salida</button>
            <a href="{{ route('entradas.show', $salida->entrada) }}" class="btn btn-secondary">Regresar</a>
            @endslot

            @slot('right')
                @component('@.partials.modal-delete-confirm', [
                    'route' => route('salidas.destroy', $salida),
                    'destroy' => true,
                ])
                    <div class="text-center">
                        <p class="lead text-muted m-0">Salida de número de entrada</p>
                        <p class="lead fw-bold m-0">{{ $salida->entrada->numero }}</p>
                        @if( $salida->entrada->hasConsolidado() )
                        <p class="small">{{ $salida->entrada->consolidado->numero }}</p>
                        @endif
                    </div>
                    <br>
                    <div class="row border rounded mx-4 small align-items-center">
                        <div class="col-4 bg-light text-muted ps-3 py-1">Rastreo</div>
                        <div class="col-8 ps-3">{{ $salida->rastreo }}</div>
                        <div class="col-4 bg-light text-muted ps-3 py-1">Confirmación</div>
                        <div class="col-8 ps-3">{{ $salida->confirmacion }}</div>
                        <div class="col-4 bg-light text-muted ps-3 py-1">Transportadora</div>
                        <div class="col-8 ps-3">{{ $salida->transportadora->nombre }}</div>
                    </div>
                    <br>
                @endcomponent
            @endslot
        @endcomponent
    </form>
@endcomponent
<br>

@include('@.partials.block-modifiers.content', ['model' => $salida])

@endsection
