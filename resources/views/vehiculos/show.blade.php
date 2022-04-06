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
            <div class="d-flex justify-content-between">
                <div>
                    <small class="fw-bold">Total de entradas</small>
                </div>
                <div class="text-end">
                    <a href="<?= route('entradas.index', ['vehiculo' => $vehiculo->id, 'filtered_token' => csrf_token()]) ?>">{{ $entradas_total }}</a>
                </div>
            </div>
            <br>

            @component('@.bootstrap.table', [
                'thead' => ['Conductor', 'Entradas']
            ])
                @foreach($conductores_counter as $conductor_id => $conductor)
                <?php $params = ['vehiculo' => $vehiculo->id, 'conductor' => $conductor_id, 'filtered_token' => csrf_token()] ?>
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
        @include('entradas.index.card', [
            'title' => 'Entradas recientes',
            'entradas' => $entradas,
            'except' => [
                'checkboxes',
                'options',
            ],
        ])
    </div>
</div>
<br>

@endsection
