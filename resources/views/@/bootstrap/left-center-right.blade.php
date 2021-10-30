<?php

$settings = (object) [
    'left'   => $left,
    'center' => $center,
    'right'  => $right,
];

?>
<div class="d-flex align-items-center justify-content-between">
    <!-- Left -->
    <div class="text-start">
        {!! $settings->left !!}
    </div>

    <!-- Center -->
    <div class="text-center">
        {!! $settings->center !!}
    </div>

    <!-- Right -->
    <div class="text-end">
        {!! $settings->right !!}
    </div>
</div>
