<!-- Impresion de etapas - Inicio -->
<div class="mt-3" style="font-size:9pt;page-break-before:always">
    <table class="table table-sm table-bordered xtable-striped align-middle m-0">
        <!-- App & Entrada -->
        <tbody>
            <tr class="table-dark">
                <td class="fw-bold text-white px-2" colspan="9">
                    <div class="d-flex align-items-middle justify-content-between">
                        <div>BOXPING | {{ config('app.name') }}</div>
                        <div>{{ $entrada->numero }}</div>
                    </div>
                </td>
            </tr>
        </tbody>

        <!-- Etapas -->
        <tbody>
            <tr>
                <td class="bg-light fw-bold px-2" colspan="9">Etapas</td>
            </tr>

            @if( $etapas->count() )
            <tr class="text-muted">
                <td class="px-2">Nombre</td>
                <td class="px-2">Peso</td>
                <td class="px-2 text-nowrap">Medida de peso</td>
                <td class="px-2">Ancho</td>
                <td class="px-2">Altura</td>
                <td class="px-2">Largo</td>
                <td class="px-2 text-nowrap">Medida de volúmen</td>
                <td class="px-2">Zona</td>
                <td class="px-2">Alertas</td>
            </tr>

            @foreach($etapas as $etapa)
            <tr>
                <td class="px-2 text-nowrap">{{ $etapa->nombre }}</td>

                @if( $etapa->realiza_medicion )
                <td class="px-2">{{ $etapa->entrada_etapa->peso }}</td>
                <td class="px-2 text-capitalize">{{ $etapa->entrada_etapa->medida_peso }}</td>
                <td class="px-2">{{ $etapa->entrada_etapa->ancho }}</td>
                <td class="px-2">{{ $etapa->entrada_etapa->altura }}</td>
                <td class="px-2">{{ $etapa->entrada_etapa->largo }}</td>
                <td class="px-2 text-capitalize">{{ $etapa->entrada_etapa->medida_volumen }}</td>

                @else
                <td class="px-2 text-center" colspan="6">REGISTRADO</td>

                @endif

                <td class="px-2">
                    @if( $etapa->entrada_etapa->hasZona() )
                    {{ $etapa->entrada_etapa->zona->nombre }}
                    @endif
                </td>
                <td class="px-2 text-nowrap">
                    {{ $etapa->entrada_etapa->alertas()->count() }}
                    <?php /*
                    @if( $etapa_alertas = $etapa->pivot->alertas() )
                    <ul class="px-3 m-0">               
                        @foreach($etapa_alertas as $alerta)
                        <li>{!! $alerta->nombre !!}</li>
                        @endforeach
                    </ul>
                    @endif */ ?>
                </td>
            </tr>
            @endforeach

            @else
            <tr>
                <td class="text-center">SIN REGISTRO DE ETAPAS</td>
            </tr>

            @endif

        </tbody>
    </table>
</div>
<!-- Impresion de etapas - Final -->
