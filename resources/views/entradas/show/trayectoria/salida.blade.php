<div class="tab-pane fade show active" id="salida" role="tabpanel" aria-labelledby="salida-tab">
    
<?php // Si la Entrada no tiene destinatario ?>
@if( ! $entrada->haveDestinatario() )
    <p class="text-center lead mt-5">
        <span>Se requiere agregar un destinatario para <br> habilitar la opción de crear salida.</span>
    </p>
    

<?php // Si la Entrada no tiene confirmacion del destinatario ?>
@elseif( ! $entrada->haveConfirmacion() )
    <p class="text-center">
        <span class="lead">Para habilitar la opción de crear ó mostrar la salida, <br> es necesario <b>confirmar el destinatario</b>.</span>
    </p>
    <div class="text-center">
        @include('@.bootstrap.modal-trigger', [
            'classes' => 'btn btn-primary',
            'modal_id' => 'modalConfirmacion',
            'text' => 'Confirmar destinatario',
        ])
        @include('entradas.edit.confirmacion-modal')
    </div>


<?php // Si la Entrada no tiene Salida ?>
@elseif( ! $entrada->haveSalida() )
    <div class="text-center mt-5">
        <a href="{{ route('salidas.create', ['entrada' => $entrada->id]) }}" class="btn btn-primary">Crear salida</a>
    </div>


<?php // Muestra la Salida de la Entrada ?>
@else
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
                    <span class="badge text-dark small" style="background-color:#ddd">{{ $incidente->nombre }}</span>
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


@endif
</div>
