@component('@.bootstrap.card', [
    'title' => 'Etapas',
    'counter' => $entrada->etapas->count(),
])
    <!-- Options -->
    @slot('options')
    <a href="{{ route('entradas.etapas.create', $entrada) }}" class="btn btn-sm btn-primary">
        <span class="fw-bold">+</span>
    </a>
    @endslot
    
    <!-- Body -->
    @if( $entrada->hasEtapas() )

        @component('@.bootstrap.table')
            @slot('thead')
                <th class="small">Nombre</th>
                <th class="small">Pesáje</th>
                <th class="small">Volúmen <span class="fw-normal">(largo/ancho/alto)</span></th>
                <th class="small">Zona</th>
                <th class="small"></th>
            @endslot

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
                <td class="text-nowrap">
                    <span>{{ $etapa->entrada_etapa->peso }}</span>
                    <span>{{ $etapa->entrada_etapa->medicion_peso }}</span>
                </td>
                <td class="text-nowrap">
                    <span>{{ $etapa->entrada_etapa->largo }}</span>
                    <span class="text-muted">/</span>
                    <span>{{ $etapa->entrada_etapa->ancho }} </span>
                    <span class="text-muted">/</span>
                    <span>{{ $etapa->entrada_etapa->alto }} </span>
                    <span>{{ $etapa->entrada_etapa->medicion_volumen }}</span>
                </td>

                @else
                <td colspan="2">
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
                        {!! $graffiti->design('pencil-fill')->cache('svg') !!}
                    </a>
                </td>
            </tr>
            @endforeach
        @endcomponent

    @else
        <p class="text-center text-muted">Sin etapas en este momento.</p>

    @endif

@endcomponent
