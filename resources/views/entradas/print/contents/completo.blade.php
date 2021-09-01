<!-- Informacion -->
<div class="mt-3" style="font-size:9pt;page-break-before:always">
    <table class="table table-sm table-bordered m-0 align-middle">
        <!-- App & Entrada -->
        <tbody>
            <tr class="table-dark">
                <td class="fw-bold text-white px-2" colspan="9">
                    <div class="d-flex align-items-middle justify-content-between">
                        <div>BOXPING | {{ config('app.name') }}</div>
                        <div>Información</div>
                    </div>
                </td>
            </tr>
        </tbody>

        <!-- Entrada -->
        <tbody>
            <tr>
                <td class="bg-light fw-bold px-2" colspan="2">Entrada</td>
            </tr>
            <tr>
                <td class="text-muted small px-2" style="width:15%">Número</td>
                <td class="px-2">{{ $entrada->numero }}</td>
            </tr>
            <tr>
                <td class="text-muted small px-2" style="width:15%">Consolidado</td>
                <td class="px-2">{{ $consolidado->numero ?? 'Sin consolidar' }}</td>
            </tr>
            <tr>
                <td class="text-muted small px-2" style="width:15%">Cliente</td>
                <td class="px-2">{{ $cliente->id ? $cliente->nombre_con_alias : '' }}</td>
            </tr>
            <tr>
                <td class="text-muted small px-2" style="width:15%">Contenido</td>
                <td class="px-2">{{ $entrada->contenido ?? 'Desconocido' }}</td>
            </tr>
            <tr>
                <td class="text-muted small px-2" style="width:15%">Creado</td>
                <td class="px-2">{{ $entrada->created_at }}, {{ $entrada->creator->name }}</td>
            </tr>
            <tr>
                <td class="text-muted small px-2" style="width:15%">Actualizado</td>
                <td class="px-2">{{ $entrada->updated_at }}, {{ $entrada->updater->name }}</td>
            </tr>
        </tbody>
    </table>

    <!-- Remitente y Destinatario -->
    <table class="table table-sm table-bordered m-0 align-middle">
        <tbody>
            <tr>
                <td class="bg-light fw-bold px-2" colspan="2">Remitente</td>
                <td class="bg-light fw-bold px-2" colspan="2">Destinatario</td>
            </tr>
            <tr>
                <td class="text-muted small px-2" style="width:15%">Nombre</td>
                <td class="px-2" style="width:35%">{{ $remitente->nombre ?? '' }}</td>
                <td class="text-muted small px-2" style="width:15%">Nombre</td>
                <td class="px-2">{{ $destinatario->nombre ?? '' }}</td>
            </tr>
            <tr>
                <td class="text-muted small px-2 text-nowrap" style="width:15%">Dirección</td>
                <td class="px-2" style="width:35%">
                    <span class="d-block">{{ $remitente->direccion }}</span>
                <td class="text-muted small px-2" style="width:15%">Dirección</td>
                <td class="px-2">
                    <span class="d-block">{{ $destinatario->direccion }} </span>
                </td>
            </tr>
            <tr>
                <td class="text-muted small px-2 text-nowrap" style="width:15%">Postal</td>
                <td class="px-2" style="width:35%">
                    <span>{{ $remitente->postal }}</span>
                <td class="text-muted small px-2" style="width:15%">Postal</td>
                <td class="px-2">
                    <span>{{ $destinatario->postal }}</span>
                </td>
            </tr>
            <tr>
                <td class="text-muted small px-2" style="width:15%">Localidad</td>
                <td class="small px-2" style="width:35%">{{ $remitente->localidad ?? '' }}</td>
                <td class="text-muted small px-2" style="width:15%">Localidad</td>
                <td class="px-2">{{ $destinatario->localidad ?? '' }}</td>
            </tr>
            <tr>
                <td class="text-muted small px-2" style="width:15%" rowspan="2">Teléfono</td>
                <td class="small px-2" style="width:35%" rowspan="2">{{ $remitente->telefono ?? '' }}</td>
                <td class="text-muted small px-2" style="width:15%">Referencias</td>
                <td class="small px-2">{{ $destinatario->referencias ?? '' }}</td>
            </tr>
            <tr>
                <td class="text-muted small px-2" style="width:15%">Teléfono</td>
                <td class="px-2">{{ $destinatario->telefono ?? '' }}</td>
            </tr>
        </tbody>
    </table>

    <!-- Importacion y Reempaque -->
    <table class="table table-sm table-bordered m-0 align-middle">
        <tbody>
            <tr>
                <td class="bg-light fw-bold px-2" colspan="2">Importación</td>
                <td class="bg-light fw-bold px-2" colspan="2">Reempaque</td>
            </tr>
            <tr>
                <td class="text-muted small px-2" style="width:15%">Conductor</td>
                <td class="px-2" style="width:35%">{{ $conductor->nombre ?? '' }}</td>
                <td class="text-muted small px-2" style="width:15%">Reempacador</td>
                <td class="px-2">{{ $reempacador->nombre ?? '' }}</td>
            </tr>
            <tr>
                <td class="text-muted small px-2" style="width:15%">Vehículo</td>
                <td class="px-2" style="width:35%">{{ $vehiculo->alias ?? '' }}</td>
                <td class="text-muted small px-2" style="width:15%">Código</td>
                <td class="px-2">{{ $codigor->nombre ?? '' }}</td>
            </tr>
            <tr>
                <td class="text-muted small px-2 text-nowrap align-top" style="width:15%">No de cruce</td>
                <td class="px-2 align-top" style="width:35%">{{ $entrada->numero_cruce }}</td>
                <td class="text-muted small px-2 align-top" style="width:15%">Descripción</td>
                <td class="small px-2 align-top">{{ $vehiculo->descripcion ?? '' }}</td>
            </tr>
            <tr>
                <td class="text-muted small px-2" style="width:15%">Horario</td>
                <td class="px-2" style="width:35%">{{ $entrada->importado_at }}</td>
                <td class="text-muted small px-2" style="width:15%">Horario</td>
                <td class="px-2">{{ $entrada->reempacado_at ?? 'Sin horario' }}</td>
            </tr>
        </tbody>
    </table>
        
    <!-- Salida -->
    <table class="table table-sm table-bordered m-0 align-middle">
        <tbody>
            <tr>
                <td class="bg-light fw-bold px-2" colspan="2">Salida</td>
            </tr>
            <tr>
                <td class="text-muted small px-2" style="width:15%">Status</td>
                <td class="px-2">{{ $salida->mostrar_status ?? '' }}</td>
            </tr>
            <tr>
                <td class="text-muted small px-2" style="width:15%">Incidentes</td>
                <td class="small px-2">
                    @if( $salida->incidentes->count() )
                        @foreach($salida->incidentes as $incidente)
                        <span>{{ $incidente->titulo }}</span> 
                        @if(! $loop->last )
                        <span class="mx-1">/</span>
                        @endif
                        @endforeach
                    @endif
                </td>
            </tr>
            <tr>
                <td class="text-muted small px-2 text-nowrap" style="width:15%">Transportadora</td>
                <td class="px-2">{{ $salida->transportadora->nombre ?? '' }}</td>
            </tr>
            <tr>
                <td class="text-muted small px-2" style="width:15%">Rastreo</td>
                <td class="px-2">{{ $salida->rastreo }}</td>
            </tr>
            <tr>
                <td class="text-muted small px-2" style="width:15%">Confirmación</td>
                <td class="px-2">{{ $salida->confirmacion }}</td>
            </tr>
            <tr>
                <td class="text-muted small px-2" style="width:15%">Cobertura</td>
                <td class="px-2">
                    <span class="d-block">{{ $salida->mostrar_cobertura }}</span>
                    @if( $salida->cobertura === 'ocurre' )
                    <span class="d-block">{{ $salida->direccion }}, Postal {{ $salida->postal }}, {{ $salida->localidad }}</span>
                    @endif
                </td>
            </tr>
            <tr>
                <td class="text-muted small px-2" style="width:15%">Notas</td>
                <td class="px-2">{{ $salida->notas }}</td>
            </tr>
            <tr>
                <td class="text-muted small px-2" style="width:15%">Actualizado</td>
                <td class="px-2">
                    @if( $salida->updater )
                    {{ "{$salida->updated_at}, {$salida->updater->name}" ?? '?' }}
                    @endif
                </td>
            </tr>
        </tbody>
    </table>
</div>
<!-- Impresion de informacion - Final -->
