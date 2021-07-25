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
                <?php $params = ['vehiculo' => $vehiculo->id, 'filter' => csrf_token()] ?>
                <a href="{{ route('entradas.index', $params) }}" class="badge bg-primary ">
                    <span class="text-white">{{ $entradas->count() }}</span>
                </a>
                @endslot
            @endcomponent
            @endslot

            @slot('body')
                @component('@.bootstrap.table', [
                    'borderless' => true
                ])
                    @slot('thead', ['Conductores', 'Entradas'])
                    @slot('tbody')
                    @foreach($conductores_counter as $conductor_id => $conductor)
                    <?php $params = ['conductor' => $conductor_id, 'filter' => csrf_token()] ?>

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
