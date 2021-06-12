@extends('app')
@section('content')

@component('@.bootstrap.header', [
    'title' => $vehiculo->alias,
    'pretitle' => 'Vehículo',
    'goback' => route('vehiculos.index'),
])
@endcomponent

<div class="row">

    <!-- Column importaciones -->
    <div class="col-sm">
        @component('@.bootstrap.card-headers')
            @slot('header_left', 'Importados')
            @slot('header_right')
            <a href="#!">
                <span class="badge bg-primary text-white">{{ $entradas->count() }}</span>
            </a>
            @endslot

            @slot('body')
                @component('@.bootstrap.table', [
                    'borderless' => true
                ])
                    @slot('thead', ['Conductores', 'Entradas'])
                    @slot('tbody')
                    @foreach($conductores as $id => $conductor)
                    <tr>
                        <td>{{ $conductor['nombre'] }}</td>
                        <td>{{ $conductor['cruces'] }}</td>
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
                @component('@.partials.table-entradas', [
                    'entradas' => $entradas
                ])
                @endcomponent  
            @endslot
        @endcomponent
    </div>
</div>
<br>

@endsection
