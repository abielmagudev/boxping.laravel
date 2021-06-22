<?php 

$alignment = [
    'center' => 'justify-content-center',
    'left' => 'justify-content-start',
    'right' => 'justify-content-end',
];

$spaces = [
    'fill' => 'nav-fill',
    'justify' => 'nav-justified',
];

$styles = [
    'tabs' => 'nav-tabs',
    'pills' => 'nav-pills',
];

$card_header_styles = [
    'tabs' => 'card-header-tabs',
    'pills' => 'card-header-pills',
];

$settings = (object) [
    'active' => isset($active) && is_string($active) ? $active : '',
    'align' => isset($align, $alignment[$align]) ? $alignment[$align] : $alignment['left'],
    'aria' => 'aria-current="page"',
    'direction' => isset($direction) && $direction === 'vertical' ? 'flex-column' : '',
    'disable_attrs' => 'tabindex="-1" aria-disabled="true"',
    'disable' => isset($disable) && is_string($disable) ? $disable : '',
    'has_disable' => isset($disable) && is_string($disable),
    'has_items' => isset($items) && is_array($items) && count($items),
    'is_card' => isset($is_card) && $is_card === true,
    'is_toggle' => isset($is_toggle) && $is_toggle === true,
    'items' => $items ?? [],
    'space' => isset($space, $spaces[$space]) ? $spaces[$space] : '',
    'style_card' => isset($style, $styles[$style]) ? $card_header_styles[$style] : '',
    'style' => isset($style, $styles[$style]) ? $styles[$style] : '',
    'tag' => isset($tag) && in_array($tag, ['nav','ul']) ? $tag : 'ul',
    'toggle_attrs' => 'data-bs-toggle="tab" role="tab"',
];

$settings->all_classes = implode(' ', [
    $settings->style,
    $settings->is_card ? $settings->style_card : '',
    $settings->space,
    $settings->align,
    $settings->direction,
]);

?>

@if( $settings->has_items )   

    @if( $settings->tag === 'nav' )
    <?php // Tag must be 'nav' ?>
    <nav class="nav {{ $settings->all_classes }}">
        @foreach($settings->items as $text => $link)
        <a id="{{ strtolower( replaceSpecialChars($text) ) . 'Tab' }}" class="nav-link {{ $settings->active == $text ? 'active' : '' }} {{ $settings->disable == $text ? 'disabled' : '' }}" href="{{ $link }}" {!! $settings->is_toggle ? $settings->toggle_attrs : '' !!}>{{ $text }}</a>
        @endforeach
    </nav>

    @else
    <?php // Tag must be a list('ul') ?>
    <ul class="nav {{ $settings->all_classes }}">
        @foreach($settings->items as $text => $link)
        <li class="nav-item">
            <a id="{{ strtolower( replaceSpecialChars($text) ) . 'Tab' }}" class="nav-link {{ $settings->active == $text ? 'active' : '' }} {{ $settings->disable == $text ? 'disabled' : '' }}" href="{{ $link }}" {!! $settings->is_toggle ? $settings->toggle_attrs : '' !!}>{{ $text }}</a>
        </li>
        @endforeach
    </ul>

    @endif

@endif
