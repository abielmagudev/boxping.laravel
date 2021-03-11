<div class="tab-pane fade show active" id="salida" role="tabpanel" aria-labelledby="salida-tab">
    @if( isset($entrada->salida) )
    <table class="table align-middle">
        <tbody>
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
                    <ul class="ps-3 m-0">
                        @foreach($entrada->salida->incidentes as $incidente)
                        <li class="">{{ $incidente->titulo }}</li>
                        @endforeach
                    </ul>
                    @endif
                </td>
            </tr>
            <tr>
                <td class="text-muted small">Notas</td>
                <td>{{ $entrada->salida->notas }}</td>
            </tr>
            <tr>
                <td class="text-muted small">Actualizado</td>
                <td>{{ $entrada->salida->updated_at }}, {{ $entrada->salida->updater->name }}</td>
            </tr>
        </tbody>
    </table>
    <br>

    <p class="text-end">
        <a href="{{ route('salidas.create', ['entrada' => $entrada->id]) }}" class="d-none btn btn-sm btn-outline-primary">
            <span>Nueva salida</span>
        </a>
        <a href="{{ route('salidas.edit', $entrada->salida) }}" class="btn btn-warning btn-sm">
            <span>Editar salida</span>
        </a>
    </p>

    @elseif( is_object($entrada->destinatario) )

        @if( $entrada->confirmado )
        <br>
        <p class="text-center">
            <a href="{{ route('salidas.create', ['entrada' => $entrada->id]) }}" class="btn btn-primary btn-lg">Crear guía de salida</a>
        </p>

        @else
        <br>
        <div class="text-center px-3">
            <p class="fw-bold lead text-danger text-center">IMPORTANTE</p>
            <p class="lead">Contactar al destinatario para verificar la direccion y confirmar el envio del paquete.</p>
            
            <hr class="my-4">

            <form action="{{ route('entradas.update', $entrada) }}" method="post" autocomplete="off">
                @method('put')
                @csrf
                <div class="form-check">
                    <input class="form-check-input float-none" type="checkbox" name="confirmado" value="yes" id="checkbox-confirmado" required>
                    <label class="form-check-label" for="checkbox-confirmado-label">He realizado la confirmación con éxito.</label>
                </div>
                <br>

                <button class="btn btn-success" type="submit" name="actualizar" value="confirmacion">Guardar confirmación</button>
            </form>
        </div>

        @endif

    @else
    <p class="text-center lead mt-5">
        <span class="d-block">Se requiere agregar</span>
        <span class="fw-bold">un destinatario para crear la guía de salida</span>
    </p>

    @endif
</div>
