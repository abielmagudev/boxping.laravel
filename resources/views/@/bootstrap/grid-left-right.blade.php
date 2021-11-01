<?php

$settings = (object) [
    'has_left' => isset($left),
    'has_right' => isset($right),
    'left' => $left ?? '',
    'right' => $right ?? '',
];

?>

<div class="d-flex align-items-center justify-content-between">
    @if( $settings->has_left )
    <div class="text-start">
        {!! $settings->left !!}
    </div>
    @endif

    @if( $settings->has_right )
    <div class="text-end">
        {!! $settings->right !!}
    </div>
    @endif
</div>
