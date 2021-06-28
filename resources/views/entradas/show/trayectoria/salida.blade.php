<div class="tab-pane fade show active" id="salida" role="tabpanel" aria-labelledby="salida-tab">
    
    <?php // Si la entrada tiene salida ?>
    @if( isset($entrada->salida) )
    @component('@.bootstrap.table')
        @slot('tbody')
        <tr>
            <td class="text-muted small">Status</td>
            <td>{{ ucfirst($entrada->salida->status) }}</td>
        </tr>
        <tr>
            <td class="text-muted small">Transportadora</td>
            <td>{{ $entrada->salida->transportadora->nombre }}</td>
        </tr>
        <tr>
            <td class="text-muted small">Rastreo</td>
            <td>{{ $entrada->salida->rastreo ?? '' }}</td>
        </tr>
        <tr>
            <td class="text-muted small">Confirmación</td>
            <td>{{ $entrada->salida->confirmacion ?? '' }}</td>
        </tr>
        <tr>
            <td class="text-muted small align-top">Cobertura</td>
            <td>
                <span class="d-block">{{ ucfirst($entrada->salida->cobertura) }}</span>
    
                @if( $entrada->salida->cobertura === 'ocurre' )
                <small class="d-block">{{ $entrada->salida->direccion }}, {{ $entrada->salida->postal }}</small>
                <small>{{ $entrada->salida->ciudad }}, {{ $entrada->salida->estado }}, {{ $entrada->salida->pais }}</small>
                @endif
            </td>
        </tr>
        <tr>
            <td class="text-muted small align-top">Incidentes</td>
            <td>
                @if( $entrada->salida->incidentes->count() )
                <div class="">
                    @foreach($entrada->salida->incidentes as $incidente)
                    <span class="badge text-dark small" style="background-color:#ddd">{{ $incidente->titulo }}</span>
                    @endforeach
                </div>
                @endif
            </td>
        </tr>
        <tr>
            <td class="text-muted small">Notas</td>
            <td>{{ $entrada->salida->notas }}</td>
        </tr>
        <tr>
            <td class="text-muted small border-0">Actualizado</td>
            <td class="border-0">{{ $entrada->salida->updated_at }}, {{ $entrada->salida->updater->name }}</td>
        </tr>
        @endslot
    @endcomponent
    <br>

    <div class="text-end">
        <a href="{{ route('salidas.create', ['entrada' => $entrada->id]) }}" class="d-none btn btn-sm btn-outline-primary">
            <span>Nueva salida</span>
        </a>
        <a href="{{ route('salidas.edit', $entrada->salida) }}" class="btn btn-warning btn-sm">
            <span>Editar salida</span>
        </a>
    </div>

    <?php // Si no tiene salida, pero tiene destinatario  ?>
    @elseif( is_object($entrada->destinatario) )

        <?php // Si tiene confirmacion del destinatario ?>
        @if( $entrada->confirmado )
        <div class="text-center mt-5">
            <a href="{{ route('salidas.create', ['entrada' => $entrada->id]) }}" class="btn btn-primary">Crear salida</a>
        </div>

        <?php // Si no tiene confirmacion del destinatario, actualizar confirmacion ?>
        @else
        <p class="text-center">
            <span class="fw-bold text-danger lead">Importante</span><br> 
            <span class="lead">Para habilitar la opción de crear salida, es necesario contactar, verificar y confirmar envio del paquete con el destinatario.</span>
        </p>
        <br>
        <div class="text-center">
            @include('@.bootstrap.modal-trigger', [
                'classes' => 'btn btn-success',
                'modal_id' => 'modalConfirmacion',
                'text' => 'Habilitar opción de crear salida',
            ])
        </div>

        @include('entradas.edit.confirmacion-modal')

        @endif

    <?php // Si la entrada no tiene destinatario ?>
    @else
    <p class="text-center lead mt-5">
        <span>Se requiere agregar un destinatario para <br> habilitar la opción de generar salida.</span>
    </p>

    @endif
</div>
