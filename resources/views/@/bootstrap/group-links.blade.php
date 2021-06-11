<?php

$sizes = [
    'sm' => 'btn-group-sm',
    'lg' => 'btn-group-lg',
];

$settings = (object) [
    'active' => isset($active) && is_int($active) ? $active : null,
    'color' => isset($color) && is_string($color) ? $color : 'primary',
    'has_links' => isset($links) && is_array($links) && count($links),
    'links' => $links ?? [],
    'size' => isset($size, $sizes[$size]) ? $sizes[$size] : null,
    'style' => isset($outline) && $outline === true ? 'btn-outline-' : 'btn-',
];

?>

@if( $settings->has_links ) 
<div class="btn-group {{ $settings->size }}" role="group">
    
    @foreach ($settings->links as $text => $link)
    <?php 
    
    $actived = $settings->active <> $loop->iteration ?: 'active';
    $aria_current = $settings->active <> $loop->iteration ?: 'page';
    
    ?>
    <a href="{{ $link }}" class="btn {{ $settings->style . $settings->color }} {{ $actived }}" aria-current="{{ $aria_current }}">{{ $text }}</a>
    @endforeach
    
</div>
@endif
