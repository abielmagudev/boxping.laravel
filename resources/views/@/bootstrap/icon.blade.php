<?php

// $icons esta definido como global para todas las views en AppServiceProvider

$settings = (object) [
  'class'  => isset($class) && is_string($class) ? $class : '',
  'style'  => isset($style) && is_string($style) ? $style : '',
  'height' => isset($height) && is_numeric($height) ? $height : '16',
  'width'  => isset($width) && is_numeric($width) ? $width : '16',
  'square' => isset($square) && is_numeric($square) ? $square : null,
  'svg'    => isset($icon, $icons[$icon]) ? $icons[$icon] : false,
  'name'   => $icon ?? '',
];

?>

@if( $settings->svg )
  <svg 
    xmlns="http://www.w3.org/2000/svg" 
    fill="currentColor" 
    width="<?= $settings->square ?? $settings->width ?>" 
    height="<?= $settings->square ?? $settings->height ?>" 
    class="bi bi-<?= $settings->name ?> <?= $settings->class ?>" 
    viewBox="0 0 16 16"
    style="<?= $settings->style ?>"
  >
    <?= $settings->svg ?>
  </svg>
@endif
