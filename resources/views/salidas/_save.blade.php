@csrf
<div class="row">
    <div class="col-sm">
        <p class="">Envio</p> 
    </div>
    <div class="col-sm col-sm-10">
        <div class="form-group">
            <label for="select-transportadora" class="small">Transportadora</label>
            <select class="form-control" id="select-transportadora" name="transportadora">
                @foreach($transportadoras as $transportadora)
                <option value="{{ $transportadora->id }}" {{ selectable( old('transportadora', $salida->transportadora_id), $transportadora->id) }}>{{ $transportadora->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="input-rastreo" class="small">Rastreo</label>
            <input type="text" class="form-control" id="input-rastreo" name="rastreo" value="{{ old('rastreo', $salida->rastreo) }}">
        </div>
        <div class="form-group">
            <label for="input-confirmacion" class="small">Confirmación</label>
            <input type="text" class="form-control" id="input-confirmacion" name="confirmacion" value="{{ old('confirmacion', $salida->confirmacion) }}">
        </div>
    </div>
</div>
<br>

<div class="row">
    <div class="col-sm">
        <p class="">Destino</p>
    </div>
    <div class="col-sm col-sm-10">
        <div class="form-group">
            <label class="d-block small">Cobertura</label>
            <div class="form-check xform-check-inline">
                <input class="form-check-input" type="radio" id="radio-cobertura-domicilio" name="cobertura" value="domicilio" {{ $salida->cobertura == 'domicilio' ? 'checked' : '' }}>
                <label class="form-check-label" for="radio-cobertura-domicilio">
                    <span>Domicilio</span>
                    <small class="text-muted">({{ $config_cobertura['domicilio']['descripcion'] }})</small>
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" id="radio-cobertura-ocurre" name="cobertura" value="ocurre" {{ $salida->cobertura == 'ocurre' ? 'checked' : '' }}>
                <label class="form-check-label" for="radio-cobertura-ocurre">
                    <span>Ocurre</span>
                    <small class="text-muted">({{ $config_cobertura['ocurre']['descripcion'] }})</small>
                </label>
            </div>
        </div>
        <fieldset class="row">
            <div class="col-sm col-sm-8 form-group">
                <label for="input-ocurre-direccion" class="small">Dirección</label>
                <input type="text" class="form-control" id="input-ocurre-direccion" name="direccion" value="{{ old('direccion', $salida->direccion) }}" placeholder="">
            </div>
            <div class="col-sm form-group">
                <label for="input-ocurre-postal" class="small">Postal</label>
                <input type="text" class="form-control" id="input-ocurre-postal" name="postal" value="{{ old('postal', $salida->postal) }}" placeholder="">
            </div>
            <div class="w-100"></div>
            <div class="col-sm form-group">
                <label for="input-ocurre-ciudad" class="small">Ciudad</label>
                <input type="text" class="form-control" id="input-ocurre-ciudad" name="ciudad" value="{{ old('ciudad', $salida->ciudad) }}" placeholder="">
            </div>
            <div class="col-sm form-group">
                <label for="input-ocurre-estado" class="small">Estado</label>
                <input type="text" class="form-control" id="input-ocurre-estado" name="estado" value="{{ old('estado', $salida->estado) }}" placeholder="">
            </div>
            <div class="col-sm form-group">
                <label for="input-ocurre-pais" class="small">Pais</label>
                <input type="text" class="form-control" id="input-ocurre-pais" name="pais" value="{{ old('pais', $salida->pais) }}" placeholder="">
            </div>
        </fieldset>
    </div>
</div>
<br>

@if( $salida->id )
<div class="row">
    <div class="col-sm">
        <p class="">Proceso</p>
    </div>
    <div class="col-sm col-sm-10">
        <div class="form-group">
            <label for="select-status" class="small">Status</label>
            <select class="form-control" id="select-status" name="status">
                @foreach($config_status as $status => $props)
                <option value="{{ $status }}"  {{ selectable( old('status', $salida->status), $status) }}>{{ ucfirst($status) }}</option>
                @endforeach
            </select>
        </div>
        @if( $incidentes->count() )
        <div class="form-group">
            <label class="small">Incidentes</label>
            <div class="border rounded py-2 px-3 overflow-auto" style="height:20vh">
                @foreach($incidentes as $incidente)
                <?php $element_id = "checkbox-incidente-{$incidente->id}" ?>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="{{ $element_id }}" name="incidentes[]" value="{{ $incidente->id }}" {{ $salida->incidentes->firstWhere('id', $incidente->id) ? 'checked' : '' }}>
                    <label class="form-check-label" for="{{ $element_id }}">
                        <span>{{ $incidente->titulo }}</span>
                        @if( false )
                        <span class="badge badge-primary" data-container="body" data-toggle="popover" data-placement="top" data-content="{{ $incidente->descripcion }}">i</span>
                        @endif
                    </label>
                </div>
                @endforeach
            </div>
        </div>
        @endif
        <div class="form-group">
            <label for="textarea-notas" class="small">Notas</label>
            <textarea cols="30" rows="3" class="form-control" id="textarea-notas" name="notas">{{ old('notas', $salida->notas) }}</textarea>
        </div>
    </div>
</div>
@endif
<br>
