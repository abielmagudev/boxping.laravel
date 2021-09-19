@if( $etapa->zonas->count() )
<div class="mb-3">
    <label for="select-zonas" class="form-label small">Zonas</label>
    <select name="zona" id="select-zonas" class="form-select">
        <option label="" selected></option>
        <?php $zona_pivot = $etapa->entrada_etapa->zona_id ?? null ?>
        @foreach($etapa->zonas as $zona)
        <option value="{{ $zona->id }}" {{ toggleSelected($zona->id, old('zona', $zona_pivot)) }}>{{ $zona->nombre }}</option>
        @endforeach
    </select>
</div>
<br class="my-5">
@endif
