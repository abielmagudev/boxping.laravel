@extends('app')
@section('content')

@component('@.bootstrap.card', [
    'title' => 'Editar alerta'
])
    <form action="{{ route('alertas.update', $alerta) }}" method="post" autocomplete="off">
        @method('put')
        @include('alertas._save')
        <br>

    @component('@.bootstrap.grid-left-right')
        @slot('left')
        <button type="submit" class="btn btn-warning">Actualizar alerta</button>
        <a href="{{ route('alertas.index') }}" class="btn btn-secondary">Regresar</a>
        @endslot
        
        @slot('right')
            @component('@.partials.modal-delete-confirm', [
                'route' => route('alertas.destroy', $alerta),
                'destroy' => true,
            ])
                <div class="text-center">
                    <p class="m-0 lead text-muted">Se eliminará alerta</p>
                    <p class="m-0 lead fw-bold">{{ $alerta->nombre }}</p>
                    <p class="badge" style="background-color:<?= $alerta->color ?>">Nivel {{ $alerta->nivel }}</p>
                </div>
            @endcomponent
        @endslot
    @endcomponent
    </form>
@endcomponent
<br>

@include('@.partials.block-modifiers.content', ['model' => $alerta])

@endsection
