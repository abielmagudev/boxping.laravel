<?php
 
$colors = [
    'primary',
    'secondary',
    'success',
    'info',
    'warning',
    'danger',
    'light',
    'dark',
    'link',
];

$sizes = [
    'sm',
    'lg'
];

$placements = [
    'top',
    'right',
    'bottom',
    'left'
];

$settings = (object) array(
    'title'   => isset($title)   && is_string($title) ? $title : 'title?',
    'link'    => isset($link)    && is_string($link) ? $link : '#link?',
    'color'   => isset($color)   && in_array($color, $colors) ? "btn-{$color}" : 'btn-primary',
    'size'    => isset($size)    && in_array($size, $sizes) ? "btn-{$size}" : 'btn-sm',
    'tooltip' => isset($tooltip) && is_string($tooltip) ? $tooltip : '',
    'placement' => isset($placement) && in_array($placement, $placements) ? $placement : 'left',
    'content' => isset($content) ? $content : 'content?',
);

?>

<div class="card-header d-flex align-items-center justify-content-between">
    <div>
        <span>{{ $settings->title }}</span>
    </div>
    <div>
        <a href="{{ $settings->link }}" 
           class="btn {{ $settings->color }} {{ $settings->size }}"
           data-toggle="tooltip" 
           data-placement="left" 
           title="{{ $settings->tooltip }}">
           {{ $settings->content }}
        </a>
    </div>
</div>
