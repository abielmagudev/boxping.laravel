@component('@.bootstrap.card', [
    'title' => 'Etapas',
    'counter' => $entrada->etapas->count(),
])
    <!-- Options -->
    @slot('options')
    <a href="{{ route('entradas.etapas.add', $entrada) }}" class="btn btn-sm btn-primary">
        <span class="fw-bold">+</span>
    </a>
    @endslot
    
    <!-- Body -->
    @if( $entrada->etapas->count() )

        @component('@.bootstrap.table', [
            'thead' => ['Nombre','Peso','','Ancho','Altura','Largo','','Zona','Alertas']
        ])
            @foreach($entrada->etapas as $etapa)
            <tr>
                <td class="">{{ $etapa->nombre }}</td>

                @if( $etapa->hasTarea('peso') || $etapa->hasTarea('volumen') )
                <td class="">{{ $etapa->entrada_etapa->peso }}</td>
                <td class="text-capitalize">{{ $etapa->entrada_etapa->nombre_medicion_peso }}</td>
                <td class="">{{ $etapa->entrada_etapa->ancho }}</td>
                <td class="">{{ $etapa->entrada_etapa->altura }}</td>
                <td class="">{{ $etapa->entrada_etapa->largo }}</td>
                <td class="text-capitalize">{{ $etapa->entrada_etapa->nombre_medicion_volumen }}</td>

                @else
                <td class="" colspan="6">
                    <p class="text-center p-1 m-0" style="background-color:rgba(0,0,0,0.04); color:rgba(0,0,0,0.2)">
                        <b>REGISTRADO</b>   
                    </p>
                </td>

                @endif

                <td class="">
                    <span>{{ $etapa->entrada_etapa->hasZona() ? $etapa->entrada_etapa->zona->nombre : '' }}</span>
                </td>
                <td class="text-center">
                    @foreach($etapa->entrada_etapa->alertas() as $alerta)
                    <span style="color:<?= $alerta->color ?>" title="{{ $alerta->nombre }}" data-bs-toggle="tooltip" data-bs-placement="top">
                        @include('@.bootstrap.icon', ['icon' => 'circle'])
                    </span>
                    @endforeach
                </td>
                <td class="text-end">
                    <a href="{{ route('entradas.etapas.edit', ['entrada' => $entrada, 'etapa' => $etapa]) }}" class="btn btn-outline-warning btn-sm">
                        @include('@.bootstrap.icon', ['icon' => 'pencil'])
                    </a>
                </td>
            </tr>
            @endforeach
        @endcomponent

    @else
        <p class="text-center text-muted m-0">Sin etapas</p>

    @endif

@endcomponent
<br>
