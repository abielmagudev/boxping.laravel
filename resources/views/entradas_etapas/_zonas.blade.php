@if( $etapa->zonas->count() )
<div class="mb-3">
    <label for="select-zona" class="form-label small">Zonas</label>
    <select name="zona" id="select-zona" class="form-select {{ bootstrap_isInputInvalid('zona', $errors) }}">
        <option label="- Sin zona -" selected></option>
        <?php $zona_pivot = $etapa->entrada_etapa->zona_id ?? null ?>
        @foreach($etapa->zonas as $zona)
        <option value="{{ $zona->id }}" {{ toggleSelected($zona->id, old('zona', $zona_pivot)) }}>{{ $zona->nombre }}</option>
        @endforeach
    </select>
    @include('@.bootstrap.invalid-input-message', ['name' => 'zona'])
</div>
@endif
