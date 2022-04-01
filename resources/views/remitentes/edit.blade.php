@extends('app')
@section('content')
    
@component('@.bootstrap.card', [
    'title' => 'Editar remitente' 
])
    <form action="{{ route('remitentes.update', $remitente) }}" method="post" autocomplete="off">
        @method('patch')
        @include('remitentes._save')
        @component('@.bootstrap.grid-left-right')
            @slot('left')
            <button type="submit" class="btn btn-warning">Actualizar remitente</button>
            <a href="{{ route('remitentes.index') }}" class="btn btn-secondary">Regresar</a>
            @endslot

            @slot('right')
                @component('@.partials.modal-delete-confirm', [
                    'route' => route('remitentes.destroy', $remitente),
                ])
                    <div class="text-center">
                        <p class="m-0 lead text-muted">Se eliminará remitente</p>
                        <p class="m-0 lead fw-bold">{{ $remitente->nombre }}</p>
                        <p class="m-0 px-5 small text-muted">{{ $remitente->localidad }}</p>
                    </div>
                @endcomponent
            @endslot
        @endcomponent
    </form>
@endcomponent
<br>

@include('@.partials.block-modifiers.content', ['model' => $remitente])

@endsection
