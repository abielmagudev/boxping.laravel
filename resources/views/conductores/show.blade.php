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
            <div class="d-flex justify-content-between">
                <div>
                    <small class="fw-bold">Total de entradas</small>
                </div>
                <div class="text-end">
                    <a href="<?= route('entradas.index', ['conductor' => $conductor->id, 'filtered_token' => csrf_token()]) ?>">{{ $entradas_total }}</a>
                </div>
            </div>
            <br>

            @component('@.bootstrap.table',[
                'thead' => ['Vehículo', 'Entradas']
            ])
                @foreach($vehiculos_counter as $vehiculo_id => $vehiculo)
                <?php $params = ['conductor' => $conductor->id, 'vehiculo' => $vehiculo_id, 'filtered_token' => csrf_token()] ?>
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
        @include('entradas.index.card', [
            'entradas' => $entradas,
            'title' => 'Entradas recientes',
            'except' => [
                'checkboxes',
                'options'
            ],
        ])
    </div>
</div>
<br>

@endsection
