<?php

$display_filters_settings = (object) [
    'attributes' => [
        'numero' => 'Número',
        'ambito' => 'Ámbito',
    ],
    'relations' => [
        'cliente' => 'Cliente',
        'etapa' => 'Etapa',
    ],
    'timestamps' => [
        'creado' => 'Creado',
        'actualizado' => 'Actualizado',
        'confirmado' => 'Confirmado',
        'importado' => 'Importado',
        'reempacado' => 'Reempacado',
    ],
];

?>
<div class="alert alert-info" role="alert">
    <p class="alert-heading fw-bold">Filtrado de entradas</p>
    <div class="row small">
        <div class="col-sm" id="filtrado-atributos">
            <ul>
                @if( request()->filled('numero') )
                <li>{{ ucfirst(request('comodin')) }} del número: {{ request('numero') }}</li> 

                @else
                <li>Número: Cualquier</li> 

                @endif

                @if( request()->filled('ambito') )
                <li>Ámbito: {{ ucfirst( request('ambito') ) }}</li> 
                @endif
            </ul>
        </div>
        <div class="col-sm" id="filtrado-relaciones">
            <ul>
                @if( request()->filled('cliente') )
                <?php $cliente = $clientes->firstWhere('id', request('cliente')) ?>
                <li>Cliente: {{ $cliente ? $cliente->nombre . "({$cliente->alias})" : 'Cualquier' }}</li> 
                @endif
    
                @if( request()->filled('etapa') )
                <?php $etapa = $etapas->firstWhere('id', request('etapa')) ?>
                <li>Etapa: {{ $etapa->nombre ?? 'Cualquier' }}</li> 
                @endif
            </ul>
        </div>
        <div class="col-sm" id="filtrado-tiempos">
            <ul>
                @if( request()->filled('tiempo') )
                <li>Tiempo: {{ ucfirst(request('tiempo')) }}</li> 
                
                @if( request('tiempo') <> 'cualquier' )
                <li>Desde: {{ request('desde_fecha') }} | {{ request('desde_hora') }}</li>
                <li>Hasta: {{ request('hasta_fecha') }} | {{ request('hasta_hora') }}</li>
                @endif

                @endif
            </ul>
        </div>
    </div>
    <p class="text- small m-0">
        <span>Resultados por página:</span>
        <b>{{ request()->filled('mostrar_completo') ? 'Completo' : request('mostrar') }}</b>
    </p>
</div>
