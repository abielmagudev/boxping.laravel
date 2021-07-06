@extends('app')
@section('content')

@component('@.bootstrap.page-header', [
    'title' => $reempacador->nombre,
    'pretitle' => 'Reempacador',
    'goback' => route('reempacadores.index'),
])
@endcomponent

<div class="row">
    <!-- Column reempacados -->
    <div class="col-sm">
        @component('@.bootstrap.card')
            @slot('header')
            @component('@.bootstrap.grid-left-right')
                @slot('left')
                <span>Reempacados</span>
                @endslot
                
                @slot('right')
                <a href="#!" class="">
                    <span class="badge bg-primary text-white">{{ $entradas->count() }}</span>
                </a>
                @endslot
            @endcomponent
            @endslot

            @slot('body')
            @component('@.bootstrap.table', [
                'thead' => ['Código', 'Entradas'],
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

    <!-- Column reempacados -->
    <div class="col-sm col-sm-8">
        @component('@.bootstrap.card', [
            'header' => 'Entradas recientes'
        ])
            @slot('body')
            @component('@.partials.entradas-table', [
                'entradas' => $entradas
            ])
            @endcomponent
            
            @endslot
        @endcomponent
    </div>
</div>
<br>

@endsection
