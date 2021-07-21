@component('@.bootstrap.table', [
    'thead' => ['Nombre','Peso','Medida','Ancho','Altura','Largo','Medida','Zona','Alertas'],
])
@slot('tbody')
    @foreach($entrada->etapas as $etapa)
    <tr>
        <td class="">{{ $etapa->nombre }}</td>

        @if( $etapa->realiza_medicion )
        <td class="">{{ $etapa->entrada_etapa->peso }}</td>
        <td class="text-capitalize">{{ $etapa->entrada_etapa->medida_peso }}</td>
        <td class="">{{ $etapa->entrada_etapa->ancho }}</td>
        <td class="">{{ $etapa->entrada_etapa->altura }}</td>
        <td class="">{{ $etapa->entrada_etapa->largo }}</td>
        <td class="text-capitalize">{{ $etapa->entrada_etapa->medida_volumen }}</td>

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
            <span style="color:{{ $alerta->color }}" title="{{ $alerta->nombre }}" data-bs-toggle="tooltip" data-bs-placement="top">
                {!! $symbols->circle !!}
            </span>
            @endforeach
        </td>
        <td class="text-end">
            <a href="{{ route('entrada.etapas.edit', ['entrada' => $entrada, 'etapa' => $etapa]) }}" class="btn btn-outline-warning btn-sm">
                <span>{!! $svg->pencil !!}</span>
            </a>
        </td>
    </tr>
    @endforeach
@endslot
@endcomponent
