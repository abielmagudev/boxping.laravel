<?php 

$settings = (object) [
    'has_pretitle' => isset($pretitle) && is_string($pretitle),
    'has_subtitle' => isset($subtitle) && is_string($subtitle),
    'has_title' => isset($title) && is_string($title),
    'has_summary' => isset($summary) && is_string($summary),
    'pretitle' => $pretitle ?? null,
    'subtitle' => $subtitle ?? null,
    'title' => $title ?? null,
    'summary' => $summary ?? null,
];

?>

<div class="text-start">
    @if( $settings->has_pretitle )
    <p class="text-muted small mb-1">{{ $settings->pretitle }}</p>
    @endif

    @if( $settings->has_title )    
    <h4 class="m-0">{{ $settings->title }}</h4>
    @endif

    @if( $settings->has_subtitle )
    <p class="text-secondary m-0">{{ $settings->subtitle }}</p>
    @endif
</div>

@if( $settings->has_summary )
    <blockquote>{{ $settings->summary }}</blockquote>
@endif
<br>
