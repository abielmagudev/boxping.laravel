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
                <a href="{{ route('entradas.index', ['reempacador' => $reempacador->id, 'filter' => csrf_token()]) }}" class="btn btn-sm btn-primary py-0">{{ $entradas->count() }}</a>
                @endslot
            @endcomponent
            @endslot

            @slot('body')
            @component('@.bootstrap.table', [
                'thead' => ['Código', 'Entradas'],
            ])
                @slot('tbody')
                @foreach($codigosr_counter as $codigor)
                <?php $params = ['reempacador' => $reempacador->id, 'codigor' => $codigor->id, 'filter' => csrf_token()] ?>
                <tr>
                    <td>{{ $codigor->nombre }}</td>
                    <td>
                        <a href="{{ route('entradas.index', $params) }}">{{ $codigor->entradas->count() }}</a>
                    </td>
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
