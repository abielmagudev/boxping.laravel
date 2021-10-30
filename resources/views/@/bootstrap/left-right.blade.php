<?php

$settings = (object) [
    'left'   => $left,
    'right'  => $right,
];

?>
<div class="d-flex align-items-center justify-content-center">
    <!-- Left -->
    <div class="text-start">
        {!! $settings->left !!}
    </div>

    <!-- Right -->
    <div class="text-end">
        {!! $settings->right !!}
    </div>
</div>
