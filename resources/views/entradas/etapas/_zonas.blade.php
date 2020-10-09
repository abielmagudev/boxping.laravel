@if( $etapa->zonas->count() )
<div class="form-group">
    <label for="select-zonas">
        <small>Zonas</small>
    </label>
    <select name="zona" id="select-zonas" class="form-control">
        <option disabled selected></option>
        <?php $zona_stored = $etapa->pivot->zona_id ?? null ?>
        @foreach($etapa->zonas as $zona)
        <option value="{{ $zona->id }}" {{ selectable( old('zona', $zona_stored), $zona->id ) }}>{{ $zona->nombre }}</option>
        @endforeach
    </select>
</div>
@endif