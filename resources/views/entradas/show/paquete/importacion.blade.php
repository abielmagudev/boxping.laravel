<div class="tab-pane fade" id="importacion" role="tabpanel" aria-labelledby="importacion-tab">
 
    @if( is_object($entrada->conductor) )
    @component('@.bootstrap.table')
        <tr>
            <td class="text-muted small">Conductor</td>
            <td>{{ is_object($entrada->conductor) ? $entrada->conductor->nombre : 'Conductor desconocido' }}</td>
        </tr>
        <tr>
            <td class="text-muted small">Vehículo</td>
            <td>{{ is_object($entrada->vehiculo) ? $entrada->vehiculo->nombre : 'Desconocido' }}</td>
        </tr>
        <tr>
            <td class="text-muted small">No. de cruce</td>
            <td>{{ $entrada->numero_cruce }}</td>
        </tr>
        <tr>
            <td class="text-muted small border-0">Horario</td>
            <td class="border-0">{{ $entrada->importado_horario }}</td>      
        </tr>
    @endcomponent
    <br>

    <div class="text-end">
        <a href="{{ route('entradas.edit', [$entrada, 'editor' => 'importacion']) }}" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="left" title="Editar importación">
            <span>Editar importación</span>
        </a>
    </div>

    @else
    <p class="text-center mt-5">
        <a href="{{ route('entradas.edit', [$entrada, 'editor' => 'importacion']) }}" class="btn btn-primary">Agregar importación</a>
    </p>

    @endif
</div>
