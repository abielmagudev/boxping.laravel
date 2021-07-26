@extends('app')
@section('content')

@component('@.bootstrap.page-header', [
    'title' => $conductor->nombre,
    'pretitle' => 'Conductor',
    'goback' => route('conductores.index'),
])
@endcomponent

<div class="row">
    <!-- Column importados -->
    <div class="col-sm">
        @component('@.bootstrap.card')
            @slot('header')
            @component('@.bootstrap.grid-left-right')
                @slot('left')
                <span>Importados</span>
                @endslot

                @slot('right')
                <a href="{{ route('entradas.index', ['conductor' => $conductor->id, 'filter' => csrf_token()]) }}" class="btn btn-sm btn-primary py-0">{{ $entradas->count() }}</a>
                @endslot
            @endcomponent
            @endslot

            @slot('body')
            @component('@.bootstrap.table', [
                'borderless' => true
            ])
                @slot('thead', ['Vehículo', 'Entradas'])
                @slot('tbody')
                @foreach($vehiculos_counter as $vehiculo_id => $vehiculo)
                <?php $params = ['conductor' => $conductor->id, 'vehiculo' => $vehiculo_id, 'filter' => csrf_token()] ?>
                <tr>
                    <td>{{ $vehiculo->nombre }}</td>
                    <td>
                        <a href="{{ route('entradas.index', $params) }}">{{ $vehiculo->entradas->count() }}</a>
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
        @component('@.bootstrap.card')
            @slot('header', 'Entradas recientes')
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
