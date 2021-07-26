@extends('app')
@section('content')

@component('@.bootstrap.page-header', [
    'title' => $vehiculo->nombre,
    'pretitle' => 'Vehículo',
    'goback' => route('vehiculos.index'),
])
@endcomponent

<div class="row">

    <!-- Column importaciones -->
    <div class="col-sm">
        @component('@.bootstrap.card')
            @slot('header')
            @component('@.bootstrap.grid-left-right')
                @slot('left')
                <span>Importados</span>
                @endslot

                @slot('right')
                <a href="{{ route('entradas.index', ['vehiculo' => $vehiculo->id, 'filter' => csrf_token()]) }}" class="btn btn-sm btn-primary py-0">{{ $entradas->count() }}</a>
                @endslot
            @endcomponent
            @endslot

            @slot('body')
                @component('@.bootstrap.table', [
                    'borderless' => true
                ])
                    @slot('thead', ['Conductor', 'Entradas'])
                    @slot('tbody')
                    @foreach($conductores_counter as $conductor_id => $conductor)
                    <?php $params = ['vehiculo' => $vehiculo->id, 'conductor' => $conductor_id, 'filter' => csrf_token()] ?>
                    <tr>
                        <td>{{ $conductor->nombre }}</td>
                        <td>
                            <a href="{{ route('entradas.index', $params) }}">{{ $conductor->entradas->count() }}</a>
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
