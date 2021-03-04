@extends('app')
@section('content')

@component('components.header', [
    'title' => $codigor->nombre,
    'subtitle' => 'Código de reempacado',
    'goback' => route('codigosr.index'),
])
@endcomponent

<div class="row">
    <!-- Column descripcion -->
    <div class="col-sm">
        @component('components.card', [
            'classes' => 'h-100',
            'header_title' => 'Descripción',
        ])
            @slot('body')
            <p>{{ $codigor->descripcion }}</p>
            @endslot
        @endcomponent
    </div>
    <!-- Column entradas -->
    <div class="col-sm">
        @component('components.card', [
            'classes' => 'h-100 d-flex flex-column',
            'body_centered' => true
        ])
            @slot('body')
            <div class="text-center">
                <p class="mb-1">Entradas</p>
                <a href="#!" class="display-4 text-decoration-none">{{ $entradas->count() }}</a>
            </div>
            @endslot
        @endcomponent
    </div>
    <!-- Column resumen -->
    <div class="col-sm">
        @component('components.card', [
            'classes' => 'h-100',
            'header_title' => 'Resúmen',
        ])
            @slot('body')
            @component('components.table', [
                'hover' => false,
                'thead' => ['Reempacador','Entradas'],
            ])
                @slot('tbody')
                @foreach($reempacadores as $id => $reempacador)
                <tr>
                    <td>{{ $reempacador->nombre }}</td>
                    <td>{{ $reempacador->counter }}</td>
                </tr>
                @endforeach
                @endslot
            @endcomponent
            @endslot
        @endcomponent
    </div>
</div>
<br>

@component('components.card', [
    'header_title' => 'Últimas entradas'
])
    @slot('body')
    @component('partials.table-summary-entradas', [
        'entradas' => $entradas
    ])
    @endcomponent
    @endslot
@endcomponent
@endsection
