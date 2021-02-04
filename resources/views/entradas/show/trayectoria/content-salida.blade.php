<div class="tab-pane fade show active" id="salida" role="tabpanel" aria-labelledby="salida-tab">
    @if( isset($entrada->salida) )
    <p class="text-right">
        <a href="{{ route('salidas.edit', $entrada->salida) }}" class="btn btn-warning btn-sm">
            <b>e</b>
        </a>
    </p>
    <div class="row">
        <div class="col-sm col-sm-4 text-md-right">
            <span class="small text-muted">Transportadora</span>
        </div>
        <div class="col-sm col-sm">
            <span>{{ $entrada->salida->transportadora->nombre }}</span>
        </div>
        <div class="w-100 mb-2"></div>

        <div class="col-sm col-sm-4 text-md-right">
            <span class="small text-muted">Rastreo</span>
        </div>
        <div class="col-sm col-sm">
            <span>{{ $entrada->salida->rastreo }}</span>
        </div>
        <div class="w-100 mb-2"></div>

        <div class="col-sm col-sm-4 text-md-right">
            <span class="small text-muted">Confirmación</span>
        </div>
        <div class="col-sm col-sm">
            <span>{{ $entrada->salida->confirmacion }}</span>
        </div>
        <div class="w-100 mb-2"></div>

        <div class="col-sm col-sm-4 text-md-right">
            <span class="small text-muted">Cobertura</span>
        </div>
        <div class="col-sm col-sm">
            <span>{{ ucfirst($entrada->salida->cobertura) }}</span>
            <br>
            @if( $entrada->salida->cobertura === 'ocurre' )
            <small>{{ $entrada->salida->direccion }}, {{ $entrada->salida->postal }}</small>
            <br>
            <small>{{ $entrada->salida->ciudad }}, {{ $entrada->salida->estado }}, {{ $entrada->salida->pais }}</small>
            @endif
        </div>
        <div class="w-100 mb-2"></div>

        <div class="col-sm col-sm-4 text-md-right">
            <span class="small text-muted">Status</span>
        </div>
        <div class="col-sm col-sm">
            <span>{{ ucfirst($entrada->salida->status) }}</span>
        </div>
        <div class="w-100 mb-2"></div>

        @if( $entrada->salida->incidentes->count() )
        <div class="col-sm col-sm-4 text-md-right">
            <span class="small text-muted">Incidentes</span>
        </div>
        <div class="col-sm col-sm">
            @foreach($entrada->salida->incidentes as $incidente)
            <small class="d-block">- {{ $incidente->titulo }}</small>
            @endforeach
        </div>
        <div class="w-100"></div>
        @endif

        <div class="col-sm col-sm-4 text-md-right">
            <span class="small text-muted">Notas</span>
        </div>
        <div class="col-sm col-sm">
            <span>{{ $entrada->salida->notas }}</span>
        </div>
        <div class="w-100"></div>

        <div class="col-sm col-sm-4 text-md-right">
            <span class="small text-muted">Actualizado</span>
        </div>
        <div class="col-sm col-sm">
            <span>{{ $entrada->salida->updater->name }}</span>
            <br>
            <span>{{ $entrada->salida->updated_at }}</span>
        </div>
        <div class="w-100"></div>
    </div>

    @elseif( is_object($entrada->destinatario) )

        @if( $entrada->confirmado )
        <br>
        <p class="text-center">
            <a href="{{ route('salidas.create', ['entrada' => $entrada->id]) }}" class="btn btn-success">Crear salida</a>
        </p>

        @else
        <br>
        <form action="{{ route('entradas.update', $entrada) }}" method="post" autocomplete="off" class="text-center">
            @method('put')
            @csrf
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="confirmado" value="yes" id="checkbox-confirmado" required>
                <label class="form-check-label" for="checkbox-confirmado">He confirmado la dirección y el envio con el destinatario.</label>
            </div>
            <br>
            <button class="btn btn-success btn-sm" type="submit" name="actualizar" value="confirmacion">Guardar confirmación</button>
        </form>

        @endif

    @else
    <br>
    <p class="text-center">Require agregar un destinatario</p>

    @endif
</div>
