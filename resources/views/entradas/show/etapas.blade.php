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
    @if( $entrada->hasEtapas() )

        @component('@.bootstrap.table', [
            'thead' => ['Nombre','Peso','','Ancho','Altura','Largo','','Zona']
        ])
            @foreach($entrada->etapas as $etapa)
            <tr>
                <td class="text-center text-nowrap">
                    @if(! $etapa->entrada_etapa->hasAlertas() )
                    <span>{{ $etapa->nombre }}</span>
                        
                    @else
                    <a 
                        class="btn btn-sm btn-outline-danger d-block" 
                        tabindex="0" 
                        title="<span class='text-danger text-uppercase'>Alertas</span>"
                        data-bs-toggle="popover" 
                        data-bs-placement="top" 
                        data-bs-trigger="focus" 
                        data-bs-container="body" 
                        data-bs-html="true" 
                        data-bs-content="<ul class='m-0 ps-3'><?= $etapa->entrada_etapa->lista_alertas_html ?></ul>"
                    >
                        {{ $etapa->nombre }}
                    </a>

                    @endif
                </td>

                @if( $etapa->hasTarea('peso') || $etapa->hasTarea('volumen') )
                <td>{{ $etapa->entrada_etapa->peso }}</td>
                <td>{{ $etapa->entrada_etapa->medicion_peso }}</td>
                <td>{{ $etapa->entrada_etapa->ancho }}</td>
                <td>{{ $etapa->entrada_etapa->altura }}</td>
                <td>{{ $etapa->entrada_etapa->largo }}</td>
                <td>{{ $etapa->entrada_etapa->medicion_volumen }}</td>

                @else
                <td colspan="6">
                    <p class="text-center p-1 m-0" style="background-color:rgba(0,0,0,0.04); color:rgba(0,0,0,0.2)">
                        <b>REGISTRADO</b>   
                    </p>
                </td>

                @endif

                <td class="text-nowrap">
                    <span>{{ $etapa->entrada_etapa->hasZona() ? $etapa->entrada_etapa->zona->nombre : '' }}</span>
                </td>
                <td class="text-end">
                    <a href="{{ route('entradas.etapas.edit', ['entrada' => $entrada, 'etapa' => $etapa]) }}" class="btn btn-outline-warning btn-sm">
                        {!! $graffiti->design('pencil-fill')->draw('svg') !!}
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
