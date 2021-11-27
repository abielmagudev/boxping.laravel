<div class="tab-pane fade" id="content-importado" role="tabpanel" aria-labelledby="importado-tab">
@if( $entrada->hasAnyImportado() )
    @component('@.bootstrap.table')
        <tr>
            <td class="text-muted small" style="width:1%">Conductor</td>
            <td>{{ $entrada->hasConductor() ? $entrada->conductor->nombre : 'Desconocido' }}</td>
        </tr>
        <tr>
            <td class="text-muted small">Vehículo</td>
            <td>{{ $entrada->hasVehiculo() ? $entrada->vehiculo->nombre : 'Desconocido' }}</td>
        </tr>
        <tr>
            <td class="text-muted small">Cruce</td>
            <td>{{ $entrada->numero_cruce }}</td>
        </tr>
        <tr>
            <td class="text-muted small border-0">Tiempo</td>
            <td class="border-0">{{ $entrada->getFechaHoraImportado() }}</td>      
        </tr>
    @endcomponent
    <br>
    <div class="text-end">
        <a href="{{ route('entradas.edit', [$entrada, 'editor' => 'importado']) }}" class="btn btn-warning btn-sm">
            <span>Editar importado</span>
        </a>
    </div>

@else
    <br>
    <p class="text-center">
        <a href="{{ route('entradas.edit', [$entrada, 'editor' => 'importado']) }}" class="btn btn-primary">Agregar importado</a>
    </p>

@endif
</div>
