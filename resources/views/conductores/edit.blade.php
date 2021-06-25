@extends('app')
@section('content')

@component('@.bootstrap.page-header', [
    'title' => 'Editar conductor'
])
@endcomponent

@component('@.bootstrap.card')
    @slot('body')
        <form action="{{ route('conductores.update', $conductor) }}" method="post" autocomplete="off">
            @method('put')
            @include('conductores._save')
            <br>
            <button class="btn btn-warning">Actualizar conductor</button>
            <a href="{{ route('conductores.index') }}" class="btn btn-secondary">Regresar</a>
        </form>
    @endslot
    
    @slot('footer')
        @include('@.partials.modifiers-block', [
            'model' => $conductor
        ])
    @endslot
@endcomponent
<br>

<div class="text-end">
    @component('@.partials.confirm-delete.bundle', [
        'route' => route('conductores.destroy', $conductor),
        'text' => 'Eliminar conductor',
    ])
        @slot('content')
        <p class="lead">¿Deseas eliminar conductor <b>{{ $conductor->nombre }}</b>?</p>
        @endslot
    @endcomponent
</div>
<br>

@endsection
