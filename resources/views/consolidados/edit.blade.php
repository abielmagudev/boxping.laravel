@extends('app')
@section('content')
@component('components.card')
    @slot('header_title', 'Editar consolidado')
    @slot('body')
    <form action="{{ route('consolidados.update', $consolidado) }}" method="post" autocomplete="off">
        @method('patch')
        @include('consolidados._save')
        <button class="btn btn-warning" type="submit">Actualizar consolidado</button>
        <a href="{{ route('consolidados.show', $consolidado) }}" class="btn btn-secondary">Regresar</a>
    </form>
    @endslot
    @slot('footer')
        @component('partials.modal-confirm-delete', [
            'route' => route('consolidados.destroy', $consolidado),
            'trigger_align' => 'right',
            'trigger_text' => 'Eliminar consolidado',
        ])
            @slot('body')
            <p class="text-center">
                <span>Se eliminará consolidado</span>
                <br>
                <span class="lead fw-bold">{{ $consolidado->numero }}</span>
                <br>
                <span class="small">{{ $consolidado->entradas->count() }} entradas</span>
            </p>
            @endslot
        @endcomponent
    @endslot
@endcomponent

@component('partials.section-modifiers', [
    'concept' => $consolidado,
])
@endcomponent
@endsection
