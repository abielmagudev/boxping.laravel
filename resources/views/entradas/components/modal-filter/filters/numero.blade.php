<?php

$wildcards = [
  'inicial' => 'Inicial',
  'final' => 'Final',
];

?>
<label for="inputFilterEntrada" class="form-label small">Número</label>
<div class="input-group mb-3">
  <select name="comodin" class="form-select bg-light" style="max-width:100px">
    @foreach($wildcards as $wildcard => $label)
    <option value="<?= $wildcard ?>" {{ toggleSelected($wildcard, request('comodin', 'inicial')) }}><?= $label ?></option>
    @endforeach
  </select>
  <input name="numero" value="<?= request('numero') ?>" type="text" class="form-control" id="inputFilterEntrada" placeholder="Cualquier número de entrada">
</div>
