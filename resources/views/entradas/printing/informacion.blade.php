@extends('printing')
@section('content')
<br>

<!-- Inicio -->
<div class="" style="font-size:9pt">

    <table class="table table-sm table-bordered m-0 align-middle">
        <!-- App  -->
        <tbody>
            <tr class="table-dark">
                <td class="fw-bold text-white px-2" colspan="2">BOXPING | COMPANY NAME</td>
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
                <td class="px-2">{{ $entrada->consolidado->numero ?? 'Sin consolidar' }}</td>
            </tr>
            <tr>
                <td class="text-muted small px-2" style="width:15%">Cliente</td>
                <td class="px-2">{{ "{$entrada->cliente->nombre} ({$entrada->cliente->alias})" ?? '' }}</td>
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
                <td class="px-2" style="width:35%">{{ $entrada->remitente->nombre ?? '' }}</td>
                <td class="text-muted small px-2" style="width:15%">Nombre</td>
                <td class="px-2">{{ $entrada->destinatario->nombre ?? '' }}</td>
            </tr>
            <tr>
                <td class="text-muted small px-2 text-nowrap" style="width:15%">Dirección</td>
                <td class="px-2" style="width:35%">
                    @if( $entrada->remitente )
                    <span class="d-block">{{ $entrada->remitente->direccion }}</span>
                    <span>Postal {{ $entrada->remitente->codigo_postal }}</span>
                    @endif
                <td class="text-muted small px-2" style="width:15%">Dirección</td>
                <td class="px-2">
                    @if( $entrada->destinatario )
                    <span class="d-block">{{ $entrada->destinatario->direccion }} </span>
                    <span>Postal {{ $entrada->destinatario->codigo_postal }}</span>
                    @endif
                </td>
            </tr>
            <tr>
                <td class="text-muted small px-2" style="width:15%">Localidad</td>
                <td class="small px-2" style="width:35%">{{ $entrada->remitente->localidad ?? '' }}</td>
                <td class="text-muted small px-2" style="width:15%">Localidad</td>
                <td class="px-2">{{ $entrada->destinatario->localidad ?? '' }}</td>
            </tr>
            <tr>
                <td class="text-muted small px-2" style="width:15%" rowspan="2">Teléfono</td>
                <td class="small px-2" style="width:35%" rowspan="2">{{ $entrada->remitente->telefono ?? '' }}</td>
                <td class="text-muted small px-2" style="width:15%">Referencias</td>
                <td class="small px-2">{{ $entrada->destinatario->referencias ?? '' }}</td>
            </tr>
            <tr>
                <td class="text-muted small px-2" style="width:15%">Teléfono</td>
                <td class="px-2">{{ $entrada->destinatario->telefono ?? '' }}</td>
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
                <td class="px-2" style="width:35%">{{ $entrada->conductor->nombre ?? '' }}</td>
                <td class="text-muted small px-2" style="width:15%">Reempacador</td>
                <td class="px-2">{{ $entrada->reempacador->nombre ?? '' }}</td>
            </tr>
            <tr>
                <td class="text-muted small px-2" style="width:15%">Vehículo</td>
                <td class="px-2" style="width:35%">{{ $entrada->vehiculo->alias ?? '' }}</td>
                <td class="text-muted small px-2" style="width:15%">Código</td>
                <td class="px-2">{{ $entrada->codigor->nombre ?? '' }}</td>
            </tr>
            <tr>
                <td class="text-muted small px-2 text-nowrap" style="width:15%">No de cruce</td>
                <td class="px-2" style="width:35%">{{ $entrada->numero_cruce }}</td>
                <td class="text-muted small px-2" style="width:15%">Descripción</td>
                <td class="small px-2">{{ $entrada->vehiculo->descripcion ?? '' }}</td>
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
                <td class="px-2">{{ ucfirst($salida->status) ?? '' }}</td>
            </tr>
            <tr>
                <td class="text-muted small px-2" style="width:15%">Incidentes</td>
                <td class="small px-2">
                    @if( $salida->incidentes && $salida->incidentes->count() )
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
                    <span class="d-block">{{ ucfirst($salida->cobertura) }}</span>
                    @if( $salida->cobertura === 'ocurre' )
                    <span class="d-block">{{ $salida->direccion }}, Postal {{ $salida->postal }}, {{ $salida->ciudad }}, {{ $salida->estado }}, {{ $salida->pais }}</span>
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
                    @if( $salida->updated_at )
                    {{ "{$salida->updated_at}, {$salida->updater->name}" ?? '?' }}
                    @endif
                </td>
            </tr>
        </tbody>
    </table>
    <br>

    <!-- Etapas -->
    <div style="page-break-before: always">
        <br>
        <table class="table table-sm table-bordered align-middle">
            <tbody>
                <tr class="table-dark">
                    <td class="fw-bold text-white px-2" colspan="7">BOXPING | COMPANY NAME</td>
                </tr>
                <tr>
                    <td class="text-muted small px-2" style="width:1%" colspan="6">Entrada</td>
                    <td class="px-2">{{ $entrada->numero }}</td>
                </tr>
            </tbody>
            <tbody>
                <tr>
                    <td class="bg-light fw-bold px-2" colspan="7">Etapas</td>
                </tr>
                <tr>
                    <td class="text-muted small px-2">Nombre</td>
                    <td class="text-muted small px-2">Peso</td>
                    <td class="text-muted small px-2">Ancho</td>
                    <td class="text-muted small px-2">Altura</td>
                    <td class="text-muted small px-2">Largo</td>
                    <td class="text-muted small px-2">Zona</td>
                    <td class="text-muted small px-2">Alertas</td>
                </tr>
                <tr>
                    <td class="small px-2">Nombre</td>
                    <td class="small px-2">Peso</td>
                    <td class="small px-2">Ancho</td>
                    <td class="small px-2">Altura</td>
                    <td class="small px-2">Largo</td>
                    <td class="small px-2">Zona</td>
                    <td class="small px-2">Alertas</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<!-- final -->
@endsection
