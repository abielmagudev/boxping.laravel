<?php

$card = (object) array(
    'classes'        => isset($classes) ? (string) $classes : null,
    'has_header'     => isset($header_title) || isset($header_center) || isset($header_options),
    'header_title'   => $header_title ?? null,
    'header_center'  => $header_center ?? null,
    'header_options' => $header_options ?? null,
    'header_badge'   => isset($header_badge) ? strval($header_badge) : false,
    'body_padding'   => isset($body_padding) && $body_padding === false ? 'p-0' : null,
    'body'           => isset($body) ? $body : false,
    'has_footer'     => isset($footer),
    'footer'         => $footer ?? false,
);

?>

<div class="card shadow border-0 {{ $card->classes }}">
    @if( $card->has_header  )
    <div class="card-header border-0 bg-transparent d-flex align-items-center justify-content-between mt-3">
        <!-- Header title -->
        <div>
            <div class="d-inline-block text-secondary">{{ $card->header_title }}</div>
            @if( ! is_bool($card->header_badge) )
            <span class="badge rounded-pill bg-secondary text-light">{{ $card->header_badge }}</span>
            @endif
        </div>

        <!-- Header center -->
        <div class="text-center">{{ $card->header_center }}</div>

        <!-- Header options -->
        <div class="text-right">{{ $card->header_options }}</div>
    </div>
    @endif

    @if( ! is_bool($card->body) )
    <div class="card-body {{ $card->body_padding }}">{{ $card->body }}</div>
    @endif

    @if( $card->has_footer )
    <div class="card-footer bg-transparent my-3 py-3">{{ $card->footer }}</div>
    @endif
</div>
<br>
