@extends('app')
@section('content')

@component('@.bootstrap.card', [
    'title' => 'Editar reempacador',    
])
    <form action="{{ route('reempacadores.update', $reempacador) }}" method="post" autocomplete="off">
        @method('patch')
        @include('reempacadores._save')
        <br>

        @component('@.bootstrap.grid-left-right')
            @slot('left')
            <button class="btn btn-warning" type="submit">Actualizar reempacador</button>
            <a href="{{ route('reempacadores.index') }}" class="btn btn-secondary">Regresar</a>
            @endslot

            @slot('right')
                @component('@.partials.modal-delete-confirm', [
                    'route' => route('reempacadores.destroy', $reempacador),
                ])
                    <div class="text-center">
                        <p class="m-0 lead text-muted">Se eliminará reempacador</p>
                        <p class="m-0 lead fw-bold">{{ $reempacador->nombre }}</p>
                        <p class="m-0 px-5 small text-muted fst-italic"></p>
                    </div>
                @endcomponent
            @endslot
        @endcomponent
    </form>
@endcomponent
<br>

@include('@.partials.block-modifiers.content', ['model' => $reempacador])

@endsection
