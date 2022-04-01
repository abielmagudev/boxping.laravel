@extends('app')
@section('content')

@component('@.bootstrap.card', [
    'title' => 'Editar conductor'    
])
    <form action="{{ route('conductores.update', $conductor) }}" method="post" autocomplete="off">
        @method('put')
        @include('conductores._save')
        <br>
        @component('@.bootstrap.grid-left-right')
            @slot('left')
            <button class="btn btn-warning">Actualizar conductor</button>
            <a href="{{ route('conductores.index') }}" class="btn btn-secondary">Regresar</a>
            @endslot

            @slot('right')
                @component('@.partials.modal-delete-confirm', [
                    'route' => route('conductores.destroy', $conductor),
                ])
                    <div class="text-center">
                        <p class="m-0 lead text-muted">Se eliminará conductor</p>
                        <p class="m-0 lead fw-bold">{{ $conductor->nombre }}</p>
                    </div>
                @endcomponent
            @endslot
        @endcomponent
    </form>
@endcomponent
<br>
    
@include('@.partials.block-modifiers', ['model' => $conductor])

@endsection
