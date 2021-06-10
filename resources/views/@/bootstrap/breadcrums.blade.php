<?php 

$chevron = "url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);";
$backslash = "'\\005C'";
$slash = "'/'";

$settings = (object) [
    'breadcrums' => $breadcrums ?? [],
    'divider' => $divider ?? $chevron,
    'has_breadcrums' => isset($breadcrums) && is_array($breadcrums) && count($breadcrums),
    'has_divider' => isset($divider) && is_string($divider),
];

?>

@if( $settings->has_breadcrums )
<nav aria-label="breadcrumb" style="--bs-breadcrumb-divider: {!! $settings->divider !!}" class="d-block d-lg-none">
    <ol class="breadcrumb small">
    @foreach($breadcrums as $label => $route)  
        @if(! $loop->last )  
        <li class="breadcrumb-item">
            <a href="{{ $route }}">{{ $label }}</a>
        </li>

        @else
        <li class="breadcrumb-item active" aria-current="page">
            <span>{{ $label }}</span>
        </li>

        @endif
    @endforeach
    </ol>
</nav>
@endif
