<div class="tab-pane fade show active" id="resumen" role="tabpanel" aria-labelledby="resumen-tab">

    <!-- Informacion -->
    <table class="table align-middle">
        <tbody>
            <tr>
                <td class="text-muted small">Consolidado</td>
                <td>
                    @if( is_object($entrada->consolidado) )
                    <a href="{{ route('consolidados.show', $entrada->consolidado) }}" class="link-primary">{{ $entrada->consolidado->numero }}</a>
                    
                    @else
                    <span>Sin consolidar</span>
                    
                    @endif
                </td>
            </tr>
            <tr>
                <td class="text-muted small">Cliente</td>
                <td>{{ $entrada->cliente->nombre }} ({{ $entrada->cliente->alias }})</td>
            </tr>
            <tr>
                <td class="text-muted small">Contenido</td>
                <td>{{ $entrada->contenido ?? 'Desconocido' }}</td>
            </tr>
            <tr>
                <td class="text-muted small">Actualizado</td>
                <td>{{ $entrada->updated_at }}, {{ $entrada->updater->name }}</td>
            </tr>
        </tbody>
    </table>
    <br>
    
    <p class="text-end">
        <a href="{{ route('entradas.edit', [$entrada, 'formulario' => 'guia']) }}" class="btn btn-warning btn-sm">
            <span>Editar guía</span>
        </a>
    </p>
</div>
