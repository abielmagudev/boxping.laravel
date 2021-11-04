@extends('app')
@section('content')

@include('@.bootstrap.page-header', [
    'title' => $vehiculo->nombre,
    'pretitle' => 'Vehículo',
])

<div class="row">

    <!-- Column importaciones -->
    <div class="col-sm">
        @component('@.bootstrap.card', [
            'title' => 'Información'    
        ])
            @include('@.partials.grid-total-entradas.content', [
                'route' => route('entradas.index', ['vehiculo' => $vehiculo->id, 'filter' => csrf_token()]),
                'total' => $entradas->count(),
            ])
            <br>

            <p class="m-0 small text-muted">Contadores</p>
            @component('@.bootstrap.table', [
                'thead' => ['Conductor', 'Entradas']
            ])
                @foreach($conductores_counter as $conductor_id => $conductor)
                <?php $params = ['vehiculo' => $vehiculo->id, 'conductor' => $conductor_id, 'filter' => csrf_token()] ?>
                <tr>
                    <td>{{ $conductor->nombre }}</td>
                    <td class="text-end">
                        <a href="{{ route('entradas.index', $params) }}" class="link-primary text-decoration-none">{{ $conductor->entradas->count() }}</a>
                    </td>
                </tr>
                @endforeach
            @endcomponent
        @endcomponent
    </div>

    <!-- Column entradas -->
    <div class="col-sm col-sm-8">
        @component('@.bootstrap.card', [
            'title' => 'Entradas recientes',    
        ])
            @include('@.partials.table-entradas.content', [
                'entradas' => $entradas
            ])
        @endcomponent
    </div>
</div>
<br>

@endsection
