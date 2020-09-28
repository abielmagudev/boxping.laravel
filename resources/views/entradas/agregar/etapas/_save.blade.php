@csrf

<!-- Entrada -->
<div class="form-group">
    <label for="" class="small">Entrada</label>
    <div class="form-control bg-light">{{ $entrada->numero }}</div>
</div>

<!-- Etapas -->
<div class="form-group">
    <label for="select-etapa" class="small">Etapas</label>
    <select name="etapa" id="select-etapa" class="form-control" required>
    @if( isset($etapas) )
        <option disabled selected></option>
        @foreach($etapas as $item)
        <option value="{{ $item->id }}" {{ selectable( old('etapa'), $item->id ) }}>{{ $item->nombre }}</option>
        @endforeach
    
    @else
        <option value="{{ $etapa->id }}">{{ $etapa->nombre }}</option>

    @endif
    </select>
</div>
    
<!-- Peso -->
<div class="row">
    <div class="col-sm">
        <div class="form-group">
            <label for="input-peso" class="small">Peso</label>
            <input name="peso" value="{{ old('peso', $etapa->pivot->peso) }}" id="input-peso" type="number" step="0.01" min="0.01" class="form-control">
        </div>
    </div>
    <div class="col-sm col-sm-3">
        <div class="form-group">
            <label for="select-peso_en" class="small">Peso en</label>
            <select name="peso_en" id="select-peso_en" class="form-control">
                @foreach($peso_options as $abbr => $peso_en)
                <option value="{{ $peso_en }}" {{ selectable(old('peso_en', $etapa->pivot->peso_en), $peso_en) }}>{{ ucfirst($peso_en) }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>

<!-- Volúmen -->
<div class="row">
    <div class="col-sm">
        <div class="form-group">
            <label for="input-ancho" class="small">Ancho</label>
            <input name="ancho" value="{{ old('ancho', $etapa->pivot->ancho) }}" id="input-ancho" type="number" step="0.01" min="0.01" class="form-control">
        </div>
    </div>
    <div class="col-sm">
        <div class="form-group">
            <label for="input-altura" class="small">Altura</label>
            <input name="altura" value="{{ old('altura', $etapa->pivot->altura) }}" id="input-altura" type="number" step="0.01" min="0.01" class="form-control">
        </div>
    </div>
    <div class="col-sm">
        <div class="form-group">
            <label for="input-largo" class="small">Largo</label>
            <input name="largo" value="{{ old('largo',  $etapa->pivot->largo) }}" id="input-largo" type="number" step="0.01" min="0.01" class="form-control">
        </div>
    </div>
    <div class="col-sm">
        <div class="form-group">
            <label for="select-dimensiones_en" class="small">Dimensiones en</label>
            <select name="dimensiones_en" id="select-dimensiones_en" class="form-control">
                @foreach($dimension_options as $abbr => $dimension_en)
                <option value="{{ $dimension_en }}" {{ selectable(old('dimensiones_en',  $etapa->pivot->dimensiones_en), $dimension_en) }}>{{ ucfirst($dimension_en) }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
<br>
