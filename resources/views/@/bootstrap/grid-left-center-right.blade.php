<?php

$settings = (object) [
    'has_center' => isset($center),
    'has_left' => isset($left),
    'has_right' => isset($right),
    'center' => $center ?? '',
    'left' => $left ?? '',
    'right' => $right ?? '',
];

?>

<div class="d-flex justify-content-between align-items-center">
    @if( $settings->has_left )
    <div class="text-start">{!! $settings->left !!</div>
    @endif

    @if( $settings->has_center )
    <div class="text-center">{!! $settings->center !!</div>
    @endif

    @if( $settings->has_right )
    <div class="text-end">{!! $settings->right !!}</div>
    @endif
</div>
