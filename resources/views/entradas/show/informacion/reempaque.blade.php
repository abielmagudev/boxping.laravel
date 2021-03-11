<div class="tab-pane fade" id="reempaque" role="tabpanel" aria-labelledby="reempaque-tab">
    
    @if( is_object($entrada->codigor) )   
    <table class="table align-middle">
        <tbody>
            <tr>
                <td class="text-muted small">Código</td>
                <td>{{ $entrada->codigor->nombre }}</td>
            </tr>
            <tr>
                <td class="text-muted small align-top">Descripción</td>
                <td>{{ $entrada->codigor->descripcion }}</td>
            </tr>
            <tr>
                <td class="text-muted small">Reempacador</td>
                <td>{{ $entrada->reempacador->nombre }}</td>
            </tr>
            <tr>
                <td class="text-muted small">Horario</td>
                <td>{{ $entrada->reempacado_horario }}</td>
            </tr>
        </tbody>
    </table>
    <br>

    <p class="text-end">
        <a href="{{ route('entradas.edit', [$entrada, 'formulario' => 'reempaque']) }}" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="left" title="Editar reempaque">
            <span>Editar reempaque</span>
        </a>
    </p>

    @else
    <p class="text-center mt-5">
        <a href="{{ route('entradas.edit', [$entrada, 'formulario' => 'reempaque']) }}" class="btn btn-primary btn-lg">Agregar reempaque</a>
    </p>

    @endif
</div>