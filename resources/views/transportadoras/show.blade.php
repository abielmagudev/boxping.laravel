@extends('app')
@section('content')

@component('components.header', [
    'title' => $transportadora->nombre,
    'subtitle' => 'Transportadora',
    'goback' => route('transportadoras.index'),
])
    @slot('options')
    <a href="{{ route('transportadoras.edit',$transportadora) }}" class="btn btn-sm btn-warning">Editar</a>
    @endslot
@endcomponent

<div class="row">
    <div class="col-sm">  
        @component('components.card', [
            'header_title' => 'Información',
        ])
            @slot('body')
            <p>
                <small class="d-block text-muted">Sitio web</small>
                <a href="{{ $transportadora->web }}" target="_blank">{{ $transportadora->web }}</a>
            </p>
            <p>
                <small class="d-block text-muted">Teléfono</small>
                <span>{{ $transportadora->telefono }}</span>
            </p>
            <p>
                <small class="d-block text-muted">Notas</small>
                <span>{{ $transportadora->notas }}</span>
            </p>
            @endslot
        @endcomponent
    </div>
    <div class="col-sm"></div>
</div>
@endsection
