<?php

$settings = (object) [
    'animated' => isset($animated) && $animated === true ? 'progress-bar-animated' : '',
    'color' => isset($color) && is_string($color) ? $color : '',
    'height' => isset($height) && is_numeric($height) ? $height . 'px' : '', 
    'label' => isset($label) ? (string) $label : '',
    'striped' => isset($striped) && $striped === true ? 'progress-bar-striped' : '',
    'text' => isset($text) && is_string($text) ?$text : null,
    'value' => isset($value) && is_numeric($value) ? $value : 0,
];

?>

@if( $settings->text )
<label class="text-muted" style="font-size:0.75rem"><?= $settings->text ?></label>
@endif
<div class="progress mb-1" style="height: <?= $settings->height ?>">
  <div class="progress-bar <?= $settings->color ?> <?= $settings->striped ?> <?= $settings->animated ?>" role="progressbar" style="width:<?= $settings->value ?>%;" aria-valuenow="<?= $settings->value ?>" aria-valuemin="0" aria-valuemax="100"><?= $settings->label ?></div>
</div>
