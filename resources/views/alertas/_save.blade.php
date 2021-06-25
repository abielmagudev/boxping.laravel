@csrf
<div class="mb-3">
    <label for="select-nivel" class="form-label small">Nivel</label>
    <div class="border rounded p-3"> 
        @foreach($config as $level => $prop)
        <!-- {{ $level }} -->
        <div class="row mb-3 mb-md-0">
            <div class="col-sm col-sm-1">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="nivel" value="{{ $level }}" id="radio-nivel-{{ $level }}" style="border: 2px solid {{ $prop['color'] }}" {{ $loop->first ? 'checked' : '' }} {{ toggleChecked($level, $alerta->nivel) }}>
                    <label class="form-check-label" for="radio-nivel-{{ $level }}">{{ ucfirst($level) }}</label>
                </div>             
            </div>
            <div class="col-sm">
                <small class="">{{ $prop['descripcion'] }}</small>
            </div>
        </div>
        @endforeach
    </div>
</div>

<div class="mb-3">
    <label for="input-nombre" class="form-label small">Nombre</label>
    <input name="nombre" value="{{ old('nombre', $alerta->nombre) }}" id="input-nombre" type="text" class="form-control" required>
</div>

<div class="mb-3">
    <label for="textarea-descripcion" class="form-label small">Descripción</label>
    <textarea name="descripcion" rows="5" id="textarea-descripcion" class="form-control">{{ old('descripcion', $alerta->descripcion) }}</textarea>
</div>
