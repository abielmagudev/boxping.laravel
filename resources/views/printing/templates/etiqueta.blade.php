<!-- Impresion de etiqueta - Inicio -->
<div class="mt-3" style="font-size:9pt;page-break-before:always">
    <table class="table table-sm table-bordered m-0 align-middle">
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

        <tbody>
            <!-- Salida -->
            <tr>
                <td class="table-light small px-2" style="width:1%" colspan="2">Salida</td>
            </tr>
            <tr>
                <td class="text-muted small px-2" style="width:1%">Transportadora</td>
                <td class="px-2">{{ $salida->transportadora_id ? $salida->transportadora->nombre : '' }}</td>
            </tr>
            <tr>
                <td class="text-muted small px-2" style="width:1%">Rastreo</td>
                <td class="px-2">{{ $salida->rastreo }}</td>
            </tr>
            <tr>
                <td class="text-muted small px-2" style="width:1%">Cobertura</td>
                <td class="px-2">{{ $salida->mostrar_cobertura }}</td>
            </tr>

            <!-- Destino -->
            <tr>
                <td class="table-light small px-2" style="width:1%" colspan="2">Destino</td>
            </tr>
            <tr>
                <td class="text-muted small px-2" style="width:1%">Destinatario</td>
                <td class="px-2">{{ $destinatario->nombre ?? '?' }}</td>
            </tr>
            <tr>
                <td class="text-muted small px-2" style="width:1%">Teléfono</td>
                <td class="px-2">{{ $destinatario->telefono ?? '?' }}</td>
            </tr>

            @if( $salida->cobertura === 'domicilio' )
            <tr>
                <td class="text-muted small px-2" style="width:1%">Dirección</td>
                <td class="px-2">{{ $destinatario->direccion ?? '?' }}</td>
            </tr>
            <tr>
                <td class="text-muted small px-2" style="width:1%">Postal</td>
                <td class="px-2">{{ $destinatario->codigo_postal ?? '?' }}</td>
            </tr>
            <tr>
                <td class="text-muted small px-2" style="width:1%">Localidad</td>
                <td class="px-2">{{ $destinatario->localidad ?? '?' }}</td>
            </tr>
            <tr>
                <td class="text-muted small px-2" style="width:1%">Referencias</td>
                <td class="px-2">{{ $destinatario->referencias ?? '?' }}</td>
            </tr>

            @else
            <tr>
                <td class="text-muted small px-2" style="width:1%">Dirección</td>
                <td class="px-2">{{ $salida->direccion ?? '?' }}</td>
            </tr>
            <tr>
                <td class="text-muted small px-2" style="width:1%">Postal</td>
                <td class="px-2">{{ $salida->postal ?? '?' }}</td>
            </tr>
            <tr>
                <td class="text-muted small px-2" style="width:1%">Localidad</td>
                <td class="px-2">{{ $salida->localidad ?? '?' }}</td>
            </tr>

            @endif

            <!-- Medidas -->
            <tr>
                <td class="table-light small px-2" style="width:1%" colspan="2">Medidas</td>
            </tr>
            @if( $ultima_etapa )
            <tr>
                <td class="text-muted small px-2" style="width:1%">Etapa</td>
                <td class="px-2">{{ $ultima_etapa->nombre ?? '?' }} / O{{ $ultima_etapa->orden }}</td>
            </tr>
            <tr>
                <td class="text-muted small px-2" style="width:1%">Peso</td>
                <td class="px-2">{{ $ultima_etapa->pivot->peso ?? '' }} {{ $ultima_etapa->pivot->medida_peso ?? '' }}</td>
            </tr>
            <tr>
                <td class="text-muted small px-2" style="width:1%">Ancho</td>
                <td class="px-2">{{ $ultima_etapa->pivot->ancho ?? '' }} {{ $ultima_etapa->pivot->medida_volumen ?? '' }}</td>
            </tr>
            <tr>
                <td class="text-muted small px-2" style="width:1%">Altura</td>
                <td class="px-2">{{ $ultima_etapa->pivot->altura ?? '' }} {{ $ultima_etapa->pivot->medida_volumen ?? '' }}</td>
            </tr>
            <tr>
                <td class="text-muted small px-2" style="width:1%">Largo</td>
                <td class="px-2">{{ $ultima_etapa->pivot->largo ?? '' }} {{ $ultima_etapa->pivot->medida_volumen ?? '' }}</td>
            </tr>

            @else
            <tr>
                <td class="text-center" colspan="2">Sin registro ni medidas</td>
            </tr>

            @endif
        </tbody>
    </table>
    <br>
    <p class="lead text-center">Código de barras o QR</p>
</div>
<!-- Impresion de etiqueta - Final -->
