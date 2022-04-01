@extends('app')
@section('content')

@component('@.bootstrap.card', [
    'title' => 'Editar transportadora'    
])
    <form action="{{ route('transportadoras.update', $transportadora) }}" method="post" autocomplete="off" id="form-transport-update">
        @method('put')
        @include('transportadoras._save')
        <br>
        @component('@.bootstrap.grid-left-right')
            @slot('left')
            <button type="submit" class="btn btn-warning mb-3 mb-md-0" form="form-transport-update">Actualizar transportadora</button>
            <a href="{{ route('transportadoras.index') }}" class="btn btn-secondary">Regresar</a>
            @endslot

            @slot('right')
                @component('@.partials.modal-delete-confirm', [
                    'route' => route('transportadoras.destroy', $transportadora),
                ])
                    <div class="text-center">
                        <p class="m-0 lead text-muted">Se eliminará transportadora</p>
                        <p class="m-0 lead fw-bold">{{ $transportadora->nombre }}</p>
                        <p class="m-0 px-5 small">
                            <a href="{{ $transportadora->web }}" target="_blank">{{ $transportadora->web }}</a>
                        </p>
                    </div>
                @endcomponent
            @endslot
        @endcomponent
    </form>
@endcomponent
<br>

@include('@.partials.block-modifiers.content', ['model' => $transportadora])

@endsection
