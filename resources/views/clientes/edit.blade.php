@extends('app')
@section('content')

@component('@.bootstrap.card', [
    'title' => 'Editar cliente'
])
    <form action="{{ route('clientes.update', $cliente) }}" method="post" autocomplete="off">
        @method('put')
        @include('clientes._save')
        <br>
        @component('@.bootstrap.grid-left-right')
            @slot('left')
            <button class="btn btn-warning" type="submit">Actualizar cliente</button>
            <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Regresar</a>
            @endslot
            
            @slot('right')
                @component('@.partials.modal-delete-confirm', [
                    'route' => route('clientes.destroy', $cliente),
                ])
                    <div class="text-center">
                        <p class="m-0 lead text-muted">Se eliminará cliente</p>
                        <p class="lead fw-bold">{{ $cliente->nombre }} ({{ $cliente->alias }})</p>
                    </div>
                @endcomponent
            @endslot
        @endcomponent
    </form>
@endcomponent
<br>

@include('@.partials.block-modifiers', ['model' => $cliente])

@endsection
