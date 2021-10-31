<?php

// $icons esta definido como global para todas las views en AppServiceProvider


$settings = (object) [
  'bs_color' => isset($bs_color) && is_string($bs_color) ? $bs_color : '',
  'color'  => isset($color) && is_string($color) ? $color : 'inherit',
  'height' => isset($height) && is_numeric($height) ? $height : '16',
  'width'  => isset($width) && is_numeric($width) ? $width : '16',
  'square' => isset($square) && is_numeric($square) ? $square : null,
  'svg' => isset($icon, $icons[$icon]) ? $icons[$icon] : false,
  'name' => $icon ?? '',
];

?>

@if( $settings->svg )
  <svg 
    xmlns="http://www.w3.org/2000/svg" 
    fill="currentColor" 
    width="<?= $settings->square ?? $settings->width ?>" 
    height="<?= $settings->square ?? $settings->height ?>" 
    class="bi <?= "bi-{$settings->name}" ?> <?= $settings->bs_color ?>" 
    viewBox="0 0 16 16"
    style="color:<?= $settings->color ?>;"
  >
    <?= $settings->svg ?>
  </svg>
@endif
