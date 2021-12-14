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
            @include('@.partials.modal-confirm-delete.trigger', ['only' => 'text'])
            @endslot
        @endcomponent
    </form>
@endcomponent
<br>

@include('@.partials.block-modifiers.content', ['model' => $guia])

@include('@.partials.modal-confirm-delete.modal', [
    'route' => route('guias_impresion.destroy', $guia),
    'category' => 'guía de impresión',
    'name' => $guia->nombre,
    'is_hard' => true,
])

@endsection
