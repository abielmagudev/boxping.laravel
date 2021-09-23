@csrf
<div class="mb-3">
    <label for="input-nombre" class="form-label small">Nombre</label>
    <input name="nombre" value="{{ old('nombre', $alerta->nombre) }}" id="input-nombre" type="text" class="form-control" required>
</div>

<div class="mb-3">
    <label for="select-nivel" class="form-label small">Nivel</label>
    <div class="border rounded p-3"> 
        @foreach($all_niveles as $nivel => $attrs)
        <!-- {{ $nivel }} -->
        <div class="row mb-3 mb-md-0">
            <div class="col-sm col-sm-1">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="nivel" value="{{ $nivel }}" id="radio-nivel-{{ $nivel }}" style="border: 2px solid {{ $attrs['color'] }}" {{ $loop->first ? 'checked' : '' }} {{ toggleChecked($nivel, $alerta->nivel) }}>
                    <label class="form-check-label" for="radio-nivel-{{ $nivel }}">{{ ucfirst($nivel) }}</label>
                </div>             
            </div>
            <div class="col-sm">
                <small class="">{{ $attrs['descripcion'] }}</small>
            </div>
        </div>
        @endforeach
    </div>
</div>
