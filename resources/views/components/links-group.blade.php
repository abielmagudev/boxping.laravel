<?php 

$colors_filling  = config('resources.bootstrap-colors.button');
$colors_outline = config('resources.bootstrap-colors.button_outline');
$group_sizes = ['sm' => 'btn-group-sm','lg' => 'btn-group-lg'];
$rounded_pill_left ='border-radius:1.4rem 0 0 1.4rem;';
$rounded_pill_right = 'border-radius:0 1.4rem 1.4rem 0;';
$button_colors  = isset($outline) && $outline === true ? $colors_outline : $colors_filling;
$has_links = isset($links) && is_array($links) && count($links);

$group = (object) array(
    'active'         => isset($active, $links, $links[$active]) ? $active : false, 
    'button_color'   => isset($color, $button_colors[$color]) ? $button_colors[$color] : $button_colors['primary'],
    'button_classes' => isset($button_classes) && is_string($button_classes) ? $button_classes : null,
    'button_style'   => isset($button_style) && is_string($button_style) ? $button_style : null,
    'direction'      => isset($vertical) && $vertical === true ? 'btn-group-vertical' : 'btn-group',
    'has_links'      => $has_links,
    'links'          => $has_links ? $links : [],
    'rounded_pill'   => isset($rounded_pill) && $rounded_pill === true,
    'size'           => isset($size, $group_sizes[$size]) ? $group_sizes[$size] : null,
);

?>

@if( $group->has_links )
<div class="{{ $group->direction }} {{ $group->size }}" role="group" aria-label="links-group">

    @foreach($group->links as $title => $route)
    <a  href="{{ $route }}" 
        class="btn {{ $group->button_color }} {{ $group->active === $title ? 'active' : null }} {{ $group->button_classes }}" 
        style="{{ $group->rounded_pill && $loop->first ? $rounded_pill_left : '' }} 
               {{ $group->rounded_pill && $loop->last ? $rounded_pill_right : '' }} 
               {{ $group->button_style }}">
        {{ ucwords($title) }}
    </a>
    @endforeach

</div>
@endif
