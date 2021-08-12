@extends('app')
@section('content')

<?php /*
@component('components.bs.breadcrums')
    @slot('breadcrums', [
        'Transportadoras' => route('transportadoras.index'),
        $transportadora->nombre => null,
    ])
@endcomponent
*/ ?>

@component('@.bootstrap.page-header')
    @slot('pretitle', 'Transportadora')
    @slot('title', $transportadora->nombre)
    @slot('options')
    <a href="{{ route('transportadoras.edit', $transportadora) }}" class="btn btn-sm btn-warning">
        <span class="d-block d-md-none">{!! $svg->pencil_fill !!}</span>
        <span class="d-none d-md-block">Editar</span>
    </a>
    @endslot
@endcomponent

<div class="row">
    <!-- Information -->
    <div class="col-sm">
        @component('@.bootstrap.card')  
            @slot('header', 'Información')  
            @slot('body')
            <p>
                <small class="d-block text-muted">Teléfono</small>
                <span>{{ $transportadora->telefono }}</span>
            </p>
            <p>
                <small class="d-block text-muted">Sitio web</small>
                <a href="{{ $transportadora->web }}" target="_blank">{{ $transportadora->web }}</a>
            </p>
            <p>
                <small class="d-block text-muted">Notas</small>
                <span>{{ $transportadora->notas }}</span>
            </p>
            @endslot 
        @endcomponent
    
    </div>

    <!-- Salidas -->
    <div class="col-sm col-sm-8">
        @component('@.bootstrap.card')
            @slot('header')
                @component('@.bootstrap.grid-left-right')
                    @slot('left', 'Guias de impresión')
                    @slot('right')
                    <a href="{{ route('guias.create', $transportadora) }}" class="btn btn-sm btn-primary">Nueva guía</a>
                    @endslot
                @endcomponent
            @endslot

            @slot('body')
            @component('@.bootstrap.table')
                @slot('thead', ['Nombre', 'Impresiónes (Intentos)'])
                @slot('tbody')
                @foreach($transportadora->guias->sortByDesc('id') as $guia)
                <tr>
                    <td>{{ $guia->nombre }}</td>
                    <td>{{ $guia->impresiones }}</td>
                    <td class="text-nowrap text-end">
                        <a href="{{ route('guias.edit', [$transportadora, $guia]) }}" class="btn btn-sm btn-outline-warning">e</a>
                    </td>
                </tr>
                @endforeach
                @endslot
            @endcomponent
            @endslot
            
        @endcomponent
    </div>

</div>
<br>

@component('@.bootstrap.card')
    @slot('header', 'Salidas recientes')

    @if( $salidas->count() > 0 )    
    @slot('body')

        @component('@.bootstrap.table')
            @slot('thead', ['Entrada'])
            @slot('tbody')
                @foreach($salidas as $salida)
                <tr>
                    <td>{{ $salida->entrada->numero }}</td>
                </tr>
                @endforeach
            @endslot
        @endcomponent

    @endslot
    @endif
    
@endcomponent

@endsection
