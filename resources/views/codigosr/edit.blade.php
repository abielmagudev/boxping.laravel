@extends('app')
@section('content')

@component('@.bootstrap.card', [
    'title' => 'Editar código de reempacado',
])
    <form action="{{ route('codigosr.update', $codigor) }}" method="post" autocomplete="off">
        @method('patch')
        @include('codigosr._save')
        <br>
        @component('@.bootstrap.grid-left-right')
            @slot('left')
            <button class="btn btn-warning" type="submit">Actualizar código</button>
            <a href="{{ route('codigosr.index') }}" class="btn btn-secondary">Regresar</a>
            @endslot

            @slot('right')
                @component('@.partials.modal-delete-confirm', [
                    'route' => route('codigosr.destroy', $codigor),
                ])
                    <div class="text-center">
                        <p class="m-0 lead text-muted">Se eliminará código de reempacado</p>
                        <p class="m-0 lead fw-bold">{{ $codigor->nombre }}</p>
                        <p class="m-0 px-5 small text-muted fst-italic">{{ $codigor->descripcion }}</p>
                    </div>
                @endcomponent
            @endslot
        @endcomponent
    </form>
@endcomponent
<br>

@include('@.partials.block-modifiers', ['model' => $codigor])

@endsection
