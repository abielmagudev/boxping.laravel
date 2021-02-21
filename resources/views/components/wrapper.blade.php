<?php

$aligns = [
    'left' => 'text-start',
    'center' => 'text-center',
    'right' => 'text-end',
];

$background_colors = array(
    'primary' => 'bg-primary',
    'secondary' => 'bg-secondary',
    'success' => 'bg-success',
    'danger' => 'bg-danger',
    'warning' => 'bg-warning',
    'info' => 'bg-info',
    'light' => 'bg-light',
    'dark' => 'bg-dark',
    'body' => 'bg-body',
    'white' => 'bg-white',
    'transparent' => 'bg-transparent',
);

$text_colors = array(
    'primary' => 'text-primary',
    'secondary' => 'text-secondary',
    'success' => 'text-success',
    'danger' => 'text-danger',
    'warning' => 'text-warning',
    'info' => 'text-info',
    'light' => 'text-light',
    'dark' => 'text-dark',
    'body' => 'text-body',
    'white' => 'text-white',
    'muted' => 'text-muted',
    'black50' => 'text-black-50',
    'white50' => 'text-white-50',
);

$paddings = ['auto',1,2,3,4,5];

$round = array('circle','pill',0,1,2,3);

$wrapper = (object) array(
    'align' => isset($align, $aligns[$align]) ? $aligns[$align] : $aligns['left'],
    'background_color' => isset($background_color, $background_colors[$background_color]) ? $background_colors[$background_color] : $background_colors['body'],
    'body' => isset($body) ? $body : false,
    'padding' => isset($padding) && in_array($padding, $paddings) ? "p-{$padding}" : 'p-3',
    'text_color' => isset($text_color, $text_colors[$text_color]) ? $text_colors[$text_color] : $text_colors['body'],
    'rounded' => isset($rounded) && in_array($rounded, $round) ? "rounded-{$rounded}" : 'rounded',
);

?>

<div class="{{ $wrapper->rounded }} {{ $wrapper->background_color }} {{ $wrapper->padding }} {{ $wrapper->text_color }} {{ $wrapper->align }}">
    {!! $wrapper->body !!}
</div>
