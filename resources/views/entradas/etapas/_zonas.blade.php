@if( $etapa->zonas->count() )
<div class="mb-3">
    <label for="select-zonas" class="form-label small">Zonas</label>
    <select name="zona" id="select-zonas" class="form-select">
        <option disabled selected></option>
        <?php $zona_pivot = $etapa->pivot->zona_id ?? null ?>
        @foreach($etapa->zonas as $zona)
        <option value="{{ $zona->id }}" {{ selectable( old('zona', $zona_pivot), $zona->id ) }}>{{ $zona->nombre }}</option>
        @endforeach
    </select>
</div>
@endif
