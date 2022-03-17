@extends('app')
@section('content')

@include('@.bootstrap.page-header', [
    'title' => $consolidado->numero,
    'pretitle' => 'Consolidado',
])

<div class="row">
    <!-- Column informacion -->
    <div class="col-sm">
        @component('@.bootstrap.card', [
            'title' => 'Información'    
        ])
            @slot('options')
            <a href="{{ route('consolidados.print', $consolidado) }}" class="btn btn-sm btn-primary">
                {!! $graffiti->design('printer-fill')->svg() !!}
            </a>
            @endslot

            @component('@.bootstrap.table')
                <tr class="text-capitalize">
                    <td class="text-muted small" style="width:1%">Status</td>
                    <td class="text-uppercase">
                        <span class="badge <?= $consolidado->status == 'abierto' ? 'text-dark' : 'text-white' ?>" style="background-color:<?= $consolidado->status_color ?>">{{ $consolidado->status }}</span>
                    </td>
                </tr>
                <tr>
                    <td class="text-muted small">Cliente</td>
                    <td>{{ $consolidado->cliente_id ? "{$consolidado->cliente->nombre} ({$consolidado->cliente->alias})" : 'Ninguno' }}</td>
                </tr>
                <tr class="">
                    <td class="text-muted small">Tarimas</td>
                    <td>{{ $consolidado->tarimas }}</td>
                </tr>
                <tr class="">
                    <td class="text-muted small">Entradas</td>
                    <td>{{ $consolidado->entradas->count() }}</td>
                </tr>
                <tr class="border-0">
                    <td class="text-muted small border-0">Notas</td>
                    <td class="border-0">{{ $consolidado->notas }}</td>
                </tr>
            @endcomponent
        @endcomponent
    </div>

    <!-- Column graficas -->
    <div class="col-sm"> 
        @component('@.bootstrap.card', [
            'title' => 'Gráficas',    
        ])
            <?php
            $includes = [
                'confirmado_by' => 'Confirmados', 
                'importado_fecha' => 'Importados', 
                'codigor_id' => 'Reempacados', 
                'destinatario_id' => 'Destinados',
                'contenido' => 'Contenidos',
            ];
            ?>

            @foreach($includes as $column => $title)  
            @include('@.bootstrap.progress-bar', [
                'color' => 'bg-primary', 
                'text' => $title, 
                'label' => subtraction($consolidado->entradas->count(), $consolidado->entradas->whereNull($column)->count()),
                'value' => percentage($consolidado->entradas->count(), $consolidado->entradas->whereNotNull($column)->count()), 
            ])
            @endforeach
        @endcomponent
    </div>
</div>
<br>

@include('entradas.index.card', [
    'entradas' => $entradas,
    'cache' => [
        'consolidado' => $consolidado,
        'cliente' => $consolidado->cliente,
    ],
    'except' => [
        'filters' => ['ambitos', 'clientes'],
        'actions' => $consolidado->hasCerrado() ? ['create', 'import'] : [],
    ],
])

@endsection
