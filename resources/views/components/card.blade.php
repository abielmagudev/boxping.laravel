<?php

$header_nav_types = [
    'none'  => '',
    'pills' => 'nav-pills card-header-pills',
    'tabs'  => 'nav-tabs card-header-tabs'
];

$card = (object) array(
    'classes'        => isset($classes) ? (string) $classes : null,
    'header_classes' => isset($header_classes) ? strval($header_classes) : null,
    'has_headers'    => isset($header_title) || isset($header_center) || isset($header_options) || isset($header_nav) && is_array($header_nav),
    'has_header'     => isset($header_title) || isset($header_center) || isset($header_options),
    'header_title'   => $header_title ?? null,
    'header_title_badge' => isset($header_title_badge) ? strval($header_title_badge) : false,
    'header_center'  => $header_center ?? null,
    'header_options' => $header_options ?? null,
    'has_header_nav' => isset($header_nav) && is_array($header_nav),
    'header_nav'     => $header_nav ?? [],
    'header_nav_type' => isset($header_nav_type, $header_nav_types[$header_nav_type]) ? $header_nav_types[$header_nav_type] : $header_nav_types['pills'],
    'has_body'       => isset($body),
    'body_classes'   => isset($body_classes) ? strval($body_classes) : null,
    'body'           => isset($body) ? $body : false,
    'has_footer'     => isset($footer),
    'footer_classes' => isset($footer_classes) ? strval($footer_classes) : null,
    'footer'         => $footer ?? false,
);

?>

<div class="card shadow border-0 {{ $card->classes }}">
    @if( $card->has_headers  )
    <div class="card-header border-0 {{ $card->header_classes ?? 'bg-transparent' }}">
        
        @if( $card->has_header )
        <!-- Header default -->
        <div class="d-flex align-items-center justify-content-between mt-3">
            <!-- Header title -->
            <div class="text-start">
                <span class="text-secondary">{{ $card->header_title }}</span>
                @if( is_string($card->header_title_badge) )
                <span class="badge rounded-pill bg-secondary text-light">{{ $card->header_title_badge }}</span>
                @endif
            </div>

            <!-- Header center -->
            <div class="text-center">{{ $card->header_center }}</div>

            <!-- Header options -->
            <div class="text-end">{{ $card->header_options }}</div>     
        </div>
        @endif

        @if( $card->has_header && $card->has_header_nav )
        <!-- Margin between header default and header nav -->
        <div class="my-3"></div>
        @endif

        @if( $card->has_header_nav )
        <!-- Header nav -->
            <ul class="nav flex-nowrap overflow-auto mt-3 pt-1 px-1 {{ $card->header_nav_type }}">
                @foreach($card->header_nav as $item)
                <li class="nav-item">
                    {!! $item !!}
                </li>
                @endforeach
            </ul>
        @endif

    </div>
    @endif

    @if( $card->has_body )
    <div class="card-body {{ $card->body_classes }}">{{ $card->body }}</div>
    @endif

    @if( $card->has_footer )
    <div class="card-footer my-3 py-3 {{ $card->footer_classes ?? 'bg-transparent' }}">{{ $card->footer }}</div>
    @endif
</div>
<br>
