<?php 

$alignment = [
    'center' => 'justify-content-center',
    'right' => 'justify-content-end',
];

$expansions = [
    'fill' => 'nav-fill',
    'justify' => 'nav-justified',
];

$styles = [
    'tabs' => 'nav-tabs',
    'pills' => 'nav-pills',
];

$settings = (object) [
    'active' => isset($active) && is_int($active) ? $active : null,
    'align' => isset($align, $alignment[$align]) ? $alignment[$align] : null,
    'direction' => isset($direction) && $direccion === 'vertical' ? 'flex-column' : null,
    'disable' => isset($disable) && is_int($disable) ? $disable : null,
    'expand' => isset($expand, $expansions[$expand]) ? $expansions[$expand] : null,
    'has_items' => isset($items) && is_array($items) && count($items),
    'items' => $items ?? [],
    'style' => isset($style, $styles[$style]) ? $styles[$style] : null,
    'tag' => isset($tag) && in_array($tag, ['nav','ul']) ? $tag : 'ul',
];

?>

@if( $settings->has_items )   

    @if( $settings->tag === 'nav' )
    <nav class="nav {{ $settings->expand }} {{ $settings->style }} {{ $settings->align }} {{ $settings->direction }}">
        @foreach($settings->items as $text => $link)

        <?php
        $actived = $settings->active === $loop->iteration ? 'active' : '';
        $disabled = $settings->disable === $loop->iteration ? 'disabled' : '';
        $aria_current = is_null($actived) ?: 'page';
        ?>

        <a class="nav-link {{ $actived }} {{ $disabled }}" aria-current="{{ $aria_current }}" href="{{ $link }}">{{ $text }}</a>
        @endforeach

    </nav>

    @else
    <ul class="nav {{ $settings->expand }} {{ $settings->style }} {{ $settings->align }} {{ $settings->direction }}">
        @foreach($settings->items as $text => $link)

        <?php
        $actived = $settings->active === $loop->iteration ? 'active' : '';
        $disabled = $settings->disable === $loop->iteration ? 'disabled' : '';
        $aria_current = is_null($actived) ?: 'page';
        ?>

        <li class="nav-item">
            <a class="nav-link {{ $actived }} {{ $disabled }}" aria-current="{{ $aria_current }}" href="{{ $link }}">{{ $text }}</a>
        </li>
        @endforeach

    </ul>

    @endif

@endif
