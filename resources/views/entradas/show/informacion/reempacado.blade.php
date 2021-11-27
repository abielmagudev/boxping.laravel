<div class="tab-pane fade" id="content-reempacado" role="tabpanel" aria-labelledby="reempacado-tab">
@if( $entrada->hasAnyReempacado() )   
    @component('@.bootstrap.table')
        <tr>
            <td class="text-muted small">Reempacador</td>
            <td>{{ $entrada->hasReempacador() ? $entrada->reempacador->nombre : 'Desconocido' }}</td>
        </tr>
        <tr>
            <td class="text-muted small">Código</td>
            <td>{{ $entrada->hasCodigor() ? $entrada->codigor->nombre : 'Desconocido' }}</td>
        </tr>
        @if( $entrada->hasCodigor() )            
        <tr>
            <td class="text-muted small align-top">Descripción</td>
            <td>{{ $entrada->codigor->descripcion }}</td>
        </tr>
        @endif
        <tr>
            <td class="text-muted small border-0">Tiempo</td>
            <td class="border-0">{{ $entrada->getFechaHoraReempacado() }}</td>
        </tr>
    @endcomponent
    <br>
    <div class="text-end">
        <a href="{{ route('entradas.edit', [$entrada, 'editor' => 'reempacado']) }}" class="btn btn-warning btn-sm">
            <span>Editar reempacado</span>
        </a>
    </div>

@else
    <br>
    <p class="text-center">
        <a href="{{ route('entradas.edit', [$entrada, 'editor' => 'reempacado']) }}" class="btn btn-primary">Agregar reempacado</a>
    </p>

@endif
</div>
