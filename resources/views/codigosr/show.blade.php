@extends('app')
@section('content')

@component('@.bootstrap.page-header', [
    'pretitle' => 'Código de reempacado',
    'title' => $codigor->nombre,
    'goback' => route('codigosr.index'),
])
@endcomponent

@if( $codigor->haveDescription() )
<p><em>{{ $codigor->descripcion }}</em></p>
<br>
@endif

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
                <a href="{{ route('entradas.index', ['codigor' => $codigor->id, 'filter' => csrf_token()]) }}" class="btn btn-sm btn-primary py-0">{{ $entradas->count() }}</a>
                @endslot
            @endcomponent
            @endslot

            @slot('body')
                @component('@.bootstrap.table', [
                    'borderless' => true
                ])
                    @slot('thead', ['Reempacador', 'Entradas'])
                    @slot('tbody')
                    @foreach($reempacadores_counter as $reempacador_id => $reempacador)
                    <?php $params = ['codigor' => $codigor->id, 'reempacador' => $reempacador_id, 'filter' => csrf_token()] ?>
                    <tr>
                        <td>{{ $reempacador->nombre }}</td>
                        <td>
                            <a href="{{ route('entradas.index', $params) }}">{{ $reempacador->entradas->count() }}</a>
                        </td>
                    </tr>
                    @endforeach
                    @endslot
                @endcomponent
            @endslot
        @endcomponent
    </div>

    <!-- Column entradas -->
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
