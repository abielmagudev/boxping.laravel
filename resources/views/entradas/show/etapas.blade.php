@component('components.card')
    @slot('header_title', 'Etapas')
    @slot('header_options')
    <a href="{{ route('entrada.etapas.create', $entrada) }}" class="btn btn-sm btn-primary">
        <span>Agregar etapa</span>
    </a>
    @endslot

    @slot('body')

    @if( $entrada->etapas->count() )
    @component('components.table', [
        'thead' => ['Nombre','Peso','Medida','Ancho','Altura','Largo','Medida','Zona','Alertas',''],
    ])
        
        @slot('tbody')
        @foreach($entrada->etapas as $etapa)
        <tr>
            <td class="">{{ $etapa->nombre }}</td>

            @if( $etapa->realiza_medicion && $etapa->pivot->peso )
            <td class="">{{ $etapa->pivot->peso }}</td>
            <td class="text-capitalize">{{ $etapa->pivot->medida_peso }}</td>
            <td class="">{{ $etapa->pivot->ancho }}</td>
            <td class="">{{ $etapa->pivot->altura }}</td>
            <td class="">{{ $etapa->pivot->largo }}</td>
            <td class="text-capitalize">{{ $etapa->pivot->medida_volumen }}</td>

            @else
            <td class="" colspan="6">
                <p class="text-center p-1 m-0" style="background-color:rgba(0,0,0,0.04)">
                    <b>REGISTRADO</b>   
                </p>
            </td>

            @endif

            <td class="">
                @if( $etapa->pivot->zona )
                <span>{{ $etapa->pivot->zona->nombre }}</span>
                @endif
            </td>
            <td class="text-center">
            @if( $etapa_alertas = $etapa->pivot->alertas() )
                @foreach($etapa_alertas as $alerta)
                <span style="color:{{ $config_alertas[$alerta->nivel]['color'] }}" title="{{ $alerta->nombre }}" data-bs-toggle="tooltip" data-bs-placement="top">
                    {!! $symbols->circle !!}
                </span>
                @endforeach
            @endif
            </td>
            <td class="text-end">
                <a href="{{ route('entrada.etapas.edit', ['entrada' => $entrada, 'etapa' => $etapa]) }}" class="btn btn-warning btn-sm">
                    <span>{!! $icons->pencil !!}</span>
                </a>
            </td>
        </tr>
        @endforeach
        @endslot

    @endcomponent

    @else
    <p class="lead text-muted text-center">En espera de etapas</p>
    
    @endif

    @endslot
@endcomponent
