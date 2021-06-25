@extends('app')
@section('content')

@component('@.bootstrap.page-header')
    @slot('title', 'Editar transportadora')
@endcomponent

@component('@.bootstrap.card')
    @slot('body')
    <form action="{{ route('transportadoras.update', $transportadora) }}" method="post" autocomplete="off" id="form-transport-update">
        @method('put')
        @include('transportadoras._save')
        <br>
        <button type="submit" class="btn btn-warning mb-3 mb-md-0" form="form-transport-update">Actualizar transportadora</button>
        <a href="{{ route('transportadoras.show', $transportadora) }}" class="btn btn-secondary">Regresar</a>
    </form>
    @endslot

    @slot('footer')
        @include('@.partials.modifiers-block', [
            'model' => $transportadora
        ])
    @endslot
@endcomponent
<br>

<div class="text-end">
    @component('@.partials.confirm-delete.bundle', [
        'route' => route('transportadoras.destroy', $transportadora),
        'text' => 'Eliminar transportadora',
    ])
        @slot('content')
        <p class="lead">¿Deseas eliminar la transportadora <b>{{ $transportadora->nombre }}</b>?</p>
        @endslot
    @endcomponent
</div>
<br>

@endsection
