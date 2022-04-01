@extends('app')
@section('content')
  
@component('@.bootstrap.card', [
    'title' => 'Editar destinatario',    
])
    <form action="{{ route('destinatarios.update', $destinatario) }}" method="post" autocomplete="off">
        @method('patch')
        @include('destinatarios._save')
        @component('@.bootstrap.grid-left-right')
            @slot('left')
            <button type="submit" class="btn btn-warning">Actualizar destinatario</button>
            <a href="{{ route('destinatarios.index') }}" class="btn btn-secondary">Regresar</a>
            @endslot

            @slot('right')
                @component('@.partials.modal-delete-confirm', [
                    'route' => route('destinatarios.destroy', $destinatario),
                ])
                    <div class="text-center">
                        <p class="m-0 lead text-muted">Se eliminará destinatario</p>
                        <p class="m-0 lead fw-bold">{{ $destinatario->nombre }}</p>
                        <p class="m-0 px-5 small text-muted">{{ $destinatario->localidad }}</p>
                    </div>
                @endcomponent
            @endslot
        @endcomponent
    </form>
@endcomponent
<br>

@include('@.partials.block-modifiers.content', ['model' => $destinatario])

@endsection
