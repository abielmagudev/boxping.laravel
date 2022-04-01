@extends('app')
@section('content')
    
@component('@.bootstrap.card', [
    'title' => 'Editar guia de impresión',    
])
    <form action="{{ route('guias_impresion.update', $guia) }}" method="post" autocomplete="off">
        @method('put')
        @include('guias_impresion._save')
        @component('@.bootstrap.grid-left-right')
            @slot('left')
            <button class="btn btn-warning" type="submit">Actualizar <span class="d-none d-md-inline-block">guía de impresión</span></button>
            <a href="{{ route('guias_impresion.index') }}" class="btn btn-secondary">Regresar</a>
            @endslot

            @slot('right')
                @component('@.partials.modal-delete-confirm', [
                    'route' => route('guias_impresion.destroy', $guia),
                    'destroy' => true,
                ])
                    <div class="text-center">
                        <p class="m-0 lead text-muted">Se eliminará guía de impresión</p>
                        <p class="m-0 lead fw-bold">{{ $guia->nombre }}</p>
                        <p class="m-0 px-5 small fst-italic">{{ $guia->descripcion }}</p>
                    </div>
                @endcomponent
            @endslot
        @endcomponent
    </form>
@endcomponent
<br>

@include('@.partials.block-modifiers.content', ['model' => $guia])

@endsection
