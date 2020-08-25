@csrf

<!-- Medidor -->
<div class="form-group">
    <label for="select-medidor">Medidor</label>
    <select name="medidor" id="select-medidor" class="form-control" required>
        @foreach($medidores as $medidor)
        <option value="{{ $medidor->id }}" {{ selectable(old('medidor', $medida->medidor_id), $medidor->id) }}>{{ $medidor->nombre }}</option>
        @endforeach
    </select>
</div>
    
<!-- Peso -->
<div class="row">
    <div class="col-sm">
        <div class="form-group">
            <label for="input-peso">Peso</label>
            <input name="peso" value="{{ old('peso', $medida->peso) }}" id="input-peso" type="number" step="0.01" min="0.01" class="form-control" required>
        </div>
    </div>
    <div class="col-sm">
        <div class="form-group">
            <label for="select-pesaje">Pesaje</label>
            <select name="pesaje" id="select-pesaje" class="form-control" required>
                @foreach($pesajes as $abbr => $pesaje)
                <option value="{{ $pesaje }}" {{ selectable(old('pesaje', $medida->pesaje), $pesaje) }}>{{ ucfirst($pesaje) }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>

<!-- Volumen -->
<div class="row">
    <div class="col-sm">
        <div class="form-group">
            <label for="input-ancho">Ancho</label>
            <input name="ancho" value="{{ old('ancho', $medida->ancho) }}" id="input-ancho" type="number" step="0.01" min="0.01" class="form-control">
        </div>
    </div>
    <div class="col-sm">
        <div class="form-group">
            <label for="">Altura</label>
            <input name="altura" value="{{ old('altura', $medida->altura) }}" id="input-altura" type="number" step="0.01" min="0.01" class="form-control">
        </div>
    </div>
    <div class="col-sm">
        <div class="form-group">
            <label for="">Profundidad</label>
            <input name="profundidad" value="{{ old('profundidad', $medida->profundidad) }}" id="input-profundidad" type="number" step="0.01" min="0.01" class="form-control">
        </div>
    </div>
    <div class="col-sm">
        <div class="form-group">
            <label for="select-volumen">Volumen</label>
            <select name="volumen" id="select-volumen" class="form-control">
                <option disabled selected></option>
                @foreach($volumenes as $abbr => $volumen)
                <option value="{{ $volumen }}" {{ selectable(old('volumen', $medida->volumen), $volumen) }}>{{ ucfirst($volumen) }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
<br>