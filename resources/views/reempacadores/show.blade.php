@extends('app')
@section('content')

@component('components.header', [
    'title' => $reempacador->nombre,
    'subtitle' => 'Reempacador',
    'goback' => route('reempaque.index'),
])
@endcomponent

<div class="row">

    <!-- Column entradas -->
    <div class="col-sm d-flex flex-column">
        @component('components.card', [
            'classes' => 'flex-grow-1',
            'body_centered' => true,
        ])
            @slot('body')
            <div class="text-center">
                <p class="text-uppercase mb-1">Entradas</p>
                <a href="#!" class="display-4 text-decoration-none">{{ $entradas->count() }}</a>
            </div>
            @endslot
        @endcomponent
    </div>

    <!-- Column reempacados -->
    <div class="col-sm">
        @component('components.card', [
            'header_title' => 'Reempacados',
        ])
            @slot('body')
            @component('components.table', [
                'thead' => ['Código de reempacado', 'Entradas'],
                'hover' => false,
            ])
                @slot('tbody')
                @foreach($codigosr as $codigor)
                <tr>
                    <td>{{ $codigor->nombre }}</td>
                    <td>{{ $codigor->counter }}</td>
                </tr>
                @endforeach
                @endslot
            @endcomponent
            @endslot
        @endcomponent
    </div>
</div>

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
