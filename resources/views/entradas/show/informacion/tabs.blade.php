<?php
$items = array(
  'entrada'     => ['class' => 'active', 'aria_selected' => 'true'],
  'reempaque'   => ['class' => null, 'aria_selected' => 'false'],
  'importacion' => ['class' => null, 'aria_selected' => 'false'],
);
?>

<ul class="nav nav-tabs nav-fill card-header-tabs" id="entrada-tabs" role="tablist">
  <?php foreach($items as $item => $props): ?>
  <li class="nav-item" role="presentation">
    <a aria-controls="<?= $item ?>" aria-selected="<?= $props['aria_selected'] ?>" class="nav-link <?= $props['class'] ?> px-3" data-toggle="tab" href="#<?= $item ?>" id="<?= $item ?>-tab" role="tab">
      <?= ucfirst( strtolower($item) ) ?>
    </a>
  </li>
  <?php endforeach ?>
</ul>
