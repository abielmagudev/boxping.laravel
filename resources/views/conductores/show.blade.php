@extends('app')
@section('content')

@include('@.bootstrap.page-header', [
    'title' => $conductor->nombre,
    'pretitle' => 'Conductor',
])

<div class="row">
    <!-- Column informacion -->
    <div class="col-sm">
        @component('@.bootstrap.card', [
            'title' => 'Información',
        ])
            <p class="m-0">
                <small class="text-muted">Total</small>
            </p>
            @component('@.bootstrap.table')
                <tr>
                    <td>Entradas</td>
                    <td class="text-end">
                        <a href="{{ route('entradas.index', ['conductor' => $conductor->id, 'filter' => csrf_token()]) }}" class="link-primary text-decoration-none">{{ $entradas->count() }}</a>
                    </td>
                </tr>
            @endcomponent

            <p class="m-0">
                <small class="text-muted">Contadores</small>
            </p>
            @component('@.bootstrap.table',[
                'thead' => ['Vehículo', 'Entradas']
            ])
                @foreach($vehiculos_counter as $vehiculo_id => $vehiculo)
                <?php $params = ['conductor' => $conductor->id, 'vehiculo' => $vehiculo_id, 'filter' => csrf_token()] ?>
                <tr>
                    <td>{{ $vehiculo->nombre }}</td>
                    <td class="text-end">
                        <a href="{{ route('entradas.index', $params) }}" class="text-decoration-none link-primary">{{ $vehiculo->entradas->count() }}</a>
                    </td>
                </tr>
                @endforeach
            @endcomponent
        @endcomponent
    </div>

    <!-- Column entradas -->
    <div class="col-sm col-sm-8">
        @component('@.bootstrap.card', [
            'title' => 'Últimas entradas'
        ])
            @include('@.partials.table-entradas.content', [
                'entradas' => $entradas
            ])
        @endcomponent
    </div>
</div>
<br>

@endsection
