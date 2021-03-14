@if( $etapas->count() )
<!-- Impresion de etapas - Inicio -->
<div class="mt-3" style="font-size:9pt;page-break-before:always">
    <table class="table table-sm table-bordered align-middle">
        <tbody>
            <tr class="table-dark">
                <td class="fw-bold text-white px-2" colspan="9">BOXPING | COMPANY NAME</td>
            </tr>
            <tr class="table-light">
                <td class="small px-2" colspan="9">Entrada: {{ $entrada->numero }}</td>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <td class="bg-light fw-bold px-2" colspan="9">Etapas</td>
            </tr>
            <tr>
                <td class="text-muted small px-2">Nombre</td>
                <td class="text-muted small px-2">Peso</td>
                <td class="text-muted small px-2">Medida de peso</td>
                <td class="text-muted small px-2">Ancho</td>
                <td class="text-muted small px-2">Altura</td>
                <td class="text-muted small px-2">Largo</td>
                <td class="text-muted small px-2">Medida de volúmen</td>
                <td class="text-muted small px-2">Zona</td>
                <td class="text-muted small px-2">Alertas</td>
            </tr>
            @foreach($etapas as $etapa)
            <tr>
                <td class="small px-2">{{ $etapa->nombre }}</td>

                @if( $etapa->realiza_medicion && $etapa->pivot->peso )
                <td class="small px-2">{{ $etapa->pivot->peso }}</td>
                <td class="small px-2">{{ $etapa->pivot->medida_peso }}</td>
                <td class="small px-2">{{ $etapa->pivot->ancho }}</td>
                <td class="small px-2">{{ $etapa->pivot->altura }}</td>
                <td class="small px-2">{{ $etapa->pivot->largo }}</td>
                <td class="small px-2">{{ $etapa->pivot->medida_volumen }}</td>

                @else
                <td class="small px-2 text-center" colspan="6">REGISTRADO</td>

                @endif

                <td class="small px-2">
                    @if( $etapa->pivot->zona )
                    {{ $etapa->pivot->zona->nombre }}
                    @endif
                </td>
                <td class="small px-2">
                    @if( $etapa_alertas = $etapa->pivot->alertas() )
                    <ul class="px-3 m-0">               
                        @foreach($etapa_alertas as $alerta)
                        <li>{!! $alerta->nombre !!}</li>
                        @endforeach
                    </ul>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<!-- Impresion de etapas - Final -->
@endif