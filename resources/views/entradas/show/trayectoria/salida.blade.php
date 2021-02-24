<div class="tab-pane fade show active" id="salida" role="tabpanel" aria-labelledby="salida-tab">
    @if( isset($entrada->salida) )
    <p>
        <small class="d-block text-muted">Status</small>
        <span>{{ ucfirst($entrada->salida->status) }}</span>
    </p>
    <div class="mb-3">
        <small class="d-block text-muted">Incidentes</small>
        @if( $entrada->salida->incidentes->count() )
        <ul class="ps-3">
            @foreach($entrada->salida->incidentes as $incidente)
            <li class="">{{ $incidente->titulo }}</li>
            @endforeach
        </ul>

        @else
        <span>Ninguno</span>

        @endif
    </div>
    <p>
        <small class="d-block text-muted">Transportadora</small>
        <span>{{ $entrada->salida->transportadora->nombre }}</span>
        <a href="{{ $entrada->salida->transportadora->web }}" target="_blank">{!! $icons->globe !!}</a>
    </p>
    <p>
        <small class="d-block text-muted">Código de rastreo</small>
        <span>{{ $entrada->salida->rastreo ?? '...' }}</span>
    </p>
    <p>
        <small class="d-block text-muted">Confirmación</small>
        <span>{{ $entrada->salida->confirmacion ?? '...' }}</span>
    </p>
    <p>
        <small class="d-block text-muted">Cobertura</small>
        <span class="d-block">{{ ucfirst($entrada->salida->cobertura) }}</span>
        
        @if( $entrada->salida->cobertura === 'ocurre' )
        <small class="d-block">{{ $entrada->salida->direccion }}, {{ $entrada->salida->postal }}</small>
        <small>{{ $entrada->salida->ciudad }}, {{ $entrada->salida->estado }}, {{ $entrada->salida->pais }}</small>
        @endif
    </p>
    <p>
        <small class="d-block text-muted">Notas</small>
        <span>{{ $entrada->salida->notas }}</span>
    </p>
    <p>
        <small class="d-block text-muted">Última actualización</small>
        <span class="d-block">{{ $entrada->salida->updated_at }}</span>
        <span>{{ $entrada->salida->updater->name }}</span>
    </p>
    <br>

    <p class="text-end">
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
